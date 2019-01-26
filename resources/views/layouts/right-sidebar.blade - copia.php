

<!-- FIXED SIDEBAR RIGHT -->
{{Form::open(['action' => 'FeedController@create','files' => true,'id' => 'seguimiento-sidebar'])}}
<div class="fixed-sidebar right">
  <!-- Fixed Sidebar chica -->
  <div class="fixed-sidebar-right sidebar--small" id="sidebar-right">
    <div class="mCustomScrollbar" data-mcs-theme="dark">


    </div>
    <a  class="olympus-chat inline-items js-sidebar-open fa fa-camera" style="color:white; font-size: 21px"  >
     
    </a>
  </div>
  <!-- Fixed Sidebar grande -->
  @if(!Auth::guest())
  <div class="fixed-sidebar-right sidebar--large" id="sidebar-right-1">
    
      
        <div class="mCustomScrollbar ps ps--theme_default ps--active-y" data-mcs-theme="dark" style="max-height: 600px">
          <div class="ui-block-title ui-block-title-small" style="margin-bottom:0px !important; ">
              <h6   id="track-title" class="title">Seguimiento <strong class="plantName"> aca la planta</strong></h6>
          </div>
          <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card">
              <div class="card-header" role="tab" id="headingOne">
                <h6 class="mb-0 pull-left">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseActive" aria-expanded="false" aria-controls="collapseActive" class="collapsed">
                    Planta activa

                    <span class="fa fa-angle-down  left-menu-icon"></span>
                  </a>
                </h6>
                <h6 class="mb-0 pull-right">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseHarv" aria-expanded="false" aria-controls="collapseHarv" class="collapsed">
                    Planta cosechada
                    <span class="fa fa-angle-down  left-menu-icon"></span>
                  </a>
                </h6>
              </div>

              <div id="collapseActive" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
                <ul class="your-profile-menu">
                  @foreach(Auth::user()->plants as $plant)
                  <li class="inline-items">
                    <div class="radio" style="margin-bottom: 0px;">
                          <label>
                            <input type="radio" name="plantId1" value="{{$plant->id}}" data-name="{{$plant->name}}"><span class="circle"></span><span class="check"></span>
                          </label>
                    </div>
                    <span>{{$plant->name}}</span>

                  </li>
                  @endforeach
                </ul>

              </div>
            </div>
            <div class="card">
              <div id="collapseHarv" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
                <ul class="your-profile-menu">
                  @foreach(Auth::user()->harvested as $plant)
                  <li class="inline-items">
                    <div class="radio" style="margin-bottom: 0px;">
                          <label>
                            <input type="radio" name="plantId1" value="{{$plant->id}}" data-name="{{$plant->name}}"><span class="circle"></span><span class="check"></span>
                          </label>
                    </div>
                    <span>{{$plant->name}}</span>

                  </li>
                  @endforeach
                </ul>

              </div>
            </div>
            <div class="card">
              <div class="card-header text-center" role="tab" id="fastTrack">
                  <div class="radio" style="margin-bottom: 0px;">
                    <label>
                      <input type="radio" name="plantId1" value="0" checked="true"><span class="circle"></span><span class="check"></span>
                      Seguimiento rapido. <strong>Nuevo!</strong>
                    </label>
                  </div>
                </div>


            </div>
          </div> 

          <div class="ui-block">
              <div class="comment-form inline-items" >

                <div class="form-group is-empty" style="width:100% !important">
                  <textarea class="form-control" placeholder="Texto de tu seguimiento..." name="text"></textarea>
                  <span class="material-input"></span><span class="material-input"></span>
                </div>

              </div>
          </div>
        </div> 

         {{--  selector de imagenes para seguimiento de planta --}}
          <div id="plantTrackImage" style="display: none;">
            <div class="photo-album-item create-album "  style="height:80px !important;">
                        <a  class="full-block imageButton">
                          <div class="content">

                            <div class="row">
                              <div class="col-sm-4">
                                <a class="btn btn-control bg-primary imageButton " style="margin: 0 !important" >
                                  <span class="fa fa-camera white" style="color:white;"></span>
                                </a> 
                              </div>
                              <div  class="col-sm-8">
                                <p style="margin-top:15px !important;">Agrega una imagen</p>
                                
                              </div>
                            </div>
                          </div>
                        </a>

                       
                        <div id="inputList" style="display: none;">
                          <input multiple type="file"  name="image[]">
                        </div>

            </div>

            <div class="text-center">
              <div id="imageList"></div>
            </div>
          </div>
          {{--  /end selector de imagenes para seguimiento de planta  --}}

          {{--  selector de imagenes para seguimiento rapido --}}

          <div id="fastTrackImage">
            <div class="photo-album-item create-album "  style="height:80px !important;">
                <a  class="full-block fastImageButton">
                  <div class="content">
                    <div class="row">
                      <div class="col-sm-4">
                        <a class="btn btn-control bg-primary fastImageButton" style="margin: 0 !important" >
                          <span class="fa fa-camera " style="color:white;"></span>

                        </a>
                      </div>
                      <div class="col-sm-8">
                        <p style="margin-top:15px !important;">Comparte una imagen</p>
                      </div>

                    </div>
                  </div>
                </a>


              <div id="fastInputList" style="display: none;">
                <input type="file"  name="fastImage" >
              </div>
            </div>

            <div id="fastTrackImageSelected" class="text-center"></div>


          </div>
          {{--  /end selector de imagenes para seguimiento rapido --}}
          <a  class="olympus-chat text-center" style="padding: 10px;" >
            <button class="btn btn-primary" onClick="this.disabled=true; this.value='Enviando…';this.form.submit();" >realizar seguimiento</button>
          </a>

  </div>
  @else
  <div class="fixed-sidebar-right sidebar--large" id="sidebar-right-1">
    <div class="container">
      <div class="mCustomScrollbar ps ps--theme_default ps--active-y" data-mcs-theme="dark" style="max-height: 600px">
            <div class="text-center" >
              <img  src="{{url('img/upload.png')}}" width="100" style="margin:20px">
              <p>Sube imagenes de tus plantas y crea una bitacora de su crecimiento</p>
              <img  src="{{url('img/service.png')}}" width="100" style="margin:20px">
              <p>Registra tus actividades y comparte el conocimiento.</p>
              <a class="btn btn-grey btn-lg" style="margin-top: 40px; " href="{{url('login')}}">Iniciar sesión</a>
              <p class="text-center"><a class="h6 author-name" href="{{url('/register')}}"><strong>o registrate</strong></a></p>
            
            </div>
      </div>
    </div>
  </div>
  @endif



