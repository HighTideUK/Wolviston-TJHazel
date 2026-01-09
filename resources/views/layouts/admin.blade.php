<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <style type="text/css">
        .hidden { display:none; }
    </style>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="/js/manifest.js"></script>
    <script src="{{ mix('js/admin-vendor.js') }}"></script>
    <script src="/js/modernizr.js"></script>
    <script src="{{ mix('js/admin.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/admin-vendor.css') }}" rel="stylesheet">
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">

    <script type="text/javascript">
        $('html').addClass('hidden');
        $(document).ready(function() {
            $('html').removeClass('hidden');
        });  
    </script>

</head>
<body class="admin">
    <div id="app">
        @yield('content')
    </div>
</body>
</html>
