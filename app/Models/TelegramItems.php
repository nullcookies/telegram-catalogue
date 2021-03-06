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

        if (count($items) > 2) {
            return $items[3];
        }
        return '';
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeByAuthUser ($query)
    {
        $userId = \Auth::user()->id;

        if ($userId != null) {
            return $query->where('user_id', $userId);
        }

        return null;
    }

    public function scopeByCategory ($query, $id)
    {
        return $query->where('category_id', $id);
    }

    public function scopeTop ($query)
    {
        return $query->whereNotNull('top');
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
