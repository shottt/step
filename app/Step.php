<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
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

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
