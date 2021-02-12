<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Options</th>
    </tr>

        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category_id }}</td>  {{-- TODO: Add catogory name--}}
                <td>
                    <button class="_deleteProduct" data-product-id="{{$product->id}}">Delete</button>
                    <a href="{{ route('admin.edit_product', ['name' => $product->name]) }}">Edit</a>
                </td>

            </tr>
        @endforeach

</table>
