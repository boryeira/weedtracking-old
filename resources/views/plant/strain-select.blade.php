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
            <div class="clients-grid">
                <div class="row sorting-container" id="clients-grid-1" data-layout="masonry">

                    
                    
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 sorting-item text-center" >
                            <div class="ui-block ">
                                <article class="hentry post">
                                    <div class="author-thumb">
                                        <img width="125" @if($strain->avatar!=null) @else src="{{url('img/plant.png')}}" @endif alt="">
                                    </div>
                                        
                                    <div class="author-content">
                                        <a href="#" class="h5 author-name">{{$strain->name}}</a>
                                        <div class="country"></div>
                                        
                                        {{Form::open(['action' => 'StrainController@assignPlant'])}}
                                        <input  name="plant_id" value="{{$plant->id}}" hidden>
                                        <input  name="strain_id" value="{{$strain->id}}" hidden>
                                        @if($strain->type=="nn")
                                        <p >Elegir tipo de semilla</p>
                                        <div class="form-group">
                                            <select name="strain_type">
                                                <option value="feminizada">Feminizada</option>
                                                <option value="automatica">Automatica</option>
                                                <option value="normal">Normal</option>
                                            </select>
                                        </div>
                                        @endif
                                        <p class="alert alert-warning">Confirmar que la variedad sea la correcta antes de guardar.<br>No se podra volver a cambiar de variedad.</p>

                                        <button class="btn btn-grey" type="submit">Confirmar variedad</button>
                                        {{Form::close()}}
                                        <a class="btn btn-yellow" href="{{url('plant/'.$plant->id)}}">volver</a>
                                    </div>

                         
                                </article>
                            </div>
                        </div>
                    
                </div>

            </div>
        </div>
    </div>




</div>





@endsection



