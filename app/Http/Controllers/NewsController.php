<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news', ['newsList' => $this->newsList]);
    }

    public function show(int $id)
    {

        return view('news.show', ['news' => $id]);
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
