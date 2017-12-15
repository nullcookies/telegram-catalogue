<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCategory;

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

    public function store (StoreCategory $request)
    {

        $category = new Categories;
        $category->title = $request->title;

        if ($request->status) {
            $category->status = $request->status;
        }

        if ($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория успешно добавлена.');
        }

        return redirect()->back()->with('error', 'Some Error');

    }

    public function update (Request $request, $id)
    {

    }

    public function delete ($id)
    {

    }

}
