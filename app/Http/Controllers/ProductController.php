<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest as request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        return Product::all();
    }

    public function store(Request $request) {
        
        $product = $request->all();
        return Product::create($product);
    }

    public function update(Request $request, Product $product) {
        
        $product->update($request->all());
        return $product;

    }

    public function show(Product $product) {
        
        return $product;
    }

    public function destroy(Request $request, Product $product) {
        
        $product->delete();
        return $product;
    }
}
