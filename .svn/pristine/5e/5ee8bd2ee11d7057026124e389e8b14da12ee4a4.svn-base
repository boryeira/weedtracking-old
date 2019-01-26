@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('alerts.alert')

        </div>
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ui-block" style="margin-top: 70px;">
                <div class="top-header">
                    
                    <div class="profile-section">
                        <div class="row">

                            <div class="col-lg-5  col-md-5 ">
                                <ul class="profile-menu">

                                </ul>
                            </div>
                            <div class="col-lg-5 offset-lg-2 col-md-5 offset-md-2">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="{{url('/strain/'.$strain->id)}}">Seguimientos</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/strain/'.$strain->id.'/plants')}}">Plantas</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="top-header-author">
                        <a  class="author-thumb">
                            <img  src="{{url('/img/plant.png')}}" alt="author" width=124 height=124>
                        </a>
                        <div class="author-content">
                            <a href="#" class="h4 author-name">{{$strain->name}}</a>
                            <div class="country">
                               @if($strain->bank_id!=null)<strong>{{$strain->bank->name}}</strong> @endif {{$strain->type}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="clients-grid">
                <div class="row sorting-container" id="clients-grid-1" data-layout="masonry">

                @foreach($feeds as $feed)
                    @if($feed->feedtype_id == 1)
                    <!-- tracking-feed  -->
                    @include('feed.track', ['feed' => $feed, 'page'=>'strain'])
                    <!-- ... end tracking-feed  -->
                    <!-- comment-popup  -->

                    @include('popup.comment', ['feed' => $feed])
                    <!-- ... end comment-popup -->
                    @endif 

                    @if($feed->feedtype_id == 2)
                    <!-- tracking-feed  -->
                    @include('feed.share', ['feed' => $feed, 'page'=>'strain'])
                    <!-- ... end tracking-feed  -->
                    <!-- comment-popup  -->
                    @include('popup.comment', ['feed' => $feed])

                    <!-- ... end comment-popup -->
                    @endif


                @endforeach    



                </div>

            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center padding80">
                <a class="btn btn-primary text-center" href="{{$feeds->nextPageUrl()}}"> Cargar mas seguimientos</a>
        </div> 
    </div>

</div>

{{-- Modals --}}



@endsection

@section('scripts')

@endsection