<?php


namespace App\Http\Controllers;


use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_visible', true)
                        ->get();
        return view('category', ['categories' => $categories]);
    }
}
