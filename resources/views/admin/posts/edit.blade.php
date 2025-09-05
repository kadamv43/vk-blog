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
                        <form action="{{route('posts.update',$post->id)}}" method="POST" class="form form-vertical"
                            enctype="multipart/form-data" data-parsley-validate>
                            @csrf
                            @method('PUT')

                            <div class="mb-6">
                                <div class="form-group">
                                    <label for="first-name-vertical">Post title</label>
                                    <input data-parsley-required type="text" id="first-name-vertical"
                                        class="form-control" name="title" placeholder="Post title"
                                        value="{{ $post->title }}" data-parsley-required-message="Post title required">
                                </div>
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="tags">Tags</label>
                                <select class="form-control select2-tags" name="tags[]" multiple="multiple"
                                    style="width: 100%;">

                                    @if(!is_null($post->tags))
                                    @foreach(json_decode($post->tags) as $tag)
                                    <option value="{{ $tag }}" selected>{{ $tag }}</option>
                                    @endforeach

                                    @endif
                                </select>
                            </div>
                            <div class="mb-6">
                                <div class="form-group">
                                    <label for="first-name-vertical">Category</label>
                                    <select name="category_id" class="choices form-select" data-parsley-required="true"
                                        data-parsley-required-message="Category is required">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category )
                                        <option @if ($post->category_id==$category->id) selected @endif
                                            value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input id="imgInput" type="file" class="form-control" name="image"
                                        accept="image/png, image/jpeg" onchange="previewSelectedImage(event)">
                                    <div class="mt-3">
                                        @if($post->image)
                                        <img id="imgPreview" src="{{ asset($post->image) }}" alt="Current Image"
                                            style="max-height: 200px;" class="img-fluid rounded shadow">
                                        @else
                                        <img id="imgPreview" src="#" alt="Image Preview"
                                            style="display: none; max-height: 200px;" class="img-fluid rounded shadow">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="basic-default-phone">Short Description</label>
                                <textarea class="editor" name="short_description">
                                {{ $post->short_description }}
                                </textarea>
                            </div>

                            <div class="mb-6">
                                <div class="form-group">
                                    <label for="first-name-vertical">Description</label>
                                    <textarea class="editor" name="description">
                                    {{ $post->description }}
                                    </textarea>
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


@push('scripts')

<script>
    function previewSelectedImage(event) {
        const input = event.target;
        const preview = document.getElementById('imgPreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.querySelectorAll('.editor').forEach((editorElement) => {
        ClassicEditor
            .create(editorElement)
            .catch(error => {
                console.error(error);
            });
    });

</script>


@endpush()