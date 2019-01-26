<!-- FIXED SIDEBAR LEFT -->

<div class="fixed-sidebar">
  <div class="fixed-sidebar-left sidebar--small" id="sidebar-left">
    <a href="#" class="logo js-sidebar-open">
      <img src="{{url('img/logo.png')}}" width="40" alt="WeedTracking">
    </a>

    <div class="mCustomScrollbar " data-mcs-theme="light">
      <ul class="left-menu">
        <li>
          <a href="#" class="js-sidebar-open fa fa-chevron-left famenu" >
          </a>
        </li>
        <li>
          <a href="{{url('/home')}}" class="fa fa-home famenu" data-toggle="tooltip" data-placement="right" data-original-title="Inicio">
          </a>
        </li>
        <li>
          <a href="{{url('/user/'.Auth::user()->id)}}" class="fa fa-eye famenu" data-toggle="tooltip" data-placement="right" data-original-title="Mis seguimientos">
          </a>
        </li>
        <li>
          <a href="{{url('/user/'.Auth::user()->id.'/plants')}}" class="fa fa-leaf famenu" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mis plantas">
          </a>
        </li>
        <li>
          <a href="#" class="fa fa-tree famenu" data-toggle="tooltip" data-placement="right" title="" data-original-title="Variedades">
          </a>
        </li>

      </ul>
    </div>
  </div>

  <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
    <a href="#" class="logo js-sidebar-open">

      <h6 class="logo-title">Weedtracking</h6>
    </a>
    <div class="mCustomScrollbar" data-mcs-theme="dark">
      <ul class="left-menu">
        <li>
          <a href="{{url('/home')}}">
            <span class="fa fa-home  left-menu-icon"></span>
            <span class="left-menu-title">Inicio</span>
          </a>
        </li>
        <li>
          
          <a href="{{url('/user/'.Auth::user()->id)}}">
            <span class="fa fa-eye  left-menu-icon"></span>
            <span class="left-menu-title">Mis seguimientos</span>
          </a>

        </li>
        <li>
          <a href="{{url('/user/'.Auth::user()->id.'/plants')}}">
            <span class="fa fa-leaf  left-menu-icon"></span>
            <span class="left-menu-title">Mis plantas</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="fa fa-tree  left-menu-icon"></span>
            <span class="left-menu-title">Variedades</span>
          </a>
        </li>


      </ul>
    </div>
  </div>
</div>
<!-- ... end Fixed Sidebar Left -->

<!-- FIXED SIDEBAR LEFT -->

<div class="fixed-sidebar fixed-sidebar-responsive">

  <div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
    <a href="#" class="logo js-sidebar-open">
      <h2 style="color: white;">WT</h2>
    </a>

  </div>

  <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
    <a href="#" class="logo js-sidebar-open">
      
      <h6 class="logo-title">Weedtracking</h6>
    </a>

    <div class="mCustomScrollbar" data-mcs-theme="dark">
      <div class="control-block">
        <div class="author-page author vcard inline-items">
          <div class="author-thumb" id="collapsePerfilid">
            <img alt="author"  @if(Auth::user()->avatar!=null) src="{{Cloudder::show(Auth::user()->avatar, ["width" =>64, "height" =>64, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" @else src="{{url('/img/user.png')}}"@endif class="avatar">
            <a  class="author-name fn" data-toggle="collapse" data-parent="collapsePerfilid" href="#collapsePerfil" aria-expanded="false" aria-controls="collapseActive">
              <div class="author-title">
                {{Auth::user()->name}}
                <span class="fa fa-angle-down"></span>
              </div>
           
            </a>

            <ul id="collapsePerfil"  class="account-settings collapse" aria-labelledby="headingOne" aria-expanded="false" >
                <li>
                  <a href="{{url('/user/'.Auth::user()->id)}}">
                    <span class="fa fa-user"></span>
                    <span>Perfil</span>
                  </a>
                </li>
                <li>
                  <form method="POST" action="{{ route('logout') }}" accept-charset="UTF-8" name="logout-form" id="logout-form">
                    {{ csrf_field() }}
                    <a href="#" onClick="$('#logout-form').submit()">
                      <span class="fa fa-power-off"></span>
                      <span>Log Out</span>
                    </a>
                  </form>
                </li>
            </ul>

          </div>



        </div>
      </div>
      <ul class="left-menu">
        <li>
          <a href="{{url('/home')}}">
            <span class="fa fa-home  left-menu-icon"></span>
            <span class="left-menu-title">Inicio</span>
          </a>
        </li>
        <li>
          
          <a href="{{url('/user/'.Auth::user()->id)}}">
            <span class="fa fa-eye  left-menu-icon"></span>
            <span class="left-menu-title">Mis seguimientos</span>
          </a>
        </li>
        <li>
          <a href="{{url('/user/'.Auth::user()->id.'/plants')}}">
            <span class="fa fa-leaf  left-menu-icon"></span>
            <span class="left-menu-title">Mis plantas</span>
          </a>
        </li>
        <li>
          <a href="{{url('/strain')}}">
            <span class="fa fa-tree  left-menu-icon"></span>
            <span class="left-menu-title">Variedades</span>
          </a>
        </li>

      </ul>
    </div>
  </div>
</div>
<!-- ... end Fixed Sidebar Left -->


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
                <div id="imageListResp"></div>
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
 

@section('scripts')

        $('#fastInputList input').change(function() {

            $('#fastTrackImageSelected').html('<p>imagen seleccionada!</p>')
        });

        $('#fastInputListResp input').change(function() {

            $('#fastTrackImageRespSelected').html('<p>imagen seleccionada!</p>')
        });
        

@endsection