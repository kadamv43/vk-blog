@extends('admin.layout.app')

@section('title', 'posts')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">


    <div class="row mb-6 gy-6">
        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Post</h5>
                    {{-- <small class="text-body float-end">Default label</small> --}}
                </div>
                <div class="card-body">
                    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <div class="mb-6">
                            <label class="form-label" for="basic-default-fullname">Post title</label>
                            <input data-parsley-required type="text" class="form-control" name="title" placeholder="Post title" value="{{ old('title') }}" data-parsley-required-message="Post title required">
                        </div>

                        <div class="mb-6">
                            <label class="form-label" for="tags">Tags</label>
                            <select class="form-control select2-tags" name="tags[]" multiple="multiple" style="width: 100%;">
                                @if(old('tags'))
                                @foreach(old('tags') as $tag)
                                <option value="{{ $tag }}" selected>{{ $tag }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="mb-6">
                            <div class="form-group">
                                <label for="first-name-vertical">Category</label>
                                <select name="category_id" class="choices form-select" data-parsley-required="true" data-parsley-required-message="Category is required">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category )
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- After Post title field -->
                        <div class="mb-6">
                            <label class="form-label">Post Image</label>
                            <input type="file" name="image" class="form-control" accept="image/png, image/jpeg" onchange="previewImage(event)" data-parsley-fileextension="jpg,png" data-parsley-required data-parsley-required-message="Post image is required">
                            <div class="mt-3">
                                <img id="imagePreview" src="#" alt="Preview" style="display: none; max-height: 200px;" class="img-fluid rounded shadow">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="form-label" for="basic-default-phone">Short Description</label>
                            <textarea class="editor" name="short_description"></textarea>
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="basic-default-message">Description</label>
                            <textarea class="editor" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection


@push('scripts')
<script>
    // Preview image function
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }

    // Initialize ClassicEditor
    document.querySelectorAll('.editor').forEach((editorElement) => {
        ClassicEditor
            .create(editorElement)
            .catch(error => {
                console.error(error);
            });
    });

    // Parsley custom validator for file extension (optional)

</script>
@endpush
