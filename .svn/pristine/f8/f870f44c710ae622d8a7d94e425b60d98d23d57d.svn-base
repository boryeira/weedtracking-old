@extends('layouts.app')

@section('content')
<div class="container ">

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            {{-- alertas--}}
            @include('alerts.alert')
            

        </div>


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            {{-- Header --}}
            @include('plant.header', ['plant' => $plant])
        </div>


        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="photo-album-wrapper">
                @foreach($plant->images as $img)
                <div class="photo-album-item-wrap col-4-width">
                    <div class="photo-album-item" data-mh="album-item" >
                        <div class="photo-item">
                            <a href="{{Cloudder::show($img->value, ["quality"=>50, "format"=>"jpg","secure" => true])}}"  data-img="{{$img->id}}" data-fancybox="allgalleryplant{{$plant->id}}"  data-url="{{Cloudder::show($img->value, ["secure" => true])}}" data-public="{{$img->value}}" style="position: relative;">
                                <img style="padding:0; margin-right:0" alt="" src="{{Cloudder::show($img->value, ["width" =>300, "height" =>300, "crop"=>"fill","format"=>"jpg","secure" => true ])}}" />

                            </a>
                        </div>

                        <div class="content">
                            <a href="#" class="title h5">{{$img->phase->name}}</a>
                            <span class="sub-title">dia {{$img->phase_day}}</span>

                        </div>

                    </div>
                </div>
                @endforeach

               


            </div>

        </div>

    </div>




</div>





@endsection



