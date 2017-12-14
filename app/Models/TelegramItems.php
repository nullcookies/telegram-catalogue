<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TelegramItems extends Model
{
    protected $appends = ['thumbnail'];

    public function category ()
    {
        return $this->belongsTo(Categories::class);
    }

    public function getThumbnailAttribute ()
    {
        return 'images/telegram/'.$this->imagesFolder().'/thumb.jpg';
    }

    public function imagesFolder ()
    {
        $items = explode('/', $this->url);

        return $items[3];
    }
}
