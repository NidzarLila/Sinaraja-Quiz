<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="{{asset('admin/assets/scss/app.scss')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/scss/themes/dark/app-dark.scss')}}">
    <link rel="shortcut icon" href="{{asset('admin/assets/static/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('admin/assets/static/images/logo/favicon.png')}}" type="image/png">
</head>

<body>
    <script src="{{asset('admin/assets/static/js/initTheme.js')}}"></script>
    <div id="app">
        <div id="sidebar">
            
            @include('layouts.sidebar')
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @include('layouts.footer')
        </div>
    </div>
    <script src="{{asset('admin/assets/static/js/components/dark.js')}}"></script>
    <script src="{{asset('admin/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.js')}}" type="module"></script>
    <script src="{{asset('admin/assets/compiled/js/app.js')}}"></script>
</body>

</html>