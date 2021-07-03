@extends('layouts.pag')
@push('style')
    <link rel='stylesheet' href='{{ asset("css/starlabs.css") }}'>
    <link rel='stylesheet' href='{{ asset("css/staff.css") }}'>
@endpush
@push('script')
    <script src="{{asset('script/staff.js')}}" defer="true"></script>
@endpush
@push('header')
    <div class="sbarra">
        <img src="img/outline_face_white_24dp.png">
        <h1>Chi Siamo</h1>
    </div>
@endpush

@section('content')
    <div id="main">

    </div>
@endsection
