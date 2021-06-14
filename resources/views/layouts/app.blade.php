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

    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <!-- font-awesome icons -->
    <link href="{{ asset('public/css/font-awesome.css') }}" rel="stylesheet">
    <!-- //font-awesome icons -->

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('public/css/toastr.min.css') }}">
    @if(direction() == 'rtl')
        <link rel="stylesheet" href="{{asset('public/css/bootstrap-rtl.css') }}">
        <link rel="stylesheet" href="{{asset('public/style-ar.css') }}">
    @endif

    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
{{--    <script src="{{ asset('public/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--    <script src="{{ asset('public/js/fontawesome.min.js') }}"></script>--}}
</head>
{{--<ul class='nav' style="float: left;">--}}
{{--    <li>--}}
{{--        <div class="dropdown">--}}
{{--            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{__('language')}}</a>--}}
{{--            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">--}}
                <li>
                    <a href="{{ url('locale/en') }}"> English </a>
                </li>
                <li>
                    <a href="{{ url('locale/ar') }}"> العربية</a>
                </li>
{{--            </ul>--}}
{{--        </div>--}}
{{--    </li>--}}
{{--</ul>--}}
    <div id="app">
        <body dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <div class="" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                                <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <p>
                                    {{ Auth::user()->getRoleNames()[0] }}
                                </p>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
    <!-- Toastr -->
    <script src="{{ asset('public/js/toastr.min.js') }}"></script>
</body>
</html>
