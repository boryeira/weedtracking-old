<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Phase;
use Carbon\Carbon;

class Plant extends Model
{
    use SoftDeletes;
 	protected $table = 'plants';
    //proxima phase
    protected $appends = array('next_phase');

    public function strain()
    {
        return $this->belongsTo('App\Strain');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function phase()
    {
        return $this->belongsTo('App\Phase');
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

    public function Phases()
    {
        return $this->hasMany('App\Post')->where('type_id',4);
    }

    public function PhaseById($phase_id)
    {
        return $this->belongsTo('App\Post','plant_id')->where('type_id',4)->where('phase_id',$phase_id);
    }

    public function getPhaseAtAttribute($value)
    {
        if($value!=null)
        {
            return Carbon::createFromFormat('Y-m-d', $value);
        }
        else
        {
            return null;
        }

    }

    public function getNextPhaseAttribute($value) 
    {
        $plantPhaseId = $this->phase_id;
        if($plantPhaseId == 1)
            {
                $nextPhaseId = $plantPhaseId + 2; 
                $nextPhase = Phase::find($nextPhaseId);
                return $nextPhase;  
            }
        elseif($plantPhaseId >= 4)
            {

                return null;  
            }
        else
            {
                $nextPhaseId = $plantPhaseId + 1; 
                $nextPhase = Phase::find($nextPhaseId);
                return $nextPhase;
            }  


    }
}
