<!-- QUESTO FILE SERVE PER IL LOGIN E PER LA REGISTRAZIONE-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" id="csrf" content="{{ csrf_token() }}">
    <link rel='stylesheet' href='{{ asset("css/starlabs.css") }}'>
    <link rel='stylesheet' href='{{ asset("css/home.css") }}'>
    <link rel='stylesheet' href='{{ asset("css/login.css") }}'>

    <link rel="icon" href="{{ asset('img/StarLabsWhite.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <title>Login-Starlabs</title>
    @stack('link')
</head>
<body>
<nav>
    <div id="logo">

    </div>

    <div id="menu">
        <a class="button" href="{{ route('home') }}">home</a>
        @if(session('id_cliente'))
        <a class="button" href="{{ route('prenotazioni') }}">prenotazioni</a>
        @endif
        <a class="button" href="{{ route('sedi') }}">sedi</a>
        <a class="button" href="{{ route('chisiamo') }}">chi siamo</a>
    </div>



    <a class="button" href="{{ route('login') }}"> login </a>

    <div id="menutendina">
        <div></div>
        <div></div>
        <div></div>
    </div>
</nav>
<section>
@yield('content')
</section>

</body>
</html>
