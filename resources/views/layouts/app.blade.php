<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (!empty($metaTitle))
        <title>{{ config('app.name', 'Laravel') }} | {{ $metaTitle }}</title>
    @else
        <title>{{ config('app.name', 'Laravel') }}</title>
    @endif

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

    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}">
    <meta property="og:description" content="">
    <meta property="og:image" content="https://wolviston-group.ams3.digitaloceanspaces.com/social-cards/tjhazell.png">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="https://wolviston-group.ams3.digitaloceanspaces.com/social-cards/tjhazell.png">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    @include('snippets.gtm_head')
    @include('snippets.google_analytics')

</head>
<body class="{{ bodyClass() }}">
    @include('snippets.gtm_body')
    @include('partials.menu')
   <main id="panel">
        @yield('content')
    </main>

</body>
</html>
