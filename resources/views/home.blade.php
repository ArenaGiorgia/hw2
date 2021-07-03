@extends('layouts.pag')
@push('style')
    <link rel='stylesheet' href='{{ asset("css/starlabs.css") }}'>
    <link rel='stylesheet' href='{{ asset("css/home.css") }}'>
@endpush
@push('script')

@endpush
@push('header')
    <h1>
        Il tuo esame alla portata di un <a class="click" href='{{ route('esami') }}'> click!</a>
    </h1>
    @if(session('id_cliente'))
    <h2>Bentornato/a {{ $nomecmp }}</h2>
    @endif
@endpush
@push('hs')
<div id="barra"></div>
@endpush
@section('content')
    <div id="modal" class="hidden">

    </div>
    <div id="topsection">
        <div class="sec">
            <h3>Orari di apertura</h3>
            <h4>Orario Prestazioni</h4>
            <p>Da lunedi a venerdi dalle 8.00 alle 18.00</p>
            <p>Sabato dalle 8.00 alle 12.00</p>
            <h4>Orari di ritiro referti</h4>
            <p>Da lunedi a venerdi dalle 17.00 alle 19.00</p>
            <p>Sabato dalle 18.00 alle 20.00</p>
        </div>
        <div id="mainpage">
            <h1>
                Teniamo alla tua salute!
            </h1>
            <p> Con sedi sparse in tutta Italia,da oltre trent'anni offriamo la massima qualità, serietà e attendibilità
                dei risultati ai nostri clienti </p>
            <div class="mpdiv">
                <div class="iconbox">
                    <a href='{{ route('esami') }}'><img src="img/outline_event_available_black_24dp.png"></a>
                    <div>
                        <h5> esami</h5>
                        <p> Molteplici tipologie di esami, con uno staff qualificato,vogliamo offrirti il meglio!</p>
                    </div>

                </div>
                <div class="iconbox">
                    <a href='{{route('esami')}}'><img src="img/outline_bloodtype_black_24dp.png"></a>
                    <div>
                        <h5> Prelievi</h5>
                        <p> Prelievi a domicilio. Da oggi, un' infermiere previa prenotazione si recherà direttamente al
                            domicilio del cliente</p>
                    </div>

                </div>
                <div class="iconbox">
                    @if(session('id_cliente'))
                    <a href='{{route('referti')}}'><img src="img/outline_fact_check_black_24dp.png"></a>
                    @else
                        <a href='{{route('login')}}'><img src="img/outline_fact_check_black_24dp.png"></a>
                    @endif

                    <div>
                        <h5> Referti online</h5>
                        <p> Da oggi accedi al tuo profilo per vedere il tuo referto senza il bisogno di recarti in
                            sede!</p>
                    </div>

                </div>

            </div>
            <div class="mpdiv">
                <div class="iconbox">
                    <a href='{{route('covid')}}'><img src="img/outline_masks_black_24dp.png"></a>
                    <div>
                        <h5> Covid-19</h5>
                        <p>La sezione che ti permette di prenotare e conoscere il tuo esito direttamente online e a
                            prezzi imbattibili!</p>
                    </div>

                </div>
                <div class="iconbox">
                    <a><img src="img/outline_verified_black_24dp.png"></a>
                    <div>
                        <h5> Qualità & Convensioni</h5>
                        <p> Da sempre vogliamo offrirti il meglio ,grazie alle nostre attrezzature super moderne!</p>
                    </div>

                </div>

                <div class="iconbox">
                    <a href='{{route('sedi')}}'><img src="img/outline_location_on_black_24dp.png"></a>
                    <div>
                        <h5>Come raggiungerci</h5>
                        <p>Grazie alle nostre sedi centralizzate raggiungerci non sarà un grosso problema!</p>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <div id="bottomsection">
        <div class="sec">
            <a href='{{route('covid')}}'>
                <h3>news</h3>
            </a>
            <img src="img/pexels-cottonbro-3957987.jpg">
        </div>
        <div id="bs_post">
            <div>
                <a href='{{route('covid')}}'><img src="img/outline_face_black_24dp.png"></a>
                <h3>
                    Staff
                </h3>

            </div>
            <div>
                <a href='{{route('esami')}}'><img src="img/outline_science_black_24dp.png"></a>
                <h3>Tipologie</h3>
            </div>

            <div>
                <a href='{{route('covid')}}'><img src="img/outline_article_black_24dp.png"></a>
                <h3>Articoli</h3>
            </div>
        </div>
    </div>

@endsection
