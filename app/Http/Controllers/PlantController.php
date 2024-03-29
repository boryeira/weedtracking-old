<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PlantRequest;
use App\Feed;
use App\Post;
use App\Plant;
use App\Phase;
use Auth;
use Session;
use Redirect;
use Cloudder;
use Carbon\Carbon;


class PlantController extends Controller
{
    public function show($plantId)
    {
    	$plant = Plant::withTrashed()->findOrFail($plantId);
        $feeds = Feed::where('plant_id', $plant->id)->orderBy('created_at','asc')->simplePaginate(16);

        //dd($feeds);
        return view('plant.show')->with('feeds', $feeds)
        							->with('plant', $plant);
    }

    public function images($plantId)
    {
        $plant = Plant::withTrashed()->findOrFail($plantId);
       
        return view('plant.images')->with('plant', $plant);

    }


    public function store(PlantRequest $request)
    {

    	$phase = Phase::find($request->phase);
    	$plant = new Plant;
    	$plant->name = $request->name;
    	$plant->user_id = Auth::user()->id;
    	$plant->origin = $request->origin;
        if($request->strain >= 1 ) 
        {
            $plant->strain_id = $request->strain;
        }
    	
        $plant->phase_id = $request->phase;
        $plant->phase_at = $request->date;
        if($plant->save())
        {
            //creamos el day post para el inicio de fase
            $feed = new Feed;
            $feed->user_id = Auth::user()->id;
            $feed->plant_id = $plant->id;
            $feed->feedtype_id = 1;
            if($request->strain >= 1 ) 
            {
                $feed->strain_id = $plant->strain_id;
            }
            $feed->phase_id = $plant->phase_id;
            $feed->phase_day = 1;
            $feed->created_at =  $plant->phase_at;
            if($feed->save())
            {
                $post = new Post;
                $post->plant_id = $plant->id;
                $post->user_id = Auth::user()->id;
                $post->feed_id = $feed->id;
                $post->value = $phase->name;
                $post->type_id = 4;
                $post->type = 'phase';
                $post->created_at =  $plant->phase_at;
                $post->phase_id = $plant->phase_id;
                $post->phase_day = 1;
                $post->save();

                Session::flash('success', 'Planta '.$plant->name.' ha sido creada con éxito.'); 
                return redirect('/user/'.$plant->user->slug.'/plants');                
            }
        }
    	return 'error ';

    }

    //EDITAR INFO
    public function editView($plant_id)
    {
        $plant = Plant::withTrashed()->findOrFail($plant_id);
        return view('plant.edit')->with('plant',$plant);
    }
    public function edit(Request $request)
    {
        
        $plant = Plant::withTrashed()->findOrFail($request->plantId);

        if(Auth::user()->id == $plant->user->id)
        {
            $plant->name = $request->name;
            $plant->description = $request->description;
            if($request->hasFile('image'))
            {
                Cloudder::upload($request->file('image'), null, [], []);
                $publicId = Cloudder::getPublicId();
                //borramos imagen anterior 
                if($plant->avatar==!null){Cloudder::destroyImage($plant->avatar);}
                //guardamos el public id de la imagen
                $plant->avatar = $publicId;
            }

            if($plant->save())
            {
                Session::flash('success', 'Planta editada con éxito.'); 
                return Redirect::back();       
            }
        }
        else
        {
            return Redirect::back();
        }

    }

 //Cambiar EL ESTADO  DE LA PLANTA 
    public function phaseChange(Request $request)
    {
        $plant = Plant::find($request->plantId);
        $phase = Phase::find($request->phaseId);
        $now = Carbon::now();
        $phaseDay = $now->diffInDays($plant->phase_at) + 1;
        //verificamos si existe
        $feed = Feed::where('plant_id',$plant->id)->where('phase_id',$plant->phase_id)->where('phase_day',$phaseDay)->where('feedtype_id',1)->first();
        $lastPhase = Post::where('plant_id',$plant->id)->where('type_id',4)->where('phase_id',$plant->phase_id)->first();
        //dd($availableDay);

        if(count($feed)==0)
        {
            //creamos el post
            $feed = new Feed;
            $feed->plant_id = $plant->id;
            $feed->user_id = Auth::user()->id;
            $feed->feedtype_id = 1;
            $feed->phase_id = $phase->id;
            $feed->phase_day = 1;
            $feed->save();



        }
        else
        {
            $feed->phase_id = $phase->id;
            $feed->phase_day = 1;
            $feed->save();
        }

        $post = new Post;
        $post->plant_id = $plant->id;
        $post->user_id = Auth::user()->id;
        $post->feed_id = $feed->id;
        $post->value = $phase->name;
        $post->type_id = 4;
        $post->type = 'phase';
        $post->phase_id = $phase->id;
        $post->phase_day = 1;
        if($post->save())
        {
            //editamos el ultimo post fase para tener el total de dias
            $lastPhase->value = $phaseDay;
            $lastPhase->save();
            
            $plant->phase_id = $post->phase_id;
            $plant->phase_at = $now;
            $plant->save();
            Session::flash('success', 'Estado cambiado con éxito.'); 
            return Redirect::back();  
        }

        return 'error';
    }


    //COSECHAR PLANTA
    public function harvest(Request $request)
    {
        $plant = Plant::find($request->plantId);
        $phaseDay = Carbon::now()->diffInDays($plant->phase_at) + 1;

        //verificamos si existe
        $feed = Feed::where('plant_id',$plant->id)->where('phase_id',$plant->phase_id)->where('phase_day',$phaseDay)->where('feedtype_id',1)->first();
        $lastPhase = Post::where('plant_id',$plant->id)->where('type_id',4)->where('phase_id',$plant->phase_id)->first();

        if(count($feed)==0)
        {
            //creamos el post
            $feed = new Feed;
            $feed->plant_id = $plant->id;
            $feed->user_id = Auth::user()->id;
            $feed->feedtype_id = 1;
            $feed->phase_id = 5;
            $feed->phase_day = 1;
            $feed->save();

        }
        else
        {
            $feed->phase_id = 5;
            $feed->phase_day = 1;
            $feed->save();
        }

        $post = new Post;
        $post->plant_id = $plant->id;
        $post->user_id = Auth::user()->id;
        $post->feed_id = $feed->id;
        $post->value = 'cosechada';
        $post->type = 'phase';
        $post->type_id = 4;
        $post->phase_id = 5;
        $post->phase_day = 1;
        if($post->save())
        {
            //editamos el ultimo post fase para tener el total de dias
            $lastPhase->value = $phaseDay;
            $lastPhase->save();
            
            $plant->phase_id = 5;
            $plant->phase_at = Carbon::now();
            if($plant->save())
            {
               
                $plant->delete();
                Session::flash('success', 'Planta cosechada con éxito'); 
                return Redirect::back();
            }

        }



    }
}
