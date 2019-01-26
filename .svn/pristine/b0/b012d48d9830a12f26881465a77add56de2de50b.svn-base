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
                                    <li>
                                        <a href="{{url('/strain/'.$strain->id)}}">Seguimientos</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/strain/'.$strain->id.'/plants')}}">Plantas</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="top-header-author">
                        <a  class="author-thumb">
                            <img src="{{url('/img/plant.png')}}" alt="author" width=124 height=124>
                        </a>
                        <div class="author-content">
                            <a href="#" class="h4 author-name">{{$strain->name}}</a>
                            <div class="country">
                               @if($strain->bank_id!=null)<strong>{{$strain->bank->name}}</strong> @endif {{$strain->type}}
                            </div>
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
                @foreach($strain->allPlants as $plant)
                
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
                                                <span class="sub-title"> @if($plant->strain_id!=null)<a href="#">{{$plant->strain->name}}</a> @if($plant->strain->bank_id!=null) del banco <a href="#">{{$plant->strain->bank->name}}</a> @endif @endif</span>
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

@endsection

@section('scripts')

