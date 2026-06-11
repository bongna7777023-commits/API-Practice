<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('category.list');
    }

    public function getCategories() {
        $categories = Category::all();
        return response()->json([
            'success' => true,
            'data'    => $categories,
        ]);
    }
}
