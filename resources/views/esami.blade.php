@extends('layouts.pag')
@push('style')
    <link rel='stylesheet' href='{{ asset("css/starlabs.css") }}'>
    <link rel='stylesheet' href='{{ asset("css/esami.css") }}'>
@endpush
@push('script')
    @if(session('id_cliente'))
    <script src="{{asset('script/script.js')}}" defer="true"></script>
    @else
        <script src="{{asset('script/es_notlog.js')}}" defer="true"></script>
    @endif
@endpush
@push('header')
    <div class="sbarra">
        <img src="img/outline_biotech_white_24dp.png">
        <h1>esami</h1>
        <div>
@endpush
@section('content')
    @if(session('id_cliente'))
                <input type="text" id="ric" placeholder="Cerca Esami..." keyup="ricercaElementi()">

                <a class="hidden" id="prenota">PRENOTA</a>

                <h1 class="hidden">Selezionati</h1>
                <div id="preferiti" class='hidden'>

                </div>
                <h1>Esami Disponibili</h1>
                <div id="main">

                </div>
    @else
                    <input type="text" id="ric" placeholder="Cerca Esami..." keyup="ricercaElementi()">
                    <h1>Per poter prenotare uno o più esami effettua il login o la registrazione!!!</h1>
                    <div id="main">

                    </div>
    @endif

@endsection
