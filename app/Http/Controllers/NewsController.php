<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news=(new News())->getNews(false);
        return view('news', ['news' => $news]);
    }

    public function indexByCategoryId($categoryId)
    {
        $news=(new News())->getNewsByCategoryId($categoryId);
        return view('news', ['news' => $news]);
    }

    public function show(int $id)
    {
        $news=(new News())->getNewsById($id, false);
        return view('news.show', ['news' => $news]);
    }

    public function answer()
    {
        return view('components.answer');
    }

    public function message()
    {
        return view('components.message');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function messageStore(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string']
            ]);
        $firstname = $request->only('firstname');
        $surname = $request->only('surname');
        return redirect()->route('answer');
    }
}
