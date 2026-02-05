<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ route('product.index') }}" class="navbar-brand">📦 Aplikasi CRUD</a>
            <ul class="navbar-menu">
                <li><a href="{{ route('product.index') }}" class="active">Produk</a></li>
                <li><a href="{{ route('pesan.index') }}">Pesanan</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h1>📦 Tambah Produk Baru</h1>
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

        <form method="post" action="{{ route('product.store') }}">
            @csrf
            @method('post')

            <div class="form-group">
                <label for="name">Nama Produk *</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama produk" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="qty">Jumlah *</label>
                <input type="number" id="qty" name="qty" placeholder="Masukkan jumlah" value="{{ old('qty') }}" required>
            </div>

            <div class="form-group">
                <label for="price">Harga *</label>
                <input type="number" id="price" name="price" placeholder="Masukkan harga" value="{{ old('price') }}" required step="0.01">
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea id="description" name="description" placeholder="Masukkan deskripsi produk">{{ old('description') }}</textarea>
            </div>

            <div class="button-group">
                <input type="submit" value="Simpan Produk" class="btn btn-success">
                <a href="{{ route('product.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
