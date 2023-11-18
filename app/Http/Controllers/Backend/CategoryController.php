<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCreateCategory;
use App\Http\Requests\RequestUpdateCategory;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =  Category::where('status',1)->get();
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreateCategory $request)
    {
       $category = Category::create([
           'name'=>$request->input('name'),
           'slug'=>str_replace(
            [' ','&'],
            ['-','and'],
            strtolower($request->input('name'))
           ),
           'created_at'=>date('Y-m-d'),
       ]);

       if($category){
           return redirect()->route('categories.index')->with('success','Category Created Successfully');
       }else{
           return redirect()->back()->withErrors(['error'=>'Unable create category please try after sometime']);
       }
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
        $data =  Category::findOrFail($id);
        return view('backend.categories.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUpdateCategory $request, $id)
    {
        $category = Category::where('id',$id)->update([
            'name'=>$request->input('name'),
            'slug'=>str_replace(
            [' ','&'],
            ['-','and'],
            strtolower($request->input('name')))
        ]);

        if($category){
            return redirect()->route('categories.index')->with('success','Category updated successfully');
        }else{
            return redirect()->back()->withErrors('Unable update category please try after sometime');
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
       $category = Category::find($id);
       $category->delete();
        return redirect()->route('categories.index')->with('Category Deleted Successfully');
    }
}
