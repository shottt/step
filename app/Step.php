<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    
    public function category()
    {
        return $this->belongsTo('App\Category', 'id');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite', 'step_id');
    }

    public function processes()
    {
        return $this->hasMany('App\Process', 'step_id');
    }

    public function challenges()
    {
        return $this->hasMany('App\Challenge', 'step_id');
    }
}
