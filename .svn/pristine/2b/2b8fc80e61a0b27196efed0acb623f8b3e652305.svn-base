<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Strain extends Model
{
	use SoftDeletes;
    protected $table = 'strains';
	
    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }

    public function plants()
    {
        return $this->hasMany('App\Plant');
    }

    public function allplants()
    {
        return $this->hasMany('App\Plant')->withTrashed()->orderBy('created_at','desc');
    }

    public function feeds()
    {
        return $this->hasMany('App\Feed');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Post')->where('type_id',5);
    }

    public function images()
    {
        return $this->hasMany('App\Post')->where('type_id',3);
    }   


}
