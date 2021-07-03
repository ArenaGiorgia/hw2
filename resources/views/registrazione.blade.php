@extends('layouts.logreg')
@push('link')
<script src="{{asset('script/validazione.js')}}" defer="true"></script>
@endpush
@section('content')
    <div id="icona">
        <h1>Registrazione</h1>
        <img src="img/StarLabsBlack.png">
    </div>

    <form name='registrazione' method='post' enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="nome">
            <div><label for='nome'>Nome</label></div>
            <div><input type='text' name='nome' placeholder='Es.Mario' value='{{ old('nome') }}'></div>
        </div>
        <div class="cognome">
            <div><label for='cognome'>Cognome</label></div>
            <div><input type='text' name='cognome' placeholder='Es.Rossi' value='{{ old('cognome') }}'></div>
        </div>
        <div class="email">
            <div><label for='email'>Email</label></div>
            <div><input type='text' name='email' placeholder='Es. mariorossi@gmail.com' value='{{ old('email') }}'>
            </div>

        </div>
        <div class="cf">
            <div><label for='cf'>Codice Fiscale</label></div>
            <div><input type='text' name='cf' placeholder='Es.MRARSS80A01C351N' value='{{ old('cf') }}'></div>

        </div>
        <div class="genere">
            <div><label for='genere'>m</label></div>
            <div><input type='radio' name='genere' value="m"></div>
            <div><label for='genere'>f</label></div>
            <div><input type='radio' name='genere' value="f"></div>
            <span class="hidden">!!!</span>
        </div>
        <div class="data_nascita">
            <div><label for="data_nascita">Data Nascita</label></div>
            <div><input type='date' name='data_nascita' value='{{ old('data_nascita') }}'></div>
        </div>


        <div class="num_telefonico">
            <div><label for='num_telefonico'>Numero Telefonico</label></div>
            <div><input type='text' name='num_telefonico' placeholder='Es.3217845164'
                        value='{{ old('num_telefonico') }}'></div>
        </div>
        <div class="password">
            <div><label for='password'>Password</label></div>
            <div><input type='password' name='password' placeholder='Es.MarioRossi11#'></div>
        </div>
        <div class="confirm_password">
            <div><label for='confirm-password'>Conferma Password</label></div>
            <div><input type='password' name='confirm_password' placeholder='Es.MarioRossi11#'></div>
        </div>


        <div>
            <input type='submit' value="Procedi">
        </div>
    </form>
    <div class="hidden error" id="error_display">

    </div>

@endsection
