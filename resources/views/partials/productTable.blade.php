<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Category</th>
        <th>Cover Image</th>
        <th>Options</th>
    </tr>

        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{$product->amount}}</td>
                <td>{{ $product->category_id }}</td>  {{-- TODO: Add catogory name--}}
                <td><img src="/Images/Products/{{ $product->cover_image }}" alt="{{ $product->name }}" height="50px" width="50px"></td>
                <td>
                    <button class="_deleteProduct" data-product-id="{{$product->id}}">Delete</button>
                    <a href="{{ route('admin.edit_product', ['name' => $product->name]) }}">Edit</a>
                    <a href="{{ route('admin.view_product', ['name' => $product->name]) }}">View Product</a>
                </td>

            </tr>
        @endforeach

</table>
