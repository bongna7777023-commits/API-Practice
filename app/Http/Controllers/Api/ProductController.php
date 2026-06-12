<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =Product::with('category')->get();

        return response()->json([
            'success' => true,
            'data'    => $products,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'is_active'   => 'boolean',
        ]);

        $product = Product::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data'    => $product,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
         return response()->json([
            'success' => true,
            'data'    => $product->load('category'),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
         $validated = $request->validate([
            'category_id' => 'sometimes|exists:categories,id',
            'name'        => 'sometimes|string|max:255',
            'image'       => 'nullable|string',
            'price'       => 'sometimes|numeric|min:0',
            'stock'       => 'sometimes|integer|min:0',
            'is_active'   => 'boolean',
        ]);

        $product->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
            'data'    => $product,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
       $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully',
        ], 200);
    }
}
