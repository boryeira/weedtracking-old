<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Phase extends Model
{
	use SoftDeletes;
    protected $table = 'phases';

    public function plants()
    {
        return $this->hasMany('App\Plant')->withTrashed();
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function feeds()
    {
        return $this->hasMany('App\Feed');
    }



}
