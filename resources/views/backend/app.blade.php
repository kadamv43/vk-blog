<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VkBlog - @yield('title')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/vendors/toastify/toastify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/summernote/summernote.min.css')}}">
    {{--
    <link href="{{ asset('assets/css/summernote-image.css') }}" rel="stylesheet"> --}}
</head>

<body>

    <div id="app">
        @include('backend.sidebar')
        <div id="main" class='layout-navbar'>
            @include('backend.header')
            <div id="main-content">
                @yield('content')
                @include('backend.footer')
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script> --}}
    <script src="{{ asset('assets/vendors/choices.js/choices.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/parsley.min.js') }}"></script>
    <script>
        var php_upload_path = "{{route('ckeditor.upload',['_token'=>csrf_token()])}}";
    </script>
    <script src="{{ asset('assets/vendors/summernote/summernote.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/summernote-image.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 500,
                callbacks:{
                    onImageUpload:function(files){
                        var formData = new FormData();
                            formData.append('file',files[0]);
                            $.ajax({
                                url: php_upload_path, // php file location to upload files
                                type: 'POST',
                                data: formData,
                                dataType: 'json',
                                processData: false,
                                contentType: false,
                                success: function(data) {
                                    if (data.message == 'ok') {
                                        uploadedFile = data.response; 
                                        let img = document.createElement('img');
                                        img.src =uploadedFile;
                                        $('#summernote').summernote('insertNode',img);  
                                    }
                                    else {
                                        alert(data.message);
                                    } 
                                }
                            });
                    }
                }
            });

            $("#img").change(function(e) {
                //console.log(URL.createObjectURL(e.target.files[0]));
                $("#imgPreview").attr("src", URL.createObjectURL(e.target.files[0]));
            });
        });
    </script>

</body>

</html>