<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\createPostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Str;
use Intervention\Image\Facades\Image; // Add at the top




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::where('status', 1)
            ->with('category')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('admin.posts.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createPostRequest $request)
    {
        $post = new Post();

        $post->title = $request->input('title');
        $post->slug = Str::slug($request->input('title'));
        $post->category_id = $request->input('category_id');
        $post->description = $request->input('description');
        $post->short_description = $request->input('short_description');

        // Handle tags (comma-separated string)
        if ($request->filled('tags')) {
            $tagsArray = explode(',', $request->input('tags'));
            $tagsArray = array_map(fn($tag) => strtolower(trim($tag)), $tagsArray);
            $post->tags = implode(',', $tagsArray);
        }

        // Handle image upload and optimization
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $image = $request->file('image');

            $resizedImage = $manager->read($image)
                ->resize(800, 600, function ($c) {
                    return $c->aspectRatio()->upsize();
                })
                ->cover(800, 600, 'center') // ensures exact size
                ->toWebp(75);

            $filename = time() . '.webp';
            $directory = public_path('assets/uploads/images');

            // Ensure directory exists
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            // Save optimized file
            file_put_contents($directory . '/' . $filename, (string) $resizedImage);

            // Save relative path in DB
            $post->image = 'assets/uploads/images/' . $filename;
        }

        if ($post->save()) {
            return redirect()->route('posts.index')->with('success', 'Post Created Successfully');
        }

        return redirect()->back()->withErrors(['Unable to create post. Please try again later.']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        // dd($post->id);
        $categories = Category::where('status', 1)->get();
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->category_id = (int) $request->input('category_id');
        $post->description = $request->input('description');
        $post->updated_at = now();

        // Tags handling (comma-separated string)
        if ($request->filled('tags')) {
            $tags = explode(',', $request->input('tags')); // in case you pass "PHP, Laravel"
            $tags = array_map(fn($tag) => strtolower(trim($tag)), $tags);
            $post->tags = implode(',', $tags);
        }

        // Image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($post->image && file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }

            $manager = new ImageManager(new Driver());
            $image = $request->file('image');

            $resizedImage = $manager->read($image)
                ->resize(800, 600, function ($c) {
                    return $c->aspectRatio()->upsize();
                })
                ->cover(800, 600, 'center')
                ->toWebp(90);

            $filename = time() . '.webp';
            $directory = public_path('assets/uploads/images');

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            file_put_contents($directory . '/' . $filename, (string) $resizedImage);

            // Save relative path for frontend use
            $post->image = 'assets/uploads/images/' . $filename;
        }

        if ($post->save()) {
            return redirect()->route('posts.index')->with('success', 'Post Updated Successfully');
        }

        return redirect()->back()->withErrors(['error' => 'Unable to update post, please try later']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Delete the image if it exists
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post Deleted Successfully');
    }
}
