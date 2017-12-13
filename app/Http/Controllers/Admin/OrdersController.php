<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use App\Telegram\Client;
use App\Telegram\Telegram;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
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

            $avatar = Telegram::getFile($chatInfo->photo->small_file_id);


            $path = public_path('images/telegram/'.uniqid().'.jpg');
            $image = \Image::make($avatar);
            $image->resize(50, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save($path, 70);

            $info = [
                'title' => $chatInfo->title,
                'user_name' => '@' . $chatInfo->username,
                'description' => $chatInfo->description,
                'members_count' => $membersCount
            ];

            dd($info);
        } catch (ModelNotFoundException $ex) {
            return redirect()->back();
        }
    }
}
