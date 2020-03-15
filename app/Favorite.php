<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function step()
    {
        return $this->belongsTo('App\Step', 'step_id');
    }
}
