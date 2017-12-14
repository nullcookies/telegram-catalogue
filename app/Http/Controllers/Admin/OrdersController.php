<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\Orders;
use App\Models\TelegramItems;
use App\Telegram\Client;
use App\Telegram\Telegram;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class OrdersController extends Controller
{

    protected $_user_name = null;

    public function index ()
    {

        $orders = Orders::where('status', 0)->orderBy('id','desc')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function approve ($id)
    {
        try {
            $order = Orders::findOrFail($id);
            $membersCount = Telegram::getUsersCount('@bodyfit_net');
            $chatInfo = Telegram::getChat('@bodyfit_net');

            $this->_user_name = $chatInfo->username;

            $this->makeImage($chatInfo->photo);

            $info = [
                'title' => $chatInfo->title,
                'description' => $chatInfo->description,
                'image' => 'images/telegram/'.$chatInfo->username.'/normal.jpg',
                'members_count' => $membersCount
            ];

            $categories = Categories::all();

            return view('admin.orders.approve', compact('order', 'info', 'categories'));
        } catch (ModelNotFoundException $ex) {
            return redirect()->back();
        }
    }

    public function store (Request $request)
    {
        $item = new TelegramItems;
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->url = $request->url;
        $item->status = 1;

        if ($item->save()) {
            return redirect()->route('admin.channels.index');
        }

        return redirect()->back();
    }

    public function makeImage ($photo)
    {
        $error = true;

        if (!$this->checkDirectoryExists($this->_user_name)) {
            $this->makeDirectory($this->_user_name);
        }

        if ($this->makeThumb($photo->small_file_id) && $this->makeNormal($photo->big_file_id)) {
            $error = false;
        }

        if ($error == true) {
            return false;
        }

        return true;
    }

    public function makeThumb ($id)
    {
        if ($this->_user_name != null) {
            $avatarThumb = Telegram::getFile($id);
            $imageThumb = \Image::make($avatarThumb);
            $imageThumb->resize(50, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $pathThumb = public_path('images/telegram/'.$this->_user_name.'/thumb.jpg');
            $imageThumb->save($pathThumb, 100);

            return true;
        }
        return false;
    }

    public function makeNormal ($id)
    {
        if ($this->_user_name != null) {
            $avatar = Telegram::getFile($id);
            $image = \Image::make($avatar);
            $image->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path = public_path('images/telegram/'.$this->_user_name.'/normal.jpg');
            $image->save($path, 100);

            return true;
        }
        return false;
    }

    public function checkDirectoryExists ($name)
    {
        $path = public_path('images/telegram/'.$name);

        if (File::exists($path)) {
            return true;
        }

        return false;
    }

    public function makeDirectory ($name)
    {
        if (File::makeDirectory('images/telegram/'.$name)) {
            return true;
        }

        return false;
    }
}
