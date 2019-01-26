<!-- FIXED SIDEBAR LEFT -->


<div class="fixed-sidebar">
  <div class="fixed-sidebar-left sidebar--small" id="sidebar-left">
    <a href="#" class="logo js-sidebar-open">
      <img src="{{url('img/logo.png')}}" width="40" alt="WeedTracking">
    </a>

    <div class="mCustomScrollbar " data-mcs-theme="light">
      
      <ul class="left-menu">

        <li>
          <a href="#" class="js-sidebar-open fa fa-chevron-right famenu" >
          </a>
        </li>
          <li>
            <a href="{{url('/')}}" class="fa fa-home famenu" data-toggle="tooltip" data-placement="right" data-original-title="Inicio">
            </a>
          </li>

        @if(!Auth::guest())
          <li>
            <a href="{{url('/user/'.Auth::user()->slug())}}" class="fa fa-eye famenu" data-toggle="tooltip" data-placement="right" data-original-title="Mis seguimientos">
            </a>
          </li>
          <li>
            <a href="{{url('/user/'.Auth::user()->slug().'/plants')}}" class="fa fa-leaf famenu" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mis plantas">
            </a>
          </li>
        @else

        @endif
          <li>
            <a href="{{url('/us')}}" class="fa fa-question-circle famenu" data-toggle="tooltip" data-placement="right" data-original-title="Quienes somos">
            </a>
          </li>

      </ul>
      
    </div>
  </div>

  <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
    <a href="#" class="logo js-sidebar-open">
      <img src="{{url('img/logo.png')}}" width="40" alt="WeedTracking">
      <h6 class="logo-title">Weedtracking</h6>
    </a>
    <div class="mCustomScrollbar" data-mcs-theme="dark">
      
      <ul class="left-menu" style="font-size: 21px !important;font-weight: 0 !important;">
        <li>
          <a href="#" class="js-sidebar-open" >
            <span class="fa fa-chevron-left famenu"></span>
          </a>
        </li>
        <li>
          <a href="{{url('/')}}">
            <span class="fa fa-home  left-menu-icon"></span>
            <span class="left-menu-title">Inicio</span>
          </a>
        </li>
        @if(!Auth::guest())
          <li>
            <a href="{{url('/user/'.Auth::user()->slug())}}">
              <span class="fa fa-eye  left-menu-icon"></span>
              <span class="left-menu-title">Mis seguimientos</span>
            </a>

          </li>
          <li>
            <a href="{{url('/user/'.Auth::user()->slug().'/plants')}}">
              <span class="fa fa-leaf  left-menu-icon"></span>
              <span class="left-menu-title">Mis plantas</span>
            </a>
          </li>
        @else
        @endif
          <li>
            <a href="{{url('/us')}}">
              <span class="fa fa-question-circle left-menu-icon"></span>
              <span class="left-menu-title">Quienes somos</span>
            </a>
          </li>



      </ul>
      
    </div>
  </div>
</div>
<!-- ... end Fixed Sidebar Left -->

<!-- FIXED SIDEBAR LEFT Responsive-->

<div class="fixed-sidebar fixed-sidebar-responsive">

  <div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
    <a href="#" class="logo js-sidebar-open">
      <img src="{{url('img/logo.png')}}" width="40" alt="WeedTracking">
    </a>

  </div>

  <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
    <a href="#" class="logo js-sidebar-open">
      <img src="{{url('img/logo.png')}}" width="40" alt="WeedTracking">
      <h6 class="logo-title">Weedtracking</h6>
    </a>

    <div class="mCustomScrollbar" data-mcs-theme="dark">
      <div class="control-block">
        <div class="author-page author vcard inline-items">
          @if(!Auth::guest())
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
                  <a href="{{url('/user/'.Auth::user()->slug())}}">
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
          @else
          <ul class="inline-items">
            <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
            <li> o </li>
            <li><a href="{{ route('register') }}">Registrarse</a></li>
          </ul>
          @endif


        </div>
      </div>
      
      <ul class="left-menu" style="font-size: 21px !important;font-weight: 0 !important;">
        <li>
          <a href="{{url('/')}}">
            <span class="fa fa-home  left-menu-icon"></span>
            <span class="left-menu-title">Inicio</span>
          </a>
        </li>
        @if(!Auth::guest())
        <li>
          
          <a href="{{url('/user/'.Auth::user()->slug())}}">
            <span class="fa fa-eye  left-menu-icon"></span>
            <span class="left-menu-title">Mis seguimientos</span>
          </a>
        </li>
        <li>
          <a href="{{url('/user/'.Auth::user()->slug().'/plants')}}">
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
        @else


        @endif
          <li>
            <a href="{{url('/us')}}">
              <span class="fa fa-question-circle left-menu-icon"></span>
              <span class="left-menu-title">Quienes somos</span>
            </a>
          </li>
      </ul>
      
    </div>
  </div>
</div>
<!-- ... end Fixed Sidebar Left -->

