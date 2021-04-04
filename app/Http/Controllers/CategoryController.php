<?php


namespace App\Http\Controllers;


class CategoryController extends Controller
{
    public function index()
    {
        return view('category', ['categoryList' => $this->categoryList]);
    }

    public function show()
    {
        return view('news', ['newsList' => $this->newsList]);
    }
}
