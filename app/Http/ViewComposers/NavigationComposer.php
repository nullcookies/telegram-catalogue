<?php

namespace App\Http\ViewComposers;

use App\Models\Categories;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose (View $view)
    {
        $categories = Categories::active()->get();

        $view->with('categories', $categories);
    }
}