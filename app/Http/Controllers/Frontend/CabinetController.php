<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Categories;
use App\Models\Orders;
use App\Models\TelegramItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    public function index ()
    {
        $orders = Orders::where([
            ['user_id', Auth::user()->id],
            ['status', 0]
        ])->get();

        $channels = TelegramItems::where([
            ['user_id', Auth::user()->id],
            ['status', 1]
        ])->get();

        return view('frontend.cabinet.index', compact('orders', 'channels'));
    }

    public function add ()
    {
        $types = TelegramItems::types();
        $categories = Categories::all();

        return view('frontend.cabinet.add', compact('types', 'categories'));
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'category' => 'required',
            'url' => 'required|url|unique:orders,link',
            'description' => 'required',
            'name' => 'required'
        ],[
            'name.required' => 'Нужно указать название.',
            'url.required' => 'Нужно указать ссылку.',
            'url.url' => 'Неправильный формат ссылки.',
            'url.unique' => 'Канал с таким url уже добавлен.',
            'description.required' => 'Нужно указать описание.'
        ]);

        $order = new Orders;
        $order->user_id = \Auth::user()->id;
        $order->name = $request->name;
        $order->type = (int)$request->type;
        $order->link = $request->url;
        $order->category_id = (int)$request->category;
        $order->description = $request->description;
        $order->client_ip = $request->getClientIp();

        if ($order->save()) {
            return redirect()->route('frontend.cabinet')->with('add-success', 'Ваша заявка находится на рассмотрении. После успешной модерации вы получите уведомление на контактный email.');
        }


        return view('frontend.cabinet.add')->with('success', 'Ошибка при добавлении в каталог.');
    }
}
