<?php
/**
 * Created by PhpStorm.
 * User: pavlenko
 * Date: 22.12.17
 * Time: 18:11
 */

namespace App\Stats\Controllers;

use App\Models\TelegramItems as Item;
use App\Stats\Models\ItemsCount as Count;

use Carbon\Carbon;

class ItemCountController
{
    public static function collect ()
    {
        $date = Carbon::now()->toDateString();
        $count = Item::whereDate('created_at', $date)->count();

        $statItem = Count::where('date', $date)->first();

        if ($statItem == null) {
            $newItem = new Count;
            $newItem->date = $date;
            $newItem->count = $count;
            $newItem->save();
        } else {
            $statItem->count = $count;
            $statItem->update();
        }

    }
}