<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;




class OrderController extends Controller
{
    public function create()
    {
        $products = Product::all();
        return view('order.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer'   => 'required|string',
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($request->product_id);

        Order::create([
            'customer'    => $request->customer,
            'product_id'  => $product->id,
            'total_order' => $product->price,
        ]);

        return redirect()->route('product.index')
            ->with('success', 'Order berhasil dibuat 🎉');
    }

    public function edit(Order $order)
    {
        $products = Product::all();
        return view('order.edit', compact('order', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer'   => 'required|string',
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($request->product_id);

        $order->update([
            'customer'    => $request->customer,
            'product_id'  => $product->id,
            'total_order' => $product->price,
        ]);

        return redirect()->route('product.index')
            ->with('success', 'Order berhasil diupdate ✅');
    }
    public function exportPdf()
{
    $orders = Order::with('product')->get();

    $pdf = Pdf::loadView('order.pdf', compact('orders'));

    return $pdf->download('data-order.pdf');
}

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('product.index')
            ->with('success', 'Order berhasil dihapus 🗑️');
    }
}
