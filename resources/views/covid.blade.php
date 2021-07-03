@extends('layouts.pag')
@push('style')
    <link rel='stylesheet' href='{{ asset("css/starlabs.css") }}'>
    <link rel='stylesheet' href='{{ asset("css/covid.css") }}'>
@endpush
@push('script')
    <script src="{{asset('script/api.js')}}" defer="true"></script>
@endpush
@push('header')
    <div class="sbarra">
        <img src="img/outline_coronavirus_white_24dp.png">
        <h1>covid-19</h1>
    </div>
@endpush
@section('content')
    <form name="barra_ricerca" id="barra_ricerca">

        <input type="text" name="ric" id="ric" class= "bottoni" placeholder="Cerca Nazioni...">
        <input type="submit" id="sub" class="bottoni" value="ricerca">
    </form>

    <div class="main">
    </div>
    <div class="hidden sbarra">
        <img src="img/outline_coronavirus_white_24dp.png" alt="">
        <h1>news covid-19</h1>
    </div>
    <div class="hidden main" id="articoli">
    </div>
@endsection
