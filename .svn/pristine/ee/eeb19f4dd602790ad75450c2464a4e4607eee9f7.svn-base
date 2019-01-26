@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            {{-- alertas--}}
            @include('alerts.alert')
            

        </div>


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            {{-- Header --}}
            @include('plant.header', ['plant' => $feed->plant])
            
        </div>
        @if($feed->feedtype_id == 1)
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ui-block responsive-flex">
                    <div class="ui-block-title">
                    {{$feed->phase->name}} dia  {{$feed->phase_day}}
                    <span class="pull-right">{{$feed->created_at->format('d-m-y')}}</span>
                    </div>
            </div>
        </div>
        @endif


        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Imagenes</h6>
                </div>
                <div class="ui-block-content">
                    <ul class="widget w-last-photo js-zoom-gallery">
                        @if(count($feed->images)>0)
                            @foreach($feed->images()->orderBy('created_at','desc')->get() as $count => $image)
                            <li class="text-center">
                                    <img style="width: 100%" src="{{Cloudder::show($image->value, ["width" =>300, "height" =>300, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" alt="photo">

                                    <button data-post="{{$image->id}}" data-url="{{Cloudder::show($image->value, ["width" =>300, "height" =>300, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" class="btn btn-blue" data-toggle="modal" data-target="#modal_image_delete" onClick="$('#input_delete').val(this.getAttribute('data-post'));document.getElementById('image_delete').src= this.getAttribute('data-url');">Eliminar</button>

                            </li>
                            @endforeach
                        @endif
                        
                            
                                
                           
                        
                    </ul>
                    <div class="modal fade show" id="modal_image_delete" >
                        <div class="modal-dialog ui-block" style="max-width:720px">
                            <a href="" class="close icon-close fa fa-close" data-dismiss="modal" aria-label="Close">
                            </a>

                            <div class="modal-body text-center">
                                {!!Form::open(['action' => 'FeedController@imageDelete'])!!}
                                
                                    <input id="input_delete" type="" name="post_id" value="" hidden>
                                    <p>¿Esta seguro de eliminar la imagen?</p>
                                    <img id="image_delete" >
                                    <button type="submit" class="btn btn-blue btn-lg ">Eliminar</button>

                                {!!Form::close()!!}

                            </div>
                        </div>
                    </div>



                    @if(count($feed->images)<6)
                    <div class="photo-album-item create-album " id="image_button_update" style="min-height:90px !important;display: block;margin-bottom: 10px" >
                        <a  class="full-block ">
                          <div class="content">

                            <div class="row">
                              <div class="col-sm-4">
                                <a class="btn btn-control bg-primary " style="margin: 0 !important" >
                                  <span class="fa fa-camera white" style="color:white;"></span>
                                </a> 
                              </div>
                              <div  class="col-sm-8">
                                <p style="margin-top:15px !important;">Selecciona las imagenes</p>
                                
                              </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    {!!Form::open(['action' => 'FeedController@imageAdd','files' => true])!!}
                    <input  name="feed_id" value="{{$feed->id}}" hidden >
                    <div id="image_input_update">
                        <input type="file" name="new_image" class="image_file_update" id="image_alone" hidden >
                    </div>
                    <div id="image_thumbs_update" >
                        <img width="80" id="img_alone"/>
                        <button class="btn btn-blue pull-right" type="submit">Agregar</button>
                    </div>
                    {!!Form::close()!!}
                    @else
                    <div id="image_button_update"></div>
                    <div  id="image_alone"></div>
                    @endif

                    
                </div>
            </div>
           
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Texto</h6>
                </div>
                <div class="ui-block-content">
                    {!!Form::open(['action' => 'FeedController@textUpdate'])!!}
                    <input  name="feed_id" value="{{$feed->id}}" hidden>
                        <div class="form-group is-empty" style="width:100% !important">
                            <textarea class="form-control"  name="text" @if(count($feed->texts)==0) placeholder="Agrega un texto a tu seguimiento" @endif> 
                                @if(count($feed->texts)>0) {{$feed->texts[0]->value}} @endif 
                            </textarea>
                        </div>
                        @if(count($feed->texts)>0)
                        <input  name="post_id" value="{{$feed->texts[0]->id}}" hidden>
                        @endif
                        <button class="btn btn-blue " type="submit">Cambiar</button>
                        
                    {!!Form::close()!!}
                </div>

            </div>
           
        </div>


    </div>




</div>





@endsection

@section('scripts')

<script type="text/javascript">

    $(document).ready(function() {

        function imageHandlerUpdate(evt) {

            var inpu = $('#image_input_update .image_file_update');
            inpu.trigger('click');     

        };
        function imageSelect(evt) {

            var reader = new FileReader();


            reader.onload = function (e) {
              // get loaded data and render thumbnail.
              document.getElementById("img_alone").src = e.target.result;

              

        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
        }


        document.getElementById('image_button_update').addEventListener('click', imageHandlerUpdate, false);
        document.getElementById('image_alone').addEventListener('change', imageSelect, false);
    });

</script>

@endsection