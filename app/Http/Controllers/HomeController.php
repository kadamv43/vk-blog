<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
        $posts = Post::whereIn('category_id',[1,3,6])->get();

        $technology = $posts->filter(function($item){
            return $item->category_id == 1;
        })->take(2);

        $health = $posts->filter(function($item){
            return $item->category_id == 3;
        })->take(2);

        return view('home',compact('technology','health'));
    }
}
