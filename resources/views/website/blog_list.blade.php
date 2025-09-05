@extends('website.layout.app')

@section('content')

<main class="container py-5">
    <div class="row">
        <!-- Blog List (Grid) -->
        <div class="col-lg-8">
            <h1 class="mb-4">
                <span class="text-primary">{{$category}}</span>
            </h1>

            <div class="row g-4">
                <!-- Single Blog Card -->
                @foreach ($data as $data_each)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{asset('storage/' . $data_each->image) }}" class="card-img-top" alt="Blog Image 1" />
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $data_each->title }}</h5>
                            <p class="card-text flex-grow-1">
                                {!! Str::limit($data_each->short_description ?? $data_each->short_description, 80) !!}
                            </p>
                            <a href="{{route('details',$data_each->slug)}}" class="btn btn-outline-primary btn-sm mt-auto">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-5 d-flex justify-content-center">
                {{ $data->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <!-- Sidebar (copy from your main layout) -->
        <aside class="col-md-3 mb-4">
            <div class="p-3 bg-light rounded shadow-sm sticky-top">
                <!-- Tags Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Related Tags</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="#" class="badge bg-primary text-decoration-none">Health</a>
                            <a href="#" class="badge bg-secondary text-decoration-none">Medicines</a>
                            <a href="#" class="badge bg-success text-decoration-none">Health Tips</a>
                            <a href="#" class="badge bg-info text-dark text-decoration-none">Diet Plans</a>
                        </div>
                    </div>
                </div>

                <!-- Popular Posts Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Popular Posts</h5>
                        <ul class="list-unstyled">
                            <li class="d-flex mb-3">
                                <img src="https://picsum.photos/60/60?random=10" alt="Post 1" class="me-3 rounded" style="width: 60px; height: 60px; object-fit: cover" />
                                <a href="#" class="text-decoration-none align-self-center">
                                    5 Tips for Healthy Living
                                </a>
                            </li>
                            <li class="d-flex mb-3">
                                <img src="https://picsum.photos/60/60?random=11" alt="Post 2" class="me-3 rounded" style="width: 60px; height: 60px; object-fit: cover" />
                                <a href="#" class="text-decoration-none align-self-center">
                                    Top Medicines for Cold & Flu
                                </a>
                            </li>
                            <li class="d-flex mb-3">
                                <img src="https://picsum.photos/60/60?random=12" alt="Post 3" class="me-3 rounded" style="width: 60px; height: 60px; object-fit: cover" />
                                <a href="#" class="text-decoration-none align-self-center">
                                    Best Diet Plans for Weight Loss
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Newsletter Signup Card -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Newsletter</h5>
                        <form>
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-sm" placeholder="Enter your email" required />
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm w-100">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</main>

@endsection
