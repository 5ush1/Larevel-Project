@extends('layout')
<form action="{{ route('admin.update_product') }}" method="post">
    @csrf
    <input type="text" name="name" value="{{ $product->name }}">
    <input type="int" name="price" value=" {{ $product->price }}">
    <input type="int" name="amount" value="{{ $product->amount }}">
    <input type="hidden" value="{{ $product->id }}" name="product_id">
    <input type="submit" value="Edit">
</form>
