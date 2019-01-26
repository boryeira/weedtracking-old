<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InvitationRequest;
use App\Http\Requests\UserRequest;
use App\Feed;
use App\User;
use App\Plant;
use App\Invitation;
use Auth;
use Mail;
use Session;
use Redirect;
use Cloudder;

class UserController extends Controller
{

    public function show($slug)
    {

    	//$user = User::find($userId);
        $user = User::findBySlug($slug);
        $feeds = Feed::where('user_id',$user->id)->orderBy('updated_at','desc')->simplePaginate(16);
       
        return view('user.show')->with('feeds', $feeds)
        						->with('user', $user);
    }

    public function plants($slug)
    {
        $user = User::findBySlug($slug);
        $plants = $user->allplants;
       
        return view('user.plants')->with('plants', $plants)
        						->with('user', $user);
    }

/////INVITACIONES
    public function invitation()
    {
        $user = Auth::user();
        return view('user.invitation')->with('user', $user);
    }

    public function mailInvitation(InvitationRequest $request)
    {
        $user = Auth::user();
        if($user->invitationsNotUsed->count()>0)
        {
            $invitation = $user->invitationsNotUsed->first();
            $invitation->email = $request->email;
            if($invitation->save())
            {
                //aca mandar el mail
                Mail::send('mail.invitation', ['invitation'=> $invitation, 'user'=>$user], function($message) use ($invitation){
                    
                    $message->to($invitation->email);
                    $message->subject('Has sido invitado a Weedtracking.com');

                });

                Session::flash('success', 'Invitación enviada!'); 
                return redirect('/user/invitation');
            }
            else 
            { 
                return 'error mail'; 
            }
        }
        else
        {
            Session::flash('warning', 'Problema al generar la invitacion!'); 
            return redirect('/user/invitation');

        }


    }
//////////////////


    public function config(UserRequest $request)
    {
        $user = User::find($request->userId);

        if($request->hasFile('image'))
        {
            Cloudder::upload($request->file('image'), null, [], []);
            $publicId = Cloudder::getPublicId();
            //borramos imagen anterior 
            if($user->avatar!=null){Cloudder::destroyImage($user->avatar);}
            //guardamos el public id de la imagen
            $user->avatar = $publicId;


        }

        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }

        if($user->save())
        {
            Session::flash('success', 'Información actualizada con éxito.'); 
            return redirect('/user/'.$user->slug);
        }

        return redirect::back();
    }

    public function passwordDefault($id)
    {
      //  dd($id);
        $user = User::find($id);
        $user->password = bcrypt('123123');
        if($user->save())
        {
            return 'usuario '.$user->name.' a quedado con password 123123';
        }
        else
        {
            return 'no se pudo cambiar el password';
        }

    }


}
