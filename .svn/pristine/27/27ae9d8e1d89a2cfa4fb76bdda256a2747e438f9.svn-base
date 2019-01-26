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
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div  id="photo-page" >
                <div class="photo-album-wrapper">
                @foreach($strains as $strain)
                
                    <div class="photo-album-item-wrap col-4-width">
                                        <div class="photo-album-item" data-mh="album-item" style="height: 458px;">
                                            <div class="photo-item">
                                                <img @if($strain->images) src="{{Cloudder::show($strain->images->last()['value'], ["width" =>600, "height" =>600, "crop"=>"fill", "format"=>"jpg"])}}" @else src="{{url('/img/plant.png')}}"@endif alt="photo">
                                                <div class="overlay overlay-light"></div>

                                                   
                                                    
                                                

                                            </div>

                                            <div class="content">
                                                <span class="sub-title">{{$strain->name}}</span>
                                               

                                            </div>

                                        </div>
                    </div>
                
                @endforeach
                </div>
            </div>
        </div>
    </div>

</div>





@endsection

@section('scripts')