</div>
{{Form::close()}}
<!-- ... end Fixed Sidebar Right -->




<!-- FIXED SIDEBAR RIGHT -->

  <div class="fixed-sidebar right fixed-sidebar-responsive">

    <div class="fixed-sidebar-right sidebar--small" id="sidebar-right-responsive">
      <a   class="olympus-chat inline-items js-chat-open fa fa-camera" style="color:white; font-size: 21px;" >
      </a>
    </div>

  </div>

  <!-- ... end Fixed Sidebar Right -->

@if(!Auth::guest())


  <!-- ... SEGUIMIENTO RESPONSIVE -->

{{Form::open(['action' => 'FeedController@create','files' => true,'id' => 'seguimiento-sidebar-responsive'])}}
  <div class="ui-block popup-chat popup-chat-responsive">
    <div class="ui-block-title">
      <h4 class="title js-chat-open ">Seguimiento <strong class="plantName"> aca la planta</strong></span></h4>
      <div class="more">
        <a class="fa fa-close js-chat-open" style="font-size: 21px;"></a>
      </div>
    </div>
    <div class="mCustomScrollbar ps ps--theme_default ps--active-y" data-mcs-theme="dark">
      <div id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="card">
              <div class="card-header" role="tab" id="headingOne">
                <h6 class="mb-0 pull-left">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseActive2" aria-expanded="false" aria-controls="collapseActive" class="collapsed">
                    Planta activa

                    <span class="fa fa-angle-down  left-menu-icon"></span>
                  </a>
                </h6>
                <h6 class="mb-0 pull-right">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseHarv2" aria-expanded="false" aria-controls="collapseHarv" class="collapsed">
                    Planta cosechada
                    <span class="fa fa-angle-down  left-menu-icon"></span>
                  </a>
                </h6>
              </div>

          <div id="collapseActive2" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
            <ul class="your-profile-menu">
              @foreach(Auth::user()->plants as $plant)
              <li class="inline-items">
                <div class="radio" style="margin-bottom: 0px;">
                      <label>
                        <input type="radio" name="plantId1" value="{{$plant->id}}" data-name="{{$plant->name}}"><span class="circle"></span><span class="check"></span>
                      </label>
                </div>
                <span>{{$plant->name}}</span>

              </li>
              @endforeach
            </ul>

          </div>
        </div>
        <div class="card">
          <div id="collapseHarv2" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
            <ul class="your-profile-menu">
              @foreach(Auth::user()->harvested as $plant)
              <li class="inline-items">
                <div class="radio" style="margin-bottom: 0px;">
                      <label>
                        <input type="radio" name="plantId1" value="{{$plant->id}}" data-name="{{$plant->name}}"><span class="circle"></span><span class="check"></span>
                      </label>
                </div>
                <span>{{$plant->name}}</span>

              </li>
              @endforeach
            </ul>

          </div>
        </div>
        <div class="card">
          <div class="card-header" role="tab" id="fastTrack2">
              <div class="radio text-center" style="margin-bottom: 0px;">
                <label>
                  <input type="radio" name="plantId1" value="0" checked="true"><span class="circle"></span><span class="check"></span>
                  Seguimiento rapido.<strong>Nuevo!</strong>
                </label>
              </div>
            </div>


        </div>
      </div> 
      <div class="ui-block">
          <div class="comment-form inline-items" >

            <div class="form-group is-empty" style="width:100% !important">
              <textarea class="form-control" placeholder="Texto de tu seguimiento..." name="text"></textarea>
              <span class="material-input"></span><span class="material-input"></span>
            </div>

          </div>
      </div>
{{-- imagen a un seguimiento responsive --}}
      <div id="plantTrackImageResp" style="display: none;">
        <div class="photo-album-item create-album"  style="height:150px !important;">

              <a class=" full-block plantImageButtonResp "  >
                <div class="content">
                    <div class="row">
                      <div class="col-sm-4">
                        <a class="btn btn-control bg-primary" style="margin: 0 !important" >
                          <span class="fa fa-camera " style="color:white;"></span>

                        </a>
                      </div>
                      <div class="col-sm-8">
                        <p style="margin-top:15px !important;">Agrega una imagen</p>
                      </div>

                    </div>
                  </div>
              </a>

        </div>
        <div class="text-center">
                        <div id="plantInputListResp" style="display: none;">
                          <input multiple type="file"  name="image[]">
                        </div>
        </div>
      </div>
{{-- imagen a una foto rapida  responsive--}}
      <div id="fastTrackImageResp" >
        <div class="photo-album-item create-album"  style="height:150px !important;"">


              <a  class=" full-block fastImageButtonResp " >
                <div class="content">
                    <div class="row">
                      <div class="col-sm-4">
                        <a class="btn btn-control bg-primary" style="margin: 0 !important" >
                          <span class="fa fa-camera " style="color:white;"></span>

                        </a>
                      </div>
                      <div class="col-sm-8">
                        <p style="margin-top:15px !important;">Comparte una imagen</p>
                      </div>

                    </div>
                  </div>
              </a>



                <div id="fastInputListResp" style="display: none;">
                  <input type="file"  name="fastImage" >
                </div>
              

           

        </div>
        <div id="fastTrackImageRespSelected" class="text-center">

        </div>
      </div>
      

         



    </div>
    
      <div class="text-center" style="padding-top: 20px;">
        <button class="btn btn-success" onClick="this.disabled=true; this.value='Enviando…';this.form.submit();" >realizar seguimiento</button>
      </div>
  </div>
{{Form::close()}}
<!-- ... end Seguimiento responsive -->
 
 @endif

@section('scripts')

        $('#fastInputList input').change(function() {

            $('#fastTrackImageSelected').html('<p>imagen seleccionada!</p>')
        });

        $('#fastInputListResp input').change(function() {

            $('#fastTrackImageRespSelected').html('<p>imagen seleccionada!</p>')
        });
        

@endsection