@extends('layouts.app')

@section('content')

@if(Auth::guest())
<div class="main-header">
    <div class="content-bg-wrap bg-orange">
        <div class="content-bg "></div>
    </div>
    <div class="container" >
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-xs-12">
                <div class="main-header-content">
                    <img src="{{url('img/logo.png')}}" width="80" alt="WeedTracking">
                    <h1>WEEDTRACKING</h1>
                    <h2>Comunidad de cultivadores cannabicos!</h2> 
                    <h5 class="text-center">Has seguimiento a tus plantas y mejora en cada cosecha.</h5>
                    <a class="btn btn-grey btn-lg" style="margin-top: 40px; " href="{{url('login')}}">Iniciar sesión</a>
                    <p class="text-center"><a class="h6 author-name" href="{{url('/register')}}"><strong>o registrate</strong></a></p>
                </div>
            </div>
        </div>
    </div>

    <img class="img-bottom" src="img/group-bottom.png" alt="friends">
</div>
@endif






<div class="container "  style="padding: 15px">


    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('alerts.alert')

        </div>


        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           
            <div class="clients-grid">
                <div class="row sorting-container" id="clients-grid-1" data-layout="masonry">
                    <div class="infinite-scroll">
                        @foreach($feeds as $feed)
                            @if($feed->feedtype_id == 1)

                                <!-- tracking-feed  -->
                                @include('feed.track', ['feed' => $feed, 'page'=>'home'])
                                <!-- ... end tracking-feed  -->

                                <!-- comment-popup  -->
                                @include('popup.comment', ['feed' => $feed])
                                <!-- ... end comment-popup -->
                            @endif 

                            @if($feed->feedtype_id == 2)

                                <!-- share-feed  -->
                                @include('feed.share', ['feed' => $feed])
                                <!-- ... end share-feed  -->

                                <!-- comment-popup  -->
                                @include('popup.comment', ['feed' => $feed])
                                <!-- ... end comment-popup -->
                            @endif
                        @endforeach

                    </div>    

                </div>

            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center padding80">
            <a class="btn btn-primary text-center" href="{{$feeds->nextPageUrl()}}"> Cargar mas seguimientos</a>
        </div>   
    </div>
</div>




@endsection

@section('scripts')

