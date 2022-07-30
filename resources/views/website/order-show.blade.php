@extends('website.layout')
@section('content')
    <div class="container table-responsive">
        <h3 class="m-3">Details of order #{{ $order->id }}</h3>
        <table class="table table-hover table-striped table-bordered border-dark">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity Of Product In Order</th>
                    <th scope="col">Price Of One Product</th>
                    <th scope="col">Total Price</th>>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $product->pivot->price }}</td>
                        <td>{{ $product->pivot->quantity * $product->pivot->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
