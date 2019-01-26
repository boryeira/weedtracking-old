<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feed extends Model
{
    use SoftDeletes;
    protected $table = 'feeds';
    protected $appends = array('prev_phase');

    public function plant()
    {
        return $this->belongsTo('App\Plant')->withTrashed()->with('strain');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function phase()
    {
        return $this->belongsTo('App\Phase');
    }

    public function texts()
    {
        return $this->hasMany('App\Post')->where('type_id',1);
    }


    public function videos()
    {
        return $this->hasMany('App\Post')->where('type_id',2);
    }

    public function images()
    {
        return $this->hasMany('App\Post')->where('type_id',3);
    }
    
    public function phases()
    {
        return $this->hasMany('App\Post')->where('type_id',4);
    }

    public function prevPhases()
    {
        return $this->hasMany('App\Post')->where('type_id',4);
    }

    public function comments()
    {
        return $this->hasMany('App\Post')->where('type_id',5);
    }






}
