<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        StarLabs s.r.l
    </title>
    <link rel="icon" href='{{asset('img/StarLabsWhite.png')}}'>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    @stack('style')
    @stack('script')
</head>

<body>
<header>
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

        @if(session('id_cliente'))
        <a class="button" id="logout" href='{{route('logout')}}'> logout</a>
        @else
            <a class="button" id="login" href='{{route('login')}}'> login</a>
        @endif

        <div id="menutendina">
            <div></div>
            <div></div>
            <div></div>
        </div>


    </nav>

    @stack('header')
</header>
@stack('hs')
<section>
    @yield('content')
</section>

<footer>

    <p>&copy Giorgia Arena</p>
    <img src="{{ asset('img/instagram (1).png')}}">
    <img src="{{ asset('img/facebook (1).png')}}">
    <img src="{{ asset('img/whatsapp (1).png')}}">
    <p>O46002279</p>

</footer>

</body>

</html>
