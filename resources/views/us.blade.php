@extends('layouts.app')



@section('content')
<div class="main-header">
    <div class="content-bg-wrap bg-orange">
        <div class="content-bg "></div>
    </div>
    <div class="container" >
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-xs-12">
                <div class="main-header-content text-center" >
                    <img src="{{url('img/logo.png')}}" width="80" alt="WeedTracking">
                    <h1 >WEEDTRACKING</h1>
                    <p>Participa en esta comunidad de cultivadores cannabicos!</p>
                    <p>Has seguimiento a tus plantas y mejora en cada cosecha.</p>
                    @if(Auth::guest())
	                    <a class="btn btn-grey btn-lg" style="margin-top: 40px; " href="{{url('login')}}">Iniciar sesión</a>
	                    <p class="text-center"><a class="h6 author-name" href="{{url('/register')}}"><strong>o registrate</strong></a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <img class="img-bottom" src="img/group-bottom.png" alt="friends">
</div>


<div class="container ">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
            <div class="ui-block" >
            	<h3 class="ui-block-title">Quienes somos</h3>
            	<div class="ui-block-content">
			            <p>En una era donde los cultivos cannabicos medicinales y recreativos, están en un momento decisivo para ser considerados por las leyes de los países. En un mercado de crecimiento exponencial, llego el momento de establecer parámetros, conocer nuevas metodologías de cultivo y validar productos como: Fertilizantes, Estimulantes y Bioinsumos. </p>
			           	<p>En este escenario, nuestro equipo especializado en tecnológicas y comprometido con la mejora de los cultivos y gestión del conocimiento para los productores, han creado WeedTracking. </p>

			           	<h5 class="text-center">Creado por cultivadores para cultivadores</h5>


            	</div>
            	
            </div>

            <div class="ui-block" >
                <h3 class="ui-block-title">Privacidad</h3>
                <div class="ui-block-content">
                    <ul>
                    <li>Utilizamos cifrado de punto a punto con HTTPS y la informacion </li>
                </ul>

                        
                </div>
                
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')

