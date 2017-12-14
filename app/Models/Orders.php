<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['status'];

    public function category ()
    {
        return $this->belongsTo(Categories::class);
    }
}
