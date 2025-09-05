<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $latest = Post::latest()->take(6)->get();
        $cat_ids = Post::whereNotNull('category_id')->groupBy('category_id')->pluck('category_id');
        $categories = Category::whereIn('id', $cat_ids)->get();
        return view('website.home', [
            'latest' => $latest,
            'categories' => $categories
        ]);
    }


    public function details($slug)
    {
        $detail = Post::where('slug', $slug)->firstOrFail();

        return view('website.blog_detail', [
            'detail' => $detail
        ]);
    }

    public function list($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $data = Post::where('category_id', $category->id)->paginate(2);

        return view('website.blog_list', [
            'data' => $data,
            'category' => $category->name
        ]);
    }

    public function about()
    {
        return view('website.about');
    }
}
