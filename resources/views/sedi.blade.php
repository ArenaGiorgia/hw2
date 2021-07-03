@extends('layouts.pag')
@push('style')
    <link rel='stylesheet' href='{{ asset("css/starlabs.css") }}'>
    <link rel='stylesheet' href='{{ asset("css/Referti.css") }}'>
@endpush
@push('script')
    <script src="{{asset('script/sedi.js')}}" defer="true"></script>
@endpush
@push('header')
    <div class="sbarra">
        <img src="img/outline_location_on_white_24dp.png">
        <h1>SEDI</h1>
    </div>
@endpush
@section('content')
    <div id="main">

    </div>
@endsection
