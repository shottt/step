<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function processes()
    {
        return $this->hasMany('App\Process');
    }

    public function challenges()
    {
        return $this->hasMany('App\Challenge');
    }
}
