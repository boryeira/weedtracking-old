<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Post extends Model
{

    protected $table = 'posts';



    public function plant()
    {
        return $this->belongsTo('App\Plant')->withTrashed()->with('strain');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function feed()
    {
        return $this->belongsTo('App\Feed');
    }

    public function phase()
    {
        return $this->belongsTo('App\Phase');
    }
    public function strain()
    {
        return $this->belongsTo('App\Strain');
    }


}