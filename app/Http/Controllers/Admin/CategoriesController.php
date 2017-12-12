<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\CategoryTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCategory;

class CategoriesController extends Controller
{
    public function index ()
    {
        $categories = Categories::with('type')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create ()
    {
        $types = CategoryTypes::all();
        return view('admin.categories.create', compact('types'));
    }

    public function store (StoreCategory $request)
    {
        $categoryTypeId = null;

        if ($request->category_type == null && $request->category_type_name != null) {

            $existsId = $this->findCategoryTypeByName($request->category_type_name);

            if ($existsId == null) {
                $type = new CategoryTypes;
                $type->title = $request->category_type_name;
                $type->status = 1;
                if ($type->save()) {
                    $categoryTypeId = $type->id;
                }
            } else {
                $categoryTypeId = $existsId;
            }

        } elseif ($request->category_type != null) {
            $categoryTypeId = $request->category_type;
        } else {
            return redirect()->back()->with('error', 'Some Error');
        }

        $category = new Categories;
        $category->title = $request->title;
        $category->category_type_id = $categoryTypeId;

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

    public function findCategoryTypeByName ($name)
    {
        $type = CategoryTypes::where('title', $name)->first();

        if ($type != null) {
            return $type->id;
        }

        return null;
    }
}
