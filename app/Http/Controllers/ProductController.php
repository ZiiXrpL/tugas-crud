<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $orders = Order::with('product')->get();
        return view('products.index', ['products'=>$products],['orders'=>$orders]);
        // return view('products.index', ['products'=>$products , 'orders'=>$orders]);

    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
      $data = $request->validate([
          'name' => 'required',
          'qty' => 'required|numeric',
          'price' => 'required|decimal:0,2',
          'description' => 'nullable'
      ]);


      $newProduct = Product::create($data);

      return redirect(route('product.index'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request )
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product deleted successfully.');
    }
}
