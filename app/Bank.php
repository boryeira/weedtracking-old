<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
	use SoftDeletes;
    protected $table = 'banks';

    public function strains()
    {
        return $this->hasMany('App\Strain');
    }
}
