<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class TelegramItems extends Model
{
    use Sluggable;

    protected $appends = ['thumbnail', 'user_name'];

    public function category ()
    {
        return $this->belongsTo(Categories::class);
    }

    public function getThumbnailAttribute ()
    {
        return 'images/telegram/'.$this->imagesFolder().'/thumb.jpg';
    }

    public function getAvatarAttribute ()
    {
        return 'images/telegram/'.$this->imagesFolder().'/normal.jpg';
    }

    public function getUserNameAttribute ()
    {
        return '@'.$this->imagesFolder();
    }

    public function imagesFolder ()
    {
        $items = explode('/', $this->url);

        return $items[3];
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function types()
    {
        return [
            (object)[
                'id' => 1,
                'title' => 'Канал'
            ],
            (object)[
                'id' => 2,
                'title' => 'Бот'
            ],
            (object)[
                'id' => 3,
                'title' => 'Публичный чат'
            ],
            (object)[
                'id' => 4,
                'title' => 'Приватный чат'
            ],
            (object)[
                'id' => 5,
                'title' => 'Стикерпак'
            ],
        ];
    }
}
