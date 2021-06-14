<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- custom style sheet -->
    <link href="public/css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="public/css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- /google fonts-->
    @if(direction() == 'rtl')
        <link rel="stylesheet" href="{{asset('public/css/bootstrap-rtl.css') }}">
        <link rel="stylesheet" href="{{asset('public/style-ar.css') }}">
    @endif
</head>
<body>
<ul class='nav' style="float: left;">
    <li>
        <div class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{__('language')}}</a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <li>
                    <a href="{{ url('locale/en') }}"> English </a>
                </li>
                <li>
                    <a href="{{ url('locale/ar') }}"> العربية</a>
                </li>
            </ul>
        </div>
    </li>
</ul>
<div id="app">
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
