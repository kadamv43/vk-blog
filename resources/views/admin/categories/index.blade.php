@extends('admin.layout.app')

@section('title', 'posts')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Categories</h3>
            {{-- <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p> --}}
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h4 class="card-title">Posts</h4> --}}
                    <a class="float-end" href="{{route('categories.create')}}">
                        <button class="btn btn-success">Add Category</button>
                    </a>
                </div>
                <div class="card-content">
                    @component('backend.flash_message')
                    @endcomponent
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $datum)
                                <tr>
                                    <td>{{$datum->id}}</td>
                                    <td><a href="{{route('categories.edit',$datum->id)}}">{{$datum->name}}</a></td>
                                    {{-- <td class="text-bold-500">{{$datum->name}}</td> --}}
                                    <td>
                                        @if($datum->status==1)
                                        <label class="text-success">Active</label>
                                        @else
                                        <label class="text-success">Inactive</label>
                                        @endif
                                    </td>
                                    <td class="text-bold-500">{{date('d-m-Y',strtotime($datum->created_at))}}
                                    </td>
                                    {{-- <td>{{date('d-m-y',strtotime($datum->updated_at))}}</td> --}}
                                    <td>
                                        {{-- <a class="mx-2" href="{{route('posts.edit',$datum->id)}}"><i class="fa fa-pencil"></i></a> --}}
                                        {{-- <a class="mx-2" href="{{route('posts.edit',$datum->id)}}"><i class="text-danger  fa fa-trash"></i></a> --}}

                                        <a class="mx-2" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" data-url="{{route('categories.destroy',$datum->id)}}">
                                            <i class="text-danger  fa fa-trash"></i>
                                        </a>

                                        {{-- <form onsubmit="return confirm('Are you sure want to delete?')" action="{{route('posts.destroy',$datum->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <i class="fa fa-trash"></i>
                                        </form> --}}
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $data->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this record?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


@push('scripts')


<script>
    // When the delete modal is about to be shown
    var deleteModal = document.getElementById('deleteModal');

    deleteModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget;

        // Extract the URL from data-url attribute
        var url = button.getAttribute('data-url');

        // Find the form inside the modal
        var form = deleteModal.querySelector('#deleteForm');

        // Set the form action dynamically
        form.action = url;
    });

</script>

@endpush
