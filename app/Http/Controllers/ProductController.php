<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'manufacturer_part_number' => 'required|string|max:10',
            'pack_size' => 'required|string|max:20',
            'images' => 'nullable|json',
            'rating_obj' => 'nullable|json',
            'links' => 'nullable|json',
        ]);

        $product = Product::createProduct($validatedData);

        return response()->json($product, 201);
    }
    public function show($id)
    {
        $product = Product::findById($id);
        return response()->json($product);
    }
    public function update(Request $request, $id)
    {
        $product = Product::findById($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'manufacturer_part_number' => 'required|string|max:10',
            'pack_size' => 'required|string|max:20',
            'images' => 'nullable|json',
            'rating_obj' => 'nullable|json',
            'links' => 'nullable|json',
        ]);

        $product->updateProduct($validatedData);

        return response()->json($product);
    }
    public function destroy($id)
    {
        $product = Product::findById($id);
        $product->deleteProduct();

        return response()->json(['message' => 'Product deleted successfully']);
    }
    public function findByMPN($mpn)
    {
        $product = Product::findByMPN($mpn);
        if ($product) {
            return response()->json($product);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }
}
