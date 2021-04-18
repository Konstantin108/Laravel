<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $news = News::select([
                    'id',
                    'title',
                    'text',
                    'created_at',
                    'updated_at',
                    'status',
                    'theme'
                ])
                ->get();
            $count = News::select([
                        'id',
                        'title',
                        'text',
                        'created_at',
                        'updated_at',
                        'theme'
                ])
                ->count();
            return view('components.admin-index', [
                'news' => $news,
                'count' => $count
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.admin-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required', 'int', 'min:1'],
            'title' => ['required', 'string', 'min:2']
        ]);
        $data = $request->only([
            'category_id',
            'title',
            'slug',
            'text',
            'status'
        ]);
        $news = News::create($data);
        if($news){
            return redirect()->route('admin.news.index')
                ->with('success', 'новость успешно добавлена');
        }
        return back()->with('error', 'не удалось добавить новость');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "отобразить запись с id={$id}";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        if($news){
            return redirect()->route('admin.news.index')
                ->with('success', 'новость была удалена');
        }
        return back()->with('error', 'не удалось удалить новость');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('components.news.edit', ['news'=>$news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'category_id' => ['required', 'int', 'min:1'],
            'title' => ['required', 'string', 'min:2']
        ]);
        $data = $request->only([
            'category_id',
            'title',
            'slug',
            'text',
            'status'
        ]);
        $status = $news->fill($data)->save();
        if($status){
            return redirect()->route('admin.news.index')
                ->with('success', 'новость успешно изменена');
        }
        return back()->with('error', 'не удалось сохранить изменения');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Int $id)
    {
        //
    }
}
