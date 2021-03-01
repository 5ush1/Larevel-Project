


<table>
    <tr>
        <th>Ime</th>
        <th>Adresa</th>
        <th>Kolicina</th>
        <th>Cena</th>
        <th>Proizvod</th>
    </tr>

    @foreach($orders as $order)
    <tr>
        <td>{{ $order->fullName }}</td>
        <td>{{ $order->address }}</td>
        <td>{{ $order->amount }}</td>
        <td>{{ $order->amount * $order->product->price }}</td>
        <td>{{ $order->product->name }}</td>
    </tr>
    @endforeach

</table>
