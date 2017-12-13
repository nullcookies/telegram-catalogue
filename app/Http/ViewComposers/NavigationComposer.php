<?php

namespace App\Http\ViewComposers;

use App\Models\CategoryTypes;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose (View $view)
    {
        $catTypes = CategoryTypes::all();

        $view->with('catTypes', $catTypes);
    }
}