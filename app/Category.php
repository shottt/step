<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // hasMany設定
    public function steps()
    {
        return $this->hasMany('App\Step', 'category_id');
    }
}
