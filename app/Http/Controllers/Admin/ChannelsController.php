<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\TelegramItems;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChannelsController extends Controller
{
    public function index ()
    {
        $channels = TelegramItems::orderBy('id', 'DESC')->paginate(10);

        return view('admin.channels.index', compact('channels'));
    }

    public function edit ($id)
    {
        $channel = TelegramItems::findOrFail($id);
        $categories = Categories::active()->get();
        return view('admin.channels.edit', compact('channel', 'categories'));
    }

    public function update (Request $request, $id)
    {
        try {
            $channel = TelegramItems::findOrFail($id);

            $channel->name = $request->name;
            $channel->url = $request->url;
            $channel->category_id = $request->category;
            $channel->description = $request->description;
            $channel->status = $request->status;

            if ($channel->update()) {
                return redirect()->route('admin.channels.edit', $channel->id)->with('success');
            }

            return redirect()->route('admin.channels.edit', $channel->id)->with('fail');
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('admin.channels.edit', $channel->id)->with('fail');
        }
    }
}
