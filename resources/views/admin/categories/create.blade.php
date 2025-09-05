@extends('admin.layout.app')

@section('title', 'posts')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-6 gy-6">
        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Category</h5>
                    {{-- <small class="text-body float-end">Default label</small> --}}
                </div>
                <div class="card-body">
                    <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <div class="mb-6">
                            <label class="form-label" for="basic-default-fullname">Name</label>
                            <input data-parsley-required type="text" class="form-control" name="name" placeholder="Category Name" value="{{ old('name') }}" data-parsley-required-message="name required">
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
