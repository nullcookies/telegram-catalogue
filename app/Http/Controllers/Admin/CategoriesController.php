<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCategory;
use Intervention\Image\Exception\NotFoundException;

class CategoriesController extends Controller
{
    public function index ()
    {
        $categories = Categories::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create ()
    {
        return view('admin.categories.create');
    }

    public function edit ($id)
    {
        try {
            $category = Categories::findOrFail($id);
            return view('admin.categories.edit', compact('category'));
        } catch (NotFoundException $ex) {
            return redirect()->back();
        }

}

    public function store (StoreCategory $request)
    {

        $category = new Categories;
        $category->title = $request->title;

        if ($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория успешно добавлена.');
        }

        return redirect()->back()->with('error', 'Some Error');

    }

    public function update (Request $request, $id)
    {
        try {
            $category = Categories::findOrFail($id);
            $category->title = $request->title;
            $category->status = $request->status;
            $category->update();

            return redirect()->route('admin.categories.index');

        } catch (NotFoundException $ex) {
            return redirect()->back();
        }
    }

    public function delete ($id)
    {

    }

}
