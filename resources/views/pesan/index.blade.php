<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manajemen Pesanan</title>
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
        <!-- Orders Section -->
        <div class="section">
            <div class="page-header">
                <h1>📋 Manajemen Pesanan</h1>
            </div>

            @if(session()->has('success'))
                <div class="alert alert-success">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <div class="button-group">
                <a href="{{ route('pesan.create') }}" class="btn btn-primary">+ Buat Pesanan Baru</a>
                <a href="{{ route('pesan.export.pdf') }}" target="_blank" class="btn btn-export">📥 Export PDF</a>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pelanggan</th>
                            <th>Produk</th>
                            <th>Total Pesanan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($orders->count())
                            @foreach($orders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td><strong>{{ $order->customer }}</strong></td>
                                <td>{{ $order->product->name }}</td>
                                <td>Rp {{ number_format($order->total_order, 0, ',', '.') }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('pesan.edit', ['pesan' => $order]) }}" class="btn btn-warning">Edit</a>
                                        <form method="POST" action="{{ route('pesan.destroy', ['pesan' => $order]) }}" style="margin: 0;">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Hapus" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 30px;">Tidak ada pesanan</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
