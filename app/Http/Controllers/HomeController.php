<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::whereIn('category_id',[1,3,6])
        ->with('category')
        ->orderBy('id','desc')
        ->get();

        // dd($posts);

        $technology = $posts->filter(function($item){
            return $item->category_id == 1;
        })->take(2);

        $health = $posts->filter(function($item){
            return $item->category_id == 3;
        })->take(2);

        return view('home',compact('posts','technology','health'));
    }

    public function details($id){
        $data = Post::findOrFail($id);
        return view('blog_detail',compact('data'));
    }

    public function category($id){
        $category = Category::findOrFail($id);

        $data = Post::where('category_id',$id)
        ->orderBy('id','desc') 
        ->get();
        
        return view('category',compact('data','category'));
    }

    public function categoryList(){
        $categories = Category::where('status',1)->get();
        return response()->json(['data'=>$categories->toArray()]);
    }

    public function upload(Request $request){
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time().".webp";
            $path = storage_path('app/public/images').'/'.$filename;
            Image::make($file)->resize(1000, 700)->save($path,50);
            $url = asset("storage/images/".$filename);
            return response()->json(['response'=>$url,'message'=>"ok"]);
        }
    }
}
