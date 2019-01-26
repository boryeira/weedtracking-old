<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function invited()
    {
        return $this->belongsTo('App\User','new_user_id');
    }
}
