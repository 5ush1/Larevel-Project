@extends("layout")


@section("content")
    <form method="post" action="{{ route("api.add_new_product") }}">
        @csrf

        @include("partials.error", ['name' => 'name'])
        <input type="text" name="name" id="name" value="{{ old("name") }}">

        @include("partials.error", ['name' => 'price'])
        <input type="number" name="price" id="price" value="{{ old("price") }}">

        <input type="number" name="amount" id="amount" value="{{old("amount")}}">

        <button class="_addProduct">Add</button>
    </form>
@endsection

