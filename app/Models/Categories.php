<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function type ()
    {
        return $this->belongsTo(CategoryTypes::class, 'category_type_id', 'id');
    }
}
