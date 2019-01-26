@extends('layouts.app')

@section('content')
<div class="container " >


    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('alerts.alert')

        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ui-block" style="margin-top: 70px;">
                <div class="top-header">
                    
                    <div class="profile-section">
                        <div class="row">

                            <div class="col-lg-5  col-md-5 ">
                                <ul class="profile-menu">

                                </ul>
                            </div>
                            <div class="col-lg-5 offset-lg-2 col-md-5 offset-md-2">
                                <ul class="profile-menu">
                                    @if(Auth::user()->id==$user->id)
                                    <li>
                                        <a  data-toggle="modal" data-target="#open-user-config" >
                                           Editar Perfil
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{url('/user/'.$user->slug().'/plants')}}">Plantas</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="control-block-button">


                        </div>
                    </div>


                    <div class="top-header-author">
                        <a href="{{url('/user/'.$user->slug())}}" class="author-thumb">
                            <img @if($user->avatar!=null) src="{{Cloudder::show($user->avatar, ["width" =>124, "height" =>124, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" @else src="{{url('/img/user.png')}}"@endif alt="author" width=124 height=124>
                        </a>
                        <div class="author-content">
                            <a href="#" class="h4 author-name">{{$user->name}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="clients-grid">
                <div class="row sorting-container" id="clients-grid-1" data-layout="masonry">

                @foreach($feeds as $feed)
                    @if($feed->feedtype_id == 1)
                    <!-- tracking-feed  -->
                    @include('feed.track', ['feed' => $feed, 'page'=>'user'])
                    <!-- ... end tracking-feed  -->
                    <!-- comment-popup  -->

                    @include('popup.comment', ['feed' => $feed])
                    <!-- ... end comment-popup -->
                    @endif 

                    @if($feed->feedtype_id == 2)
                    <!-- tracking-feed  -->
                    @include('feed.share', ['feed' => $feed, 'page'=>'user'])
                    <!-- ... end tracking-feed  -->
                    <!-- comment-popup  -->
                    @include('popup.comment', ['feed' => $feed])

                    <!-- ... end comment-popup -->
                    @endif


                @endforeach    



                </div>

            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center padding80">
                <a class="btn btn-primary text-center" href="{{$feeds->nextPageUrl()}}"> Cargar mas seguimientos</a>
        </div> 
        
    </div>
</div>


<div class="modal fade show" id="open-user-config" >
    <div class="modal-dialog ui-block window-popup edit-widget edit-widget-blog-post">
        <a href="#" class="close icon-close fa fa-close"  style="font-size: 21px" data-dismiss="modal" aria-label="Close">
            
        </a>

        <div class="modal-body">
            <div class="form-group">
              <label>Nombre de usuario</label>
              <input type="text" class="form-control" disabled value="{{ Auth::user()->name }}" />
            </div>
            <div class="form-group">
              <label>Correo electrónico</label>
              <input type="text" class="form-control" disabled value="{{ Auth::user()->email }}" />
            </div>
            {!!Form::open(['action' => 'UserController@config','files'=> true])!!}
            <label>Cambiar foto de perfil</label>
            <div class="form-group"> 
              <input class="form-control upload" type="hidden" name="userId" value="{{$user->id}}">
              <div class="uploader">
                  {!! Form::file('image', ['class' => 'form-control']) !!}
              </div>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit" onClick="this.disabled=true; this.value='Enviando…';this.form.submit();">Subir imagen</button>
            </div>
            {!!Form::close()!!}
        </div>
    </div>

</div>


@endsection

@section('scripts')

@endsection