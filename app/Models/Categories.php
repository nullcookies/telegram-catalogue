<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use Sluggable;

    protected $appends = ['channels_count'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeActive ($query)
    {
        return $query->where('status', 1);
    }

    public function getChannelsCountAttribute ()
    {
        $count = TelegramItems::byCategory($this->id)->count();

        if ($count > 0) {
            return $count;
        }

        return 0;
    }
}
