<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    public function step()
    {
        return $this->belongsTo('App\Step', 'id');
    }
}
