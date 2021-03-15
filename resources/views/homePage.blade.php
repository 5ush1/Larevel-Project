@extends('layout')
@section('title')
    TafelMax
@endsection
@section('content')

    <div class="img_heigth bck_img w-100 d-flex align-items-center justify-content-center">
        <h2 class="display-1 tefelmax">Metalni namestaj</h2>
    </div>

    <section class="d-flex col-12">
        @foreach($products as $product)
            <article class="col-3">
                <div class="justify-content-center">
                    <img class="rounded mx-auto d-block"
                         src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9EPLTha3KelDY8hD4dxGmsqBD_pphvgTwKQ&usqp=CAU"
                         alt="nogara x">
                    <h6 class="text-center">{{ $product->name }}</h6>
                </div>
                <div class="d-flex w-full">
                    <form action="{{ route('checkout') }}" method="get" class="col-9">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="ms-4">Kupi</button>
                    </form>
                    <h6 class="col-3 text-right">Cena: {{ $product->price }}</h6>
                </div>
            </article>
        @endforeach
    </section>


@endsection
