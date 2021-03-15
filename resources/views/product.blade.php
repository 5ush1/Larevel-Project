@extends("layout")

@section("title")
    <title>Product</title>
@endsection


@section("naslov")
    <h1>Product</h1>
@endsection
@section("podnaslov")
    <h2>{{$recent ?? $all}}</h2>
@endsection
