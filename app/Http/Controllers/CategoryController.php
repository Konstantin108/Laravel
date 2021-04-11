<?php


namespace App\Http\Controllers;


use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = (new Category())->getCategories();
        return view('category', ['categories' => $categories]);
    }

//    public function show($id)
//    {
//        $categories = (new Category())->getCategoriesById($id);
//        return view('category.show', ['categories' => $categories]);
//    }
}
