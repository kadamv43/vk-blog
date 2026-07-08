<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $latest = Post::orderByDesc('id')->take(6)->get();
        $trending = Post::orderByDesc('views')->take(6)->get();
        $cat_ids = Post::whereNotNull('category_id')->groupBy('category_id')->pluck('category_id');
        $categories = Category::whereIn('id', $cat_ids)->get();
        $featured = Post::where('is_editors_pick', 1)
            ->latest()
            ->first();
        return view('website.home', [
            'latest' => $latest,
            'categories' => $categories,
            'trending' => $trending,
            'featured' => $featured
        ]);
    }


    public function details($slug)
    {
        $detail = Post::where('slug', $slug)->firstOrFail();

        return view('website.blog.detail', [
            'detail' => $detail
        ]);
    }

    public function list($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $data = Post::where('category_id', $category->id)->paginate(2);

        return view('website.blog.list', [
            'data' => $data,
            'category' => $category->name
        ]);
    }

    public function about()
    {
        return view('website.about');
    }

    public function privacyPolicy()
    {
        return view('website.privacy_policy');
    }

    public function termsAndConditions()
    {
        return view('website.terms_and_condition');
    }

    public function disclaimer()
    {
        return view('website.disclaimer');
    }
}
