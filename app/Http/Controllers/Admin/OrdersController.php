<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
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
        } catch (ModelNotFoundException $ex) {
            return redirect()->back();
        }
    }
}
