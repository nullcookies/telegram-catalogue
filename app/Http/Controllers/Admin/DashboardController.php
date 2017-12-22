<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use App\Models\TelegramItems;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
class DashboardController extends Controller
{
    public function index ()
    {
        $allUsers = User::count();
        $orders = Orders::where('status', 0)->count();
        $channelsCount = TelegramItems::count();
        return view('admin.dashboard', compact('allUsers', 'orders', 'channelsCount'));
    }

    public function getData ()
    {
        //dd(TelegramItems::all());
        $channels = TelegramItems::select('created_at')
                                    ->get()
                                    ->groupBy(function($date) {
                                        return Carbon::parse($date->created_at)->format('d');
                                    });

        return response()->json($channels);
    }
}
