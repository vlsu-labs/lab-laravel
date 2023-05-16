<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success','Product created successfully.');
    }

    public function show(Product $product)
    {

        error_log($product->id);
      return view('products.show',compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success','product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        error_log($product->id.$product->name);

        return redirect()->route('products.index')
                       ->with('success','product deleted successfully');
    }
}
