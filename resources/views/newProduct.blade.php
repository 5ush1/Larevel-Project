@extends("layout")


@section("content")
    @if($errors)
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    <form method="post" action="{{ route("api.add_new_product") }}" enctype="multipart/form-data">
        @csrf

        @include("partials.error", ['name' => 'name'])
        <input type="text" name="name" id="name" value="{{ old("name") }}">

        @include("partials.error", ['name' => 'price'])
        <input type="number" name="price" id="price" value="{{ old("price") }}">

        <input type="number" name="amount" id="amount" value="{{old("amount")}}">
        <input type="file" name="photo">
        <input type="file" name="productImages[]" multiple>

        <button class="">Add</button>
    </form>
@endsection

