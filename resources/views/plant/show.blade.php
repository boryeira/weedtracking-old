@extends('layouts.app')

@section('content')
<div class="container ">

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('alerts.alert')

        </div>


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            {{-- Header --}}
            @include('plant.header', ['plant' => $plant])
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="clients-grid">
                <div class="row sorting-container" id="clients-grid-1" data-layout="masonry">

                    {{-- strain select --}}
                    @if(!Auth::guest())
                        @if($plant->strain_id == null && Auth::user()->id==$plant->id)
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 sorting-item text-center" >
                                <div class="ui-block bg-blue">
                                    <article class="hentry post">
                                       
                                            <p style="color:white;"> <strong>{{$plant->name}}</strong> no tiene variedad.<br> Selecciona una ya disponible en la plataforma</p>
                                            {{Form::open(['action' => 'StrainController@getDB'])}}
                                                <div class="form-group bg-smoke  form-inline">
                                                   
                                                    <select class="selectpicker  form-control" size="auto" data-live-search="true" name="strain">
                                                        <option value="0" selected >Buscar variedad</option>
                                                        @foreach(App\Strain::all() as $strain)
                                                        <option value="{{$strain->id}}">{{$strain->name}} @if($strain->bank_id =! null)  -- {{$strain->bank->name}} @endif -- {{$strain->type}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input name="plant_id" hidden value="{{$plant->id}}">
            
                                                </div>

                                                <button class="btn btn-breez btn-lg " type="submit">Asignar variedad</button>
                                            {{Form::close()}}
                                           <p style="color:white;" >En en el caso que no este en nuestra base de datos puedes aun buscarla en <strong>www.cannabisreports.com</strong> y ayudarnos a mejorar WEEDTRACKING.</p>



                                            <a href="#" data-toggle="modal" data-target="#open-plant-strain-popup-{{$plant->id}}" class=" btn btn-grey btn-lg">Buscar y asignar en CannabisReports</a>

                                            @include('popup.plant-strain', ['plant' => $plant])
                                            


                             
                                    </article>
                                </div>
                            </div>
                        @endif
                    @endif
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 sorting-item " >
                            <div class="ui-block">
                                <article class="hentry post">
                                        <ul class="widget w-blog-posts">
                                            <li>
                                                <article class="hentry post text-center bg-blue" style="color:white">
                                                    <h4>Resumen</h4>

                                                     <!--fases de la planta-->
                                                    @foreach($plant->phases as $phase)
                                                        @if(is_numeric($phase->value))
                                                        <div class="">{{$phase->phase->name}}: {{$phase->value}} dias </div>
                                                        @endif

                                                    @endforeach
                                                    <div class="">{{$plant->phase->name}} hase {{Carbon\Carbon::now()->diffInDays($plant->phase_at)}} dias</div>

                                                </article>
                                            </li>
                                            <li>
                                                <article class="hentry post">
                                                    <h4>Información</h4>
                                                    <br>
                                                    @if($plant->description != null)
                                                    {!!$plant->description!!}
                                                    @else
                                                    
                                                    <div class="text-center">
                                                        <p>No hay mas registros</p>
                                                    @if(!Auth::guest())    
                                                        @if(Auth::user()->id == $plant->user_id)
                                                        <a  href="{{url('/plant/'.$plant->id.'/edit')}}" class="btn btn-control bg-blue fa fa-edit" style="font-size: 32px;line-height: 1.5"></a>
                                                        <p>Agrega informacion a tu planta</p>
                                                        @endif
                                                    @endif

                                                    </div>
                                                    
                                                    @endif

                                                </article>
                                            </li>
                                        </ul>
                                </article>
                            </div>
                    </div>


                    {{-- END strain select --}}
                    @foreach($feeds as $feed)
                        @if($feed->feedtype_id == 1)
                            <!-- tracking-feed  -->
                            @include('feed.track', ['feed' => $feed, 'page'=>'plant'])
                            <!-- ... end tracking-feed  -->
                            <!-- comment-popup -->
                            @include('popup.comment', ['feed' => $feed])
                            <!-- ... end comment-popup -->

                            @if(!Auth::guest())                        
                                @if(Auth::user()->id == $plant->user_id)  
                                    @include('popup.plant-config', ['plant' => $plant])
                                @endif
                            @endif
                            
                        
                        @endif 

                    @endforeach    

                    <!-- info-popup -->
                    @include('popup.plant-info', ['plant' => $plant])
                    <!-- end info-popup -->

                </div>

            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center padding80">
            <a class="btn btn-primary text-center" href="{{$feeds->nextPageUrl()}}"> Cargar mas seguimientos</a>
        </div>
    </div>




</div>





@endsection



