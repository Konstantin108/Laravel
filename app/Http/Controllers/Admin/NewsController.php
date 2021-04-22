<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNews;
use App\Http\Requests\UpdateNews;
use App\Models\Category;
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
     * @param CreateNews $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateNews $request)
    {
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
                ->with('success', __('messages.admin.news.create.success'));
        }
        return back()->with('error', __('messages.admin.news.create.fail'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        if($news){
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.delete.success'));
        }
        return back()->with('error', __('messages.admin.news.delete.fail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('components.news.edit', [
            'news'=> $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNews $request
     * @param News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateNews $request, News $news)
    {
        $data = $request->only([
            'title',
            'slug',
            'text',
            'status'
        ]);
        $news->category_id = $request->validated()['category_id'];
        $news = $news->fill($data);
        if($news->save()){
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.update.success'));
        }
        return back()->with('error', __('messages.admin.news.update.fail'));
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
