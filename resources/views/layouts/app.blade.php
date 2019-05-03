<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {!! Html::script('js/app.js') !!}
    {!! Html::script('js/logout.js') !!}
    {!! Html::style('css/app.css') !!}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        @include('admin.include.toast')
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">@lang('header.login')</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">@lang('header.register')</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <span class="dropdown-item" id="logout-span">
                                        @lang('header.logout')
                                    </span>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            @if(Auth::check())
                <div class="col-lg-2" >
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('home')}}">@lang('header.home')</a>
                        </li>
                        <li class="list-group-item">
                            <a href=" {{route('admin.user.index')}} ">@lang('header.users.title_user')</a>
                        </li>
                        <li class="list-group-item">
                            <a href=" {{route('admin.user.create')}} ">@lang('header.users.title_new_user')</a>
                        </li>
                        <li class="list-group-item">
                            <a href=" {{route('admin.user.edit', ['id' => Auth::id()])}} ">@lang('header.users.title_profile')</a>
                        </li>
                    </ul>
                </div>
            @endif
            <div class="col-lg-10">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>
