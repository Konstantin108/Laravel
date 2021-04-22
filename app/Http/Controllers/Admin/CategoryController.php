<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;
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
     * @param CreateCategory $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCategory $request)
    {
        $data = $request->only([
            'title',
            'description',
            'is_visible'
        ]);
        $category = Category::create($data);
        if($category){
            return redirect()->route('admin.category.index')
                ->with('success', __('messages.admin.category.create.success'));
        }
        return back()->with('error',__('messages.admin.category.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        if($category){
            return redirect()->route('admin.category.index')
                ->with('success', __('messages.admin.category.delete.success'));
        }
        return back()->with('error', __('messages.admin.category.delete.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category): \Illuminate\Http\Response
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
     * @param UpdateCategory $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategory $request, Category $category)
    {
        $data = $request->only(['title', 'description', 'is_visible']);
        $status = $category->fill($data)->save();
        if($status){
            return redirect()->route('admin.category.index')
                ->with('success', __('messages.admin.category.update.success'));
        }
        return back()->with('error', __('messages.admin.category.update.fail'));
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
