<!--QUESTO MI ESTENDE LA MIA PAGINA DI LAYOUT DEL LOGIN -->
@extends('layouts.logreg')
@push('link')
    <script src="{{asset('script/login.js')}}" defer="true"></script>
@endpush
@section('content')
    <div id="icona">
        <h1>StarLabs</h1>
        <img src="img/StarLabsBlack.png">
    </div>

    <form name='login' method='post' action="{{ route("check") }}">
        @csrf
        <div class="cf">
            <div><label for='cf'>Inserisci codice fiscale</label></div>
            <div><input type='text' name='cf' ></div>
        </div>
        <div class="password">
            <div><label for='password'>Password</label></div>
            <div><input type='password' name='password' ></div>
        </div>

        <div>
            <input type='submit' value="Accedi">
        </div>
    </form>
    <div class="signup">Non hai un account? <a href="{{route('registrazione')}}">Iscriviti</a>
        <div class="hidden error" id="error_display">

        </div>
@endsection

