@extends('backend.app')

@section('title', 'posts')

@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Post</h3>
                {{-- <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Post</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Post
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create Post</h4>
                            @component('backend.flash_message')
                            @endcomponent
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{route('posts.store')}}" method="POST"
                                    class="form form-vertical" enctype="multipart/form-data" data-parsley-validate>
                                    <div class="form-body">

                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Post title</label>
                                                    <input data-parsley-required type="text"
                                                        id="first-name-vertical" class="form-control" name="title"
                                                        placeholder="Post title"
                                                        value="{{ old('title') }}"
                                                        data-parsley-required-message="Post title required">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Category</label>
                                                    <select name="category_id" class="choices form-select" data-parsley-required="true" data-parsley-required-message="Category is required"  >
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $category )
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Description</label>
                                                    <textarea name="description" id="editor"></textarea>
                                                    <div >

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Image</label>
                                                    <input id="img" type="file" class="form-control" name="image" >
                                                    {{-- <input class="form-control" type="file" name="image"  /> --}}
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <img id="imgPreview" style="width: 50%" class="img-fluid" src="{{asset('assets/images/no-image.jpg')}}" />
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>

@endsection
