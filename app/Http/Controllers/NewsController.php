<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {

        return view('news.index', [
            'newsList' => $this->newsList,

        ]);
    }

    public function show(int $id)
    {
        return view('news.show', ['news' => $id]);
    }

    public function create()
    {
        return "
                <h2>Создание новости</h2>
                <input value='Заголовок новости'>
                <input value='категория'><br><br>
                <textarea style='height: 200px; width: 260px' placeholder='ввод текста'></textarea>
            ";
    }
}
