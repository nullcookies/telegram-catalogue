<?php

namespace App\Http\ViewComposers;

use App\Models\TelegramItems;
use Illuminate\View\View;

class TopThreeChannelsComposer
{
    public function compose (View $view)
    {
        $channels = TelegramItems::top()->take(3)->get();

        $view->with('channels', $channels);
    }
}