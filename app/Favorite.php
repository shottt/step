<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function favorite()
    {
        return $this->belongsTo('App\Step');
    }
}
