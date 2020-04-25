<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'EREFERRAL') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">


<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link rel="shortcut icon" href="{{ URL::asset('/images/logo.png') }}" type="image/x-icon">

<link rel="shortcut icon" href="{{ URL::asset('/images/logo.png') }}" type="image/x-icon">

<link rel="shortcut icon" href="{{ URL::asset('/js/bootstrap-datepicker.js') }}" type="image/x-icon">

<link rel="shortcut icon" href="{{ URL::asset('/css/datepicker3.css') }}" type="image/x-icon">

<link rel="stylesheet" href="{{ URL::asset('/fontawesome/css/all.css') }}">
</head>
<body class="home">
<div id="app">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
<div class="container">
<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ URL::asset('/images/logo.png') }}" alt="" style="width:45px; height:45px;">
{{ config('app.name', 'EREFERRAL') }}
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
    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
</li>
@if (Route::has('register'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
@endif
@else
@if(! Auth::user()->role_id == 1)
<li class="nav-item">
    <a class="nav-link" href="{{ route('hospitals.index') }}"><i class="fas fa-building"></i>Hospitals</a>
</li>
@endif

@if(Auth::user()->role_id == 2)
<li class="nav-item">
    <a class="nav-link" href="{{ route('referrals.index') }}"><i class="fas fa-tasks"></i>Referrals Sent</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('referrals.recieved') }}"><i class="fas fa-tasks"></i>Referrals Recieved</a>
</li>
@endif
&nbsp&nbsp&nbsp&nbsp

@if(Auth::user()->role_id == 3)
    <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Admin <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-building"></i> &nbsp All Users </a>
        <a class="nav-link" href="{{ route('hospitals.index') }}"><i class="fas fa-building"></i> &nbsp All Hospitals </a>
        <a class="nav-link" href="{{ route('doctors.index') }}"><i class="fas fa-building"></i> &nbsp All Doctors </a>
        <a class="nav-link" href="{{ route('patients.index') }}"><i class="fas fa-building"></i> &nbsp All Patients </a>
        <a class="nav-link" href="{{ route('referrals.index') }}"><i class="fas fa-building"></i> &nbsp All Referrals </a>
    </div>
    </li>
&nbsp&nbsp&nbsp&nbsp
@endif

<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>
@endguest
</ul>
</div>
</div>
</nav>

@include('partials.errors')
@include('partials.success')


<main class="py-4">
@yield('content')
</main>

@include('partials.footer')
</div>
</body>
</html>
