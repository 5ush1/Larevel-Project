@extends('layout')

@section('content')
    <h1>Uspesna porudzbina</h1>
    <p>Full Name: {{ $order->name }}</p>
    <p>Product Id: {{ $order->product_id }}</p>
    <p>Address: {{ $order->adress }}</p>
    <p>Amount: {{ $order->amount }}</p>
@endsection
