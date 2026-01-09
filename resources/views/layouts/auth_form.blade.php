<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/manifest.js"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/libraries.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>

   <main class="auth_form">
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="/images/admin_logo.png" alt="{{ config('app.name', 'Laravel') }}" /></a>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
        
    </main>

</body>
</html>
