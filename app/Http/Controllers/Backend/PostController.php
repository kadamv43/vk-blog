<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Image;
use Exception;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::where('status',1)
        ->orderBy('id','desc')
        ->get();
        return view('backend.posts.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status',1)->get();
        return view('backend.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('posts.create')->withErrors($validator)->withInput();
        }

        $post = new Post();
        $post->title = $request->input('title');
        $post->slug = str_replace(' ','-',$request->input('title')) ;
        $post->category_id = $request->input('category_id');
        $post->description = $request->input('description');
        $post->created_at = date('Y-m-d');
        $post->updated_at = date('Y-m-d');
        
        if($post->save()){
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = $post->id.".webp";
                $path = storage_path('app/public/images').'/'.$filename;
                Image::make($file)->resize(1000, 700)->save($path,50);
                $post->image = "images/".$filename;
                $post->save();
            }
    }

    return redirect()->route('posts.index')->with('success','Post Created Successfully');

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
        $categories = Category::where('status',1)->get();
        return view('backend.posts.edit',compact('categories','post'));

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
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('posts.edit',['id'=>$id])->withErrors($validator)->withInput();
        }

        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('title');
        $post->category_id =  (int) $request->input('category_id');
        $post->description = $request->input('description');
        $post->updated_at = date('Y-m-d');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $post->id.".webp";
            $path = storage_path('app/public/images').'/'.$filename;
            Image::make($file)->resize(1000, 700)->save($path,50);
            $post->image = "images/".$filename;
        }

        if($post->save()){
            return redirect()->route('posts.index')->with('success','Post Updated Successfully');
        }else{
            return redirect()->back()->withErrors(['error'=>'Unable Update Post please try after sometime']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::find($id);
        $data->delete();
         return redirect()->route('posts.index')->with('Post Deleted Successfully');
    }
}
