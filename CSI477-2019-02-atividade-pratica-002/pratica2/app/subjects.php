<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subjects extends Model
{
    // Subject -> Request (1:N)
    public function requests()
    {
        return $this->hasMany('App\User');
    }
}
