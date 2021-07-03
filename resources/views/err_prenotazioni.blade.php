@extends('layouts.pag')
@push('style')
    <link rel='stylesheet' href='{{ asset("css/starlabs.css") }}'>
<link rel='stylesheet' href='{{ asset("css/esami.css") }}'>
    @endpush

@push('header')
<div class="sbarra">
        <img src="{{asset('img/elenc.png')}}">
        <h1>errore prenotazioni</h1>
        <div>
@endpush
@section('content')
                <div class="pren">
                    <img src="{{asset('img/outline_warning_black_24dp.png')}}"><h3>Attenzione!!! Non puoi prenotare un esame prima che non siano passati 30 giorni dal precedente esame della stessa tipologia!</h3><img src="{{asset('img/outline_warning_black_24dp.png')}}">
                </div>
                <div class="pren">

                    @foreach($errori as $errore)
                        <li>
                            {{ $errore }}
                        </li>
                    @endforeach

                </div>
                <div class="pren_err">

                    <h3> Gli esami che non sono presenti nella lista , sono state inserite all'elenco delle <a href="{{route('prenotazioni')}}">prenotazioni!</a></h3>
                    <a href="{{route('esami')}}"><button>INDIETRO</button></a>

                </div>



@endsection
