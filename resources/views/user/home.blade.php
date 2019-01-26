@extends('layouts.app')

@section('content')
<div class="container">

            {{-- Success --}}
            @if(Session::has('success'))
                    <div class="alert alert-success">
                        <i class=" fa fa-check position-left"></i>  {{ Session::get('success') }}
                    </div>
            @endif
            {{-- END Success --}}
             {{-- Errores --}}
            @if($errors->any())
            <div class="row">
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                    
                </div>
            </div>
            @endif

    <div class="row">


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

