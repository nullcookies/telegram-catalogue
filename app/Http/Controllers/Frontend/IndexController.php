<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Categories;
use App\Models\Orders;
use App\Models\TelegramItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    CONST TYPE_CATEGORIES = 4;

    public function index ()
    {
        $channels = TelegramItems::where('status', 1)->inRandomOrder()->take(6)->get();
        $newChannels = TelegramItems::where('status', 1)->orderBy('id', 'ASC')->take(6)->get();

        return view('frontend.index', compact('channels', 'newChannels'));
    }

    public function addChanel ()
    {
        $categories = Categories::where('category_type_id', self::TYPE_CATEGORIES)->get();
        return view('frontend.pages.add_chanel', compact('categories'));
    }

    public function chanelStore (Request $request)
    {

        $this->validate($request, [
            'link' => 'required|max:30|unique:orders',
            'category' => 'required'
        ]);

        $order = new Orders;
        $order->link = $request->link;
        $order->category_id = (int)$request->category;
        $order->description = $request->description;
        $order->comment = $request->comment;
        $order->client_ip = $request->getClientIp();

        if ($order->save()) {
            return redirect('/');
        }

        return redirect('/');
    }
}
