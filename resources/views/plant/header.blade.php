            <div class="ui-block" style="margin-top: 70px;">
                <div class="top-header">
                    
                    <div class="profile-section">
                        <div class="row">

                            <div class="col-lg-5  col-md-5 ">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="{{url('/plant/'.$plant->id.'/images')}}">Imagenes</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-5 offset-lg-2 col-md-5 offset-md-2">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="{{url('/user/'.$plant->user_id)}}">Dueño - {{$plant->user->name}}</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/plant/'.$plant->id)}}">Seguimientos</a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="control-block-button">
                            @if(!Auth::guest())

                                @if(Auth::user()->id==$plant->user_id)

                                <a href="{{url('/plant/'.$plant->id.'/edit')}}" class="btn btn-control bg-blue fa fa-edit" style="font-size: 32px;line-height: 1.5">
                                    
                                </a>
                                
                                @endif
                            @endif

                        </div>
                    </div>
                    <div class="top-header-author">
                        <a class="author-thumb" href="{{url('plant/'.$plant->id)}}">
                            <img @if($plant->avatar!=null) src="{{Cloudder::show($plant->avatar, ["width" =>124, "height" =>124, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" @else src="{{url('/img/plant.png')}}"@endif alt="author" width=124 height=124>
                        </a>
                        <div class="author-content">
                            <a href="02-ProfilePage.html" class="h4 author-name">{{$plant->name}}</a>
                            <div class="">
                                @if($plant->strain_id!=null)
                                    <a href="{{url('strain/'.$plant->strain_id)}}">{{$plant->strain->name}}</a>
                                    @if($plant->strain->bank_id!=null)
                                            del banco 
                                    <a href="#">{{$plant->strain->bank->name}}</a>

                                    @endif()
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>


