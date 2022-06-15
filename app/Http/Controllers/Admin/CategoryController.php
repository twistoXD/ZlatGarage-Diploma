<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequests\StoreCategoryRequest;
use App\Http\Requests\CategoryRequests\UpdateCategoryRequest;
use App\Http\Services\FileService;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function category()
    {
        $resSearch = request('search') ?? '';
        $categories = Category::getIndexCategory($resSearch);

        return view('categories.category', ['categories' => $categories]);
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $path = FileService::uploadFileCategory($request->file('image'));

        $category = Category::create([
            'name' => $request->get('name'),
            'content' => $request->get('content'),
            'image' => $path,
        ]);

        return redirect()->route('admin.categories.show', $category)
            ->with('success', 'Данные успешно сохранены...');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        if (Gate::allows('edit-category', $category)) {
            return view('categories.edit', ['category' => $category]);
        }
        return redirect()->route('admin.category.show', $category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $path = FileService::updateFileCategory($request->file('image'), $category->image);

        $category->update([
            'name' => $request->get('name'),
            'content' => $request->get('content'),
            'image' => $path
        ]);


        return redirect()->route('admin.categories.show', $category)
            ->with('success', 'Данные успешно сохранены...');
    }

    public function destroy(Category $category)
    {
        if (Gate::allows('delete-category', $category)) {
            FileService::deleteFileCateg($category->image);
            $category->delete();

            return redirect()->route('admin.categories.index')
                ->with('success', 'Данные успешно удалены...');
        }

        return redirect()->route('admin.categories.show', $category);
    }
}
