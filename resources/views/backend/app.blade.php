
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VkBlog - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

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

<script src="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
<script src="{{asset('assets/vendors/choices/choices.js')}}"></script>
<script src="{{asset('assets/vendors/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>



<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

<script src="{{asset('assets/frontend/js/jquery-3.4.1.min.js')}}"></script>

<script>
    // register desired plugins...
    $(document).ready(function () {
  $("#img").change(function (e) {
                //console.log(URL.createObjectURL(e.target.files[0]));
                 $("#imgPreview").attr("src", URL.createObjectURL(e.target.files[0]));
   });
});
</script>

    <script src="{{asset('assets/js/parsley.min.js')}}"></script>
</body>
</html>
