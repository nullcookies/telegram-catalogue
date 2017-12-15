<?php

namespace App\Http\Controllers\Admin;

use App\Models\TelegramItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChannelsController extends Controller
{
    public function index ()
    {
        $channels = TelegramItems::all();

        return view('admin.channels.index', compact('channels'));
    }
}
