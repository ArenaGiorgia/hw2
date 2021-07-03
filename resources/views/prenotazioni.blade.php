@extends('layouts.pag')
@push('style')
    <link rel='stylesheet' href='{{ asset("css/starlabs.css") }}'>
    <link rel='stylesheet' href='{{ asset("css/esami.css") }}'>
@endpush
@push('script')
    <script src="{{asset('script/Prenotazioni.js')}}" defer="true"></script>
@endpush
@push('header')
    <div class="sbarra">
        <img src="img/elenc.png">
        <h1>prenotazioni</h1>
    </div>
@endpush
@section('content')

                <div class="pren">
                    <h3>A seguire l'elenco delle prenotazioni da lei effettuate,se già non sei stato/a contattato, a breve il nostro team la contatterà per comunicarle la data di effettuazione della prestazione! </h3>
                </div>

                <div class="pren">
                    <button id="aprielenco">ELENCO PRENOTAZIONI</button>
                    <a href="{{route('esami')}}"><button>INDIETRO</button></a>
                     <img class="hidden" id="ricarica_img" src="img/outline_autorenew_black_24dp.png">
                </div>


                <div id="main">


                </div>

@endsection
