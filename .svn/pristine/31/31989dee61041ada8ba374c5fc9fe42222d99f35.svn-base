
<!-- Header -->

<header class="header" id="site-header">

  <div class="page-title">
    
  </div>

  <div class="header-content-wrapper">
    <form class="search-bar w-search notification-list friend-requests">
      <div class="form-group with-button is-empty">
        <input class="form-control js-user-search" placeholder="Busca alguna variedad..." type="text">
        <button class="fa fa-search">
          
        </button>
      <span class="material-input"></span></div>
    </form>

    <div class="control-block">
      @if(!Auth::guest())
      <div class="author-page author vcard  more" >
        <div class="author-thumb">
          <img   @if(Auth::user()->avatar!=null) src="{{Cloudder::show(Auth::user()->avatar, ["width" =>124, "height" =>124, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" @else src="{{url('/img/user.png')}}"@endif width="36" heght="36" class="avatar">
          
          <div class="more-dropdown more-with-triangle">
            <div class="mCustomScrollbar" data-mcs-theme="dark">
              <div class="ui-block-title ui-block-title-small">
                <h6 class="title">Tu perfil</h6>
              </div>

              <ul class="account-settings">
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

          </div>
        </div>
        <a href="#" class="author-name fn pull-right">
          <div class="author-title">
            {{Auth::user()->name}} 
            <span class="fa fa-menu"></span>
          </div>
          <span class="author-subtitle"></span>
        </a>
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

</header>

<!-- ... end Header -->


<!-- Responsive Header -->

<header class="header header-responsive" id="site-header-responsive">

  <div class="header-content-wrapper">
    <ul class="nav nav-tabs mobile-app-tabs" role="tablist">

      <li class="nav-item" >
        <a style="font-size: 21px" class="nav-link fa fa-search" data-toggle="tab"  role="tab" href="#search">
        </a>

      </li>
    </ul>
  </div>
  <div class="tab-content tab-content-responsive">

    <div class="tab-pane " id="search" role="tabpanel">


    <form class="search-bar w-search notification-list friend-requests">
      <div class="form-group with-button is-empty">
        <input class="form-control js-user-search" placeholder="Busca alguna variedad..." type="text">
        <button class="fa fa-search">
          
        </button>
      <span class="material-input"></span></div>
    </form>


    </div>



  </div>
</header>

<!-- ... end Responsive Header -->

<div class="header-spacer-small "></div>

