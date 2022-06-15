<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkRequests\StoreWorkRequest;
use App\Http\Requests\WorkRequests\UpdateWorkRequest;
use App\Http\Services\FileService;
use App\Models\Category;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WorkController extends Controller
{

    public function index()
    {
        $works = Work::all();
        $categories = Category::all();
        return view('works.index', ['works' => $works, 'categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('works.create', ['categories' => $categories]);
    }

    public function store(StoreWorkRequest $request)
    {
        $path = FileService::uploadFileWork($request->file('image'));

        $work = Work::create([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category'),
            'image' => $path
        ]);

        return redirect()->route('admin.works.index', $work)
            ->with('success', 'Данные успешно добавлены...');
    }

    public function showCategory(Request $request, Category $category = null)
    {
        $resSearch = request('search') ?? '';
        if ($resSearch) {
            $works = Work::getIndexWork($resSearch);
        } else {
            $works = $category === null ? Work::all()->where('category_id', $request->get('category')) : $category->works;

        }

        session()->flashInput($request->input());
        return view('works.show',
            [
                'works' => $works,
                'categories' => Category::all(),
            ]);
    }

    public function showCategoryAdmin(Request $request, Category $category = null)
    {
        $works = $category === null ? Work::all() : $category->works;
        if ($request->get('category') && $request->get('category') !== 0) $works = Work::where('category_id', $request->get('category'))->get();
        return view('works.index',
            [
                'works' => $works,
                'categories' => Category::all()
            ]);
    }

    public function edit(Work $work)
    {
        if (Gate::allows('edit-work', $work)) {
            $categories = Category::all();
            return view('works.edit', ['work' => $work, 'categories' => $categories]);
        }
        return redirect()->route('admin.works.index', $work);
    }

    public function update(UpdateWorkRequest $request, Work $work)
    {
        $path = FileService::updateFileWork($request->file('image'), $work->image);

        $work->update([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category'),
            'image' => $path
        ]);


        return redirect()->route('admin.works.index', $work)
            ->with('success', 'Данные успешно сохранены...');
    }

    public function destroy(Work $work)
    {
        FileService::deleteFileWork($work->image);
        $work->delete();

        return redirect()->route('admin.works.index', $work)
            ->with('success', 'Данные успешно удалены...');
    }
}
