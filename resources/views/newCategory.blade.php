@extends("layout")

@section("content")
    <form method="post" action="{{route('api.add_new_category')}}">
        @csrf

        <input type="text" name="name">

        <button>Add New Category</button>
    </form>
@endsection
