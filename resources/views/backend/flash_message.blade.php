<div class="row mt-2">
    <div class="col-md-12">
        @if ($message = session('success'))
        <div class="alert alert-success alert-dismissible show fade">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible show fade">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
        @endforeach
        @endif
    </div>
</div>
