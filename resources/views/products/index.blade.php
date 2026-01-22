<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Product</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div>
        <a href="{{ route('product.create') }}">Create a New Product</a>
    </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->qty }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td><a href="{{ route('product.edit',['product'=>$product]) }}">Edit</a></td>
                <td>
                    <form method="post" action="{{ route('product.destroy',['product'=>$product]) }}">
                        @csrf
                        @method('delete')

                        <input type="submit" value="Delete">
                    </form>
            </tr>
            @endforeach
        </table>
    </div>
        </div>
                <br>
            <br>
        <br>
    <hr>
    <div>
        <h1>Order</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Custommer</th>
                <th>Total Order</th>
                <th>Product Id</th>
                <th>Nama Product</th>
                {{-- <th>Edit</th>
                <th>Delete</th> --}}
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer }}</td>
                <td>{{ $order->totalorder }}</td>
                <td>{{ $order->product_id }}</td>
                <td>{{ $product->name }}</td>
                {{-- <td><a href="{{ route('order.edit',['order'=>$order]) }}">Edit</a></td> --}}
                {{-- <td>
                    <form method="post" action="{{ route('order.destroy',['order'=>$order]) }}">
                        @csrf
                        @method('delete') --}}
            @endforeach
    </div>
</body>
</html>
