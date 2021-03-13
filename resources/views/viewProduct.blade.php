@extends('layout')
@section('content')

    <h1>Ime: {{ $product->name }}</h1>
    <img src="/Images/Products/{{ $product->cover_image }}" alt="{{ $product->name }}">
    <h2>Cena: {{ $product->price }}</h2>
    <h2>Dodato: {{ $product->created_at }}</h2>
    <h2>Obnovljeno: {{ $product->updated_at }}</h2>
    <h2>Kolicina: {{ $product->amount }}</h2>
@endsection
