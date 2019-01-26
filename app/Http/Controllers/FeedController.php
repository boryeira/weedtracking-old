<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\FeedRequest;
use App\Plant;
use App\Feed;
use App\Post;
use Carbon\Carbon;
use Auth;
use Cloudder;
use Session;
use Redirect;

class FeedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function create(FeedRequest $request)
    {
        $plant = null;
        $now = Carbon::now();
        //determinar si es seguimiento rapido o a una planta 
        if($request->plant_id != 0)
        {
            $plant = Plant::withTrashed()->find($request->plant_id);
            $feedType = 1;              
        }
        else {$feedType = 2;}
        
        if($feedType == 1) //si es a una planta
        {
            $phaseDay = $now->diffInDays($plant->phase_at) + 1;
            //verificamos si existe
            // $feed = Feed::where('plant_id',$plant->id)->where('phase_id',$plant->phase_id)->where('phase_day',$phaseDay)->where('feedtype_id',1)->first();
            // if(count($feed)==0) // si no existe creamos el feed
            // {
                
            //     $feed = new Feed;
            //     $feed->user_id = Auth::user()->id;
            //     if($feedType == 1)
            //     {
            //         $feed->plant_id = $plant->id;
            //         $feed->phase_id = $plant->phase_id;
            //         $feed->phase_day = $phaseDay;
            //     }
            //     $feed->feedtype_id = $feedType;
            //     $feed->save();
            // }

            $feed = new Feed;
            $feed->user_id = Auth::user()->id;
            if($feedType == 1)
            {
                $feed->plant_id = $plant->id;
                $feed->phase_id = $plant->phase_id;
                $feed->phase_day = $phaseDay;
            }
            $feed->feedtype_id = $feedType;
            $feed->save();


        }
        elseif($feedType == 2) //si es rapido
        {
            $feed = new Feed;
            $feed->user_id = Auth::user()->id;
            $feed->feedtype_id = $feedType;
            $feed->save();
        }

        //si existe imagen -  guardamos
        if(count($request->file('images'))>0)
        {

            foreach($request->file('images') as $row)
            {
                $imagePost = new Post;

                //Llamamos a la función del helper para procesar la imagen
                $img = \WTHelper::processPost($row);

                Cloudder::upload($img->encode('data-url'), null, [], []);
                $publicId = Cloudder::getPublicId();

                //creamos el post 
                $imagePost->user_id = Auth::user()->id;
                $imagePost->feed_id = $feed->id;
                $imagePost->type_id = 3;
                $imagePost->value = $publicId;
                $imagePost->save();

                //guardamos una copia local con el mismo nombre del del post
                $path = public_path('plants/images/'.$imagePost->id.'.jpg');
                $img->save($path);

                if($plant!=null) //si es a una planta 
                {
                    $imagePost->plant_id = $plant->id;
                    $imagePost->phase_id = $plant->phase_id;
                    $imagePost->phase_day = $phaseDay;
                    $imagePost->save();
                    //si no existe avatar, lo ingresamos automáticamente
                    if($plant->avatar == null and $imagePost->save())
                    {     
                        $plant->avatar = $imagePost->value;
                        $plant->save();
                    }
                }
                
                $feed->touch(); 

            }

        }

        //si existe texto - guardamos
        if($request->has('text'))
        {
            //creamos el post
            $textPost = new Post;
            $textPost->user_id = Auth::user()->id;
            $textPost->feed_id = $feed->id;
            $textPost->type_id = 1;
            if($feedType == 1)
            {
                $textPost->plant_id = $plant->id;
                $textPost->phase_id = $plant->phase_id;
                $textPost->phase_day = $phaseDay;              
            }


            $textPost->value = $request->text;
            $textPost->save();
            $feed->touch();
        }
        Session::flash('success', 'success!'); 
        return Redirect::back(); 


    }



    //Editar FEED 
    public function edit($feed_id)
    {
        $feed = Feed::find($feed_id);
        return view('feed.edit')->with('feed',$feed);
    }

    //Editar text post
    public function textUpdate(Request $request)
    {
        $feed = Feed::find($request->feed_id);
        if($request->has('post_id'))
        {
            $post = Post::find($request->post_id);
            $post->value = $request->text;
            if($post->save())
            {
                Session::flash('success', 'texto editado'); 
                return Redirect::back(); 
            }
            else
            {

                Session::flash('warning', 'error al editar texto'); 
                return Redirect::back(); 
            }
        }
        else
        {
            //creamos el post
            $textPost = new Post;
            $textPost->user_id = Auth::user()->id;
            $textPost->feed_id = $feed->id;
            $textPost->type_id = 1;
            if($feed->type == 1)
            {
                $textPost->plant_id = $feed->plant->id;
                $textPost->phase_id = $feed->phase_id;
                $textPost->phase_day = $feed->phase_day;              
            }


            $textPost->value = $request->text;
            if($textPost->save())
            {
                $feed->touch();
                Session::flash('success', 'texto editado'); 
                return Redirect::back(); 
            }
            

        }



    }

    //Editar FEED 
    public function imageAdd(Request $request)
    {
        $feed = Feed::find($request->feed_id);

        if(count($request->file('new_image'))>0)
        {
            $imagePost = new Post;

            //Llamamos a la función del helper para procesar la imagen
            $img = \WTHelper::processPost($request->file('new_image'));

            Cloudder::upload($img->encode('data-url'), null, [], []);
            $publicId = Cloudder::getPublicId();

            //creamos el post 
            $imagePost->user_id = Auth::user()->id;
            $imagePost->feed_id = $feed->id;
            $imagePost->type_id = 3;
            $imagePost->value = $publicId;
            $imagePost->save();

            //guardamos una copia local con el mismo id del post
            $path = public_path('plants/images/'.$imagePost->id.'.jpg');
            $img->save($path);       
            $feed->touch(); 

            Session::flash('success', 'Imagen agregada'); 
            return Redirect::back(); 
        }
        else
        {
            Session::flash('warning', 'Se debe seleccionar una imagen'); 
            return Redirect::back(); 

        }
    }

    //Editar FEED 
    public function imageDelete(Request $request)
    {
        $post = Post::find($request->post_id);
        Cloudder::delete($post->value);
        if($post->delete())
        {
            Session::flash('success', 'Imagen eliminada'); 
            return Redirect::back();  
        }

    }

    //Eliminar FEED 
    public function delete(Request $request)
    {
        $feed = Feed::find($request->feed_id);
        $posts = $feed->posts;
        foreach ($posts as $post) {

            if($post->type_id==3)
            {
                Cloudder::delete($post->value);
               
            }
             $post->delete();
        }

        if($feed->delete())
        {
            Session::flash('success', 'Seguimiento Eliminado'); 
            return Redirect::back();  
        } else {
            Session::flash('warning', 'Seguimiento no pudo ser Eliminado'); 
            return Redirect::back(); 
        }

    }

    //COMENTARIO AL FEED 
    public function comment(CommentRequest $request)
    {
        $feed = Feed::find($request->feed);
        $comment = new Post;
        $comment->user_id = Auth::user()->id;
        $comment->feed_id = $feed->id;

        $comment->value = $request->comment;
        $comment->type_id = 5;
        $comment->type = 'comment';

        if($feed->feedtype_id==1)
        {
            $comment->plant_id = $feed->plant_id;
            $comment->phase_id = $feed->phase_id;
            $comment->phase_day = $feed->phase_day;            
        }

        if($comment->save())
        {
            $feed->touch();
            Session::flash('success', 'Comentario registrado con éxito.'); 
            return Redirect::back();       
        }


    }





}
