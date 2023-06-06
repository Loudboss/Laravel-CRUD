<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validate the input from the request
        $validatedData = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'supplier' => 'required',
        ]);

        $product = new Product();
        // Set the attributes of the product based on the request data
        $product->name = $validatedData['name'];
        $product->qty = $validatedData['qty'];
        $product->price = $validatedData['price'];
        $product->supplier = $validatedData['supplier'];
        // ... set other attributes ...

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input from the request

        $validatedData = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'supplier' => 'required',
        ]);


        $product = Product::find($id);
        // Set the attributes of the product based on the request data
        $product->name = $validatedData['name'];
        $product->qty = $validatedData['qty'];
        $product->price = $validatedData['price'];
        $product->supplier = $validatedData['supplier'];
        // ... set other attributes ...

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
