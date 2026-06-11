<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $categories = Category::all();

        return response()->json([
            'success' => true,
            'data'    => $categories
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
         $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'is_active'   => 'sometimes|boolean',
        ]);
        $category = Category::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'Category created successfully.',
            'data'    => $category
        ], response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        return response()->json([
            'success' => true,
            'data'    => $category
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'is_active'   => 'sometimes|boolean',
        ]);
        $category->update($validated);
        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully.',
            'data'    => $category
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully.'
        ], Response::HTTP_OK);
    }
}
