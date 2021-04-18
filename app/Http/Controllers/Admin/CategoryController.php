<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('is_visible', true)->get();
        return view('components.admin-category', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.admin-add-category');
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
            'title' => ['required', 'string', 'min:2'],
            'description' => ['required', 'string', 'min:2'],
            'is_visible' => ['required', 'string', 'min:1']
        ]);
        $data = $request->only([
            'title',
            'description',
            'is_visible'
        ]);
        $category = Category::create($data);
        if($category){
            return redirect()->route('admin.category.index')
                ->with('success', 'категория успешно добавлена');
        }
        return back()->with('error', 'не удалось добавить категорию');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        if($category){
            return redirect()->route('admin.category.index')
                ->with('success', 'категория была удалена');
        }
        return back()->with('error', 'не удалось удалить категорию');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        return "показать {$category}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('components.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:2'],
            'description' => ['required', 'string', 'min:2'],
            'is_visible' => ['required', 'string', 'min:1']
        ]);
        $data = $request->only(['title', 'description', 'is_visible']);
        $status = $category->fill($data)->save();
        if($status){
            return redirect()->route('admin.category.index')
                ->with('success', 'категория успешно изменена');
        }
        return back()->with('error', 'не удалось сохранить изменения');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
