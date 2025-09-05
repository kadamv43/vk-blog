@extends('admin.layout.app')

@section('title', 'posts')

@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Post</h3>
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

    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h4 class="card-title">Create Post</h4> --}}
                    @component('backend.flash_message')
                    @endcomponent
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{route('categories.update',$data->id)}}" method="POST" class="form form-vertical" enctype="multipart/form-data" data-parsley-validate>
                            @csrf
                            @method('PUT')

                            <div class="mb-6">
                                <div class="form-group">
                                    <label for="first-name-vertical">Post title</label>
                                    <input data-parsley-required type="text" id="first-name-vertical" class="form-control" name="name" placeholder="name" value="{{ $data->name }}" data-parsley-required-message="name required">
                                </div>
                            </div>
                            <div class="mb-6 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
