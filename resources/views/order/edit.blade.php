<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
</head>
<body>

<h1>Edit Order</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('order.update', ['order' => $order]) }}">
    @csrf
    @method('put')

    <div>
        <label>Customer</label>
        <input type="text" name="customer" value="{{ $order->customer }}">
    </div>

    <div>
        <label>Product</label>
        <select name="product_id">
            @foreach($products as $product)
                <option value="{{ $product->id }}"
                    {{ $order->product_id == $product->id ? 'selected' : '' }}>
                    {{ $product->name }} - {{ $product->price }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Update Order</button>
</form>

</body>
</html>
