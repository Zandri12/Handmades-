@extends('frontEnd.layouts.master')
@section('title','Review Order Page')
@section('slider')
@endsection
@section('content')
    <div class="container">
        <h3 class="text-center">PESANAN DIKIRIM</h3>
        <p class="text-center">Terima Kasih Telah Berbelanja</p>
        <p class="text-center">Kami Akan Menghubungi Anda Segera Di (<b>{{$user_order->users_email}}</b>) Atau No.Hp(<b>{{$user_order->mobile}}</b>)</p>
    </div>
    <div style="margin-bottom: 20px;"></div>
@endsection