@extends('layout')
@section('content')

    <form action="{{ route('buy') }}" method="post">
        @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div>
            <label for="product">Product: </label>
            <input type="text" name="product" value="{{ $product->name }}" readonly>
        </div>
        <br>
        <div>
            <label for="name">Full Name: </label>
            <input type="text" name="name">
        </div>
        <br>
        <div>
            <label for="adress">Adress: </label>
            <input type="text" name="adress">
        </div>
        <br>
        <div>
            <label for="amount">Amount: </label>
            <input type="number" name="amount">
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="email" name="email">
        </div>
        <input type="submit" value="Buy">
    </form>

@endsection
