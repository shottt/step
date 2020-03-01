<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    // belongsTo設定
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function processes()
    {
        return $this->hasMany('App\Process');
    }
}
