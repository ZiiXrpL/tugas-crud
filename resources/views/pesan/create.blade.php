<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pesanan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ route('product.index') }}" class="navbar-brand">📦 Aplikasi CRUD</a>
            <ul class="navbar-menu">
                <li><a href="{{ route('product.index') }}">Produk</a></li>
                <li><a href="{{ route('pesan.index') }}" class="active">Pesanan</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h1>📋 Buat Pesanan Baru</h1>
        </div>

        @if($errors->any())
            <div class="error-list">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('pesan.store') }}">
            @csrf

            <div class="form-group">
                <label for="customer">Nama Pelanggan *</label>
                <input type="text" id="customer" name="customer" placeholder="Masukkan nama pelanggan" value="{{ old('customer') }}" required>
            </div>

            <div class="form-group">
                <label for="product_id">Pilih Produk *</label>
                <select id="product_id" name="product_id" required>
                    <option value="">-- Pilih produk --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-success">Buat Pesanan</button>
                <a href="{{ route('product.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
