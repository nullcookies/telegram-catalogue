<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Categories;
use App\Models\Orders;
use App\Models\TelegramItems;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Intervention\Image\Image;

class CabinetController extends Controller
{
    public function index ()
    {
        $orders = Orders::where([
            ['user_id', Auth::user()->id],
            ['status', 0]
        ])
        ->orderBy('created_at', 'DESC')
        ->limit(5)
        ->get();

        $channels = TelegramItems::where([
            ['user_id', Auth::user()->id],
            ['status', 1]
        ])
        ->orderBy('created_at', 'DESC')
        ->limit(5)
        ->get();

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

    public function channels ()
    {
        $channels = TelegramItems::byAuthUser()->orderBy('created_at', 'DESC')->paginate(10);

        return view('frontend.cabinet.channels', compact('channels'));
    }

    public function channel ($slug)
    {
        $channel = TelegramItems::whereSlug($slug)->first();

        if ($channel != null) {
            return view('frontend.cabinet.channel', compact('channel'));
        }

        return redirect()->route('frontend.cabinet.channels');
    }

    public function settings ()
    {
        return view('frontend.cabinet.settings');
    }

    public function settingsSave (Request $request)
    {
        $error = false;

        // Upload image
        if ($request->has('avatar')) {
            $uploadedAvatar = $this->uploadAvatar($request->avatar);
            if ($uploadedAvatar) {
                User::where('id', \Auth::user()->id)->update(['avatar' => $uploadedAvatar]);
                $error = true;
            }
        }

        if ($request->telegram_account != null && $this->checkAccount($request->telegram_account)) {
            User::where('id', \Auth::user()->id)->update(['telegram_account' => $request->telegram_account]);
        }


        return response()->json(['data' => $request->all()]);
    }

    private function checkAccount ($account)
    {
        if ($account != \Auth::user()->telegram_account) {
            return true;
        }

        return false;
    }

    private function uploadAvatar ($image)
    {
        $userAvatarFile = \Auth::user()->avatar;

        if ($userAvatarFile != null) {
            $this->removeFile($userAvatarFile);
        }

        $imageName = md5(uniqid()).'.jpg';

        if (\Image::make($image)->fit(400)->save('images/avatars/'.$imageName)) {
            return $imageName;
        }

        return false;

    }

    private function removeFile ($filename)
    {
        \File::delete('images/avatars/'.$filename);
    }
}
