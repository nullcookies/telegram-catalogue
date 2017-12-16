<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Categories;
use App\Models\TelegramItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CabinetController extends Controller
{
    public function index ()
    {
        return view('frontend.cabinet.index');
    }

    public function add ()
    {
        $types = TelegramItems::types();
        $categories = Categories::all();

        return view('frontend.cabinet.add', compact('types', 'categories'));
    }
}
