<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Categories;
use App\Models\TelegramItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index ()
    {
        $categories = Categories::active()->get();
        return view('frontend.categories.index', compact('categories'));
    }

    public function show ($slug)
    {
        $category = Categories::whereSlug($slug)->first();

        if ($category == null) {
            return redirect()->back();
        }

        $channels = TelegramItems::byCategory($category->id)->paginate(9);

        if ($channels->isEmpty()) {
            return redirect()->back();
        }

        return view('frontend.categories.show',compact('channels', 'category'));
    }
}
