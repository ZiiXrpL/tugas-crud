<!DOCTYPE html>
<html>
<head>
    <title>Create Order</title>
</head>
<body>

<h1>Create Order</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('order.store') }}">
    @csrf

    <div>
        <label>Customer</label>
        <input type="text" name="customer" placeholder="Nama customer">
    </div>

    <div>
        <label>Product</label>
        <select name="product_id">
            @foreach($products as $product)
                <option value="{{ $product->id }}">
                    {{ $product->name }} - {{ $product->price }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Save Order</button>
</form>

</body>
</html>
