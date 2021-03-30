<?php


namespace App\Http\Controllers;


class CategoryController extends Controller
{
    public function index()
    {
        return view('category', ['categoryList' => $this->categoryList]);
    }

    public function show(string $category)
    {
        return "показать {$category}
                <br><a href='".route('news')."'>перейти к новостям</a>" .'<br>';
    }
}
