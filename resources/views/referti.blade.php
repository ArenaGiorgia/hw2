@extends("layouts.pag")
@push('style')
    <link rel='stylesheet' href='{{ asset("css/starlabs.css") }}'>
    <link rel='stylesheet' href='{{ asset("css/Referti.css") }}'>
@endpush
@push('script')
    <script src="{{asset('script/Refert.js')}}" defer="true"></script>
@endpush
@push('header')
    <div class="sbarra">
        <img src="img/outline_fact_check_white_24dp.png">
        <h1>Referti</h1>
        <div>

@endpush
@section('content')
<div id="main">
</div>
@endsection
