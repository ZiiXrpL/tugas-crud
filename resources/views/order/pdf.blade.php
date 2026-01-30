<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Order</title>
    <style>
        body {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Data Order</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Product</th>
            <th>Total Order</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $order->customer }}</td>
            <td>{{ $order->product->name }}</td>
            <td>{{ $order->total_order }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
