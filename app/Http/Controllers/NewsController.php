<?php

namespace App\Http\Controllers;

use App\Enums\NewsStatusEnum;
use App\Http\Requests\SendMessage;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::select([
                'id',
                'category_id',
                'title',
                'slug',
                'text',
                'created_at',
                'status'
            ])
            ->where('status', NewsStatusEnum::PUBLISHED)
            ->with('category')
            ->paginate(10);
        $count=News::select(['id'])
            ->where('status', NewsStatusEnum::PUBLISHED)
            ->with('category')
            ->count();
        return view('news', [
            'news' => $news,
            'count' => $count
        ]);
    }

    public function indexByCategoryId($categoryId)   //<-- составление списка новостей по категориям
    {
        $news=News::where([
                ['category_id', $categoryId],
                ['status', NewsStatusEnum::PUBLISHED]
            ])
            ->with('category')
            ->paginate(10);
        $count=News::
            where([
                ['category_id', $categoryId],
                ['status', NewsStatusEnum::PUBLISHED]
             ])
            ->with('category')
            ->count();
        return view('news', [
            'news' => $news,
            'count' => $count
        ]);
    }

    public function show(int $id)
    {
        $news = News::findOrFail($id);
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
     * @param SendMessage $request
     * @return \Illuminate\Http\Response
     */
    public function messageStore(SendMessage $request)
    {
        $firstname = $request->only('firstname');
        $surname = $request->only('surname');
        return redirect()->route('answer');
    }
}
