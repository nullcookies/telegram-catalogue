<?php

namespace App\Http\Controllers\Frontend;

use App\Models\TelegramItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChannelsController extends Controller
{
    public function index ()
    {
        $channels = TelegramItems::all();

        return view('frontend.channels.index', compact('channels'));
    }

    public function view ($slug)
    {
        $channel = TelegramItems::whereSlug($slug)->first();


        if ($channel == null) {
            return redirect()->back();
        }

        return view('frontend.channels.view', compact('channel'));
    }
}
