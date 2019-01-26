@extends('layouts.app')

@section('content')
<div class="container ">

            {{-- Success --}}
            @if(Session::has('success'))
                    <div class="alert alert-success">
                        <i class=" fa fa-check position-left"></i>  {{ Session::get('success') }}
                    </div>
            @endif
            {{-- END Success --}}
             {{-- Errores --}}
            @if($errors->any())
            <div class="row">
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                    
                </div>
            </div>
            @endif


    <div class="row">
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
                    </div>
                    <div class="top-header-author">
                        <a  href="{{url('/user/'.$user->slug())}}" class="author-thumb">
                            <img @if($user->avatar!=null) src="{{Cloudder::show($user->avatar, ["width" =>124, "height" =>124, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" @else src="{{url('/img/user.png')}}"@endif alt="author" width=124 height=124>
                        </a>
                        <div class="author-content">
                            <a href="#" class="h4 author-name">{{$user->name}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div  id="photo-page" >
                <div class="photo-album-wrapper">
                    @if(Auth::user()->id == $user->id)
                    <div class="photo-album-item-wrap col-4-width">
                        <div class="photo-album-item create-album" data-mh="album-item" style="min-height: 250px;">

                            <a href="#" data-toggle="modal" data-target="#create-plant" class="  full-block">
                                <div class="content">

                                <div class="btn btn-control bg-primary " >
                                    <span class="fa fa-plus white" style="color:white;"></span>
                                    
                                </div>

                                <h5>Crear nueva planta</h5>


                                </div>
                            </a>



                        </div>
                    </div>
                    @endif
                @foreach($plants as $plant)
                
                    <div class="photo-album-item-wrap col-4-width">
                                        <div class="photo-album-item" data-mh="album-item" style="height: 458px;">
                                            <div class="photo-item">
                                                <img @if($plant->avatar!=null) src="{{Cloudder::show($plant->avatar, ["width" =>600, "height" =>600, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" @else src="{{url('/img/plant.png')}}"@endif alt="photo">
                                                <div class="overlay overlay-light"></div>
                                                <a href="{{url('/plant/'.$plant->id)}}" class="post-add-icon">
                                                   
                                                    
                                                </a>
                                                <a href="{{url('/plant/'.$plant->id)}}"  class="full-block"></a>
                                            </div>

                                            <div class="content">
                                                <a href="{{url('/plant/'.$plant->id)}}"  class="title h5">{{$plant->name}}</a>
                                                <span class="sub-title"> @if($plant->strain_id!=null)<a href="{{url('strain/'.$plant->strain_id)}}">{{$plant->strain->name}}</a> @if($plant->strain->bank_id!=null) del banco <a href="#">{{$plant->strain->bank->name}}</a> @endif @endif</span>
                                                <span>{{$plant->phase->name}} hase {{Carbon\Carbon::now()->diffInDays($plant->phase_at)}} dias</span>

                                            </div>

                                        </div>
                    </div>
                
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal nueva planta --}}
<div class="modal fade show" id="create-plant" >
    <div class="modal-dialog ui-block window-popup create-event">
        <a href="#" class="close icon-close fa fa-close" data-dismiss="modal" aria-label="Close">
           
        </a>

        <div class="ui-block-title">
            <h6 class="title">Crear nueva planta</h6>
        </div>
        {{Form::open(['action' => 'PlantController@store'])}}
        <div class="ui-block-content">
            <label class="control-label">Nombre planta</label>
            <div class="form-group label-floating is-select">
                
                <input class="form-control" placeholder="El nombre con que has bautizado a tu planta" value="" type="text" name="name">
            </div>

            <div class="form-group ">
                <label class="control-label">Origen de la planta</label>
                <select class="form-control" size="auto" name="origin">
                    <option value="seed" selected>Semilla</option>
                    <option value="stem">Esqueje</option>
                </select>
            </div>

            <div class="form-group ">
                <label class="control-label">Variedad</label>
                <select class="selectpicker form-control" size="auto" data-live-search="true" name="strain">
                    <option value="0" selected >Otra</option>
                    @foreach(App\Strain::all() as $strain)
                    <option value="{{$strain->id}}">{{$strain->name}} @if($strain->bank_id =! null)  -- {{$strain->bank->name}} @endif -- {{$strain->type}}</option>
                    @endforeach
                </select>
                <div class="alert alert-warning">si tu variedad o cepa no se encuentra, selecciona la opcion "Otra"</br> Despues puedes crear la variedad en la seccion variedades y asignarla a tu planta</div>
            </div>

            <div class="panel">

                <div class="form-group ">
                    <label class="control-label">Etapa en la que esta la planta actualmente</label>
                    <select class="form-control" size="auto" name="phase">
                        @foreach(App\Phase::all() as $phase)
                        <option value="{{$phase->id}}">{{$phase->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group ">
                    <label class="control-label">Fecha en que comenzo esa estapa aproximadamente</label>
                    <input class="form-control" name="date" value="" type="date">
                </div>

            </div>

            <button class="btn btn-breez btn-lg full-width">Crear planta</button>

        </div>
        {{Form::close()}}
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

