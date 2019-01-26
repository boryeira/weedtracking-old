                            @if($page=="login")
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 sorting-item" >
                            @else
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 sorting-item" id="feed{{$feed->id}}" >
                            @endif   

                                <div class="ui-block">
                                    <article class="hentry post">
                                        <div class="post__author author vcard ">
                                            

                                            <div class="author-date">
                                                @if($page!='plant')    
                                                <a class="h6 post__author-name fn" href="{{url('/plant/'.$feed->plant->id)}}">{{strtoupper($feed->plant->name)}}</a>  - 
                                            
                                                    @if($feed->plant->strain_id!=null)
                                                    <a href="{{url('/strain/'.$feed->plant->strain_id)}}">{{$feed->plant->strain->name}}</a>
                                                    @endif
                                                @endif
                                                <span class="pull-right">{{$feed->created_at->format('d-m-y')}}</span>
                                                <div class="post__date">
                                                    <i class="fa fa-calendar"></i> {{$feed->phase_day}} días en <strong>{{$feed->phase->name}}</strong>

                                                </div>

                                                
                                            </div>

                                        </div>

                                        {{-- todos los textos --}}
                                        @foreach($feed->texts as $text)
                                        <i class="fa fa-edit"></i> {{$text->value}}<br />
                                        @endforeach
                                        <br />

                                        {{-- todas las imagenes --}}
                                        <div class="post-block-photo js-zoom-gallery">
                                        @if(count($feed->images)<=2)
                                            @foreach($feed->images()->orderBy('created_at','desc')->get() as $count => $image)
                                                    <a href="{{Cloudder::show($image->value, ["secure" => true])}}" data-fancybox="gallery{{$image->feed_id}}" class="half-width" style="padding:0px !important">
                                                    <img src="{{Cloudder::show($image->value, ["width" =>600, "height" =>600, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" alt="photo">
                                                    </a>
                                            @endforeach
                                        @endif

                                        @if(count($feed->images)>=3)
                                            @foreach($feed->images()->orderBy('created_at','desc')->get() as $count => $image)
                                                    @if($count==0)
                                                        <a href="{{Cloudder::show($image->value, ["secure" => true])}}" data-fancybox="gallery{{$image->feed_id}}" class="half-width" style="padding:0px !important">
                                                        <img src="{{Cloudder::show($image->value, ["width" =>600, "height" =>600, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" alt="photo">
                                                        </a>
                                                    @elseif($count==1)
                                                        <a href="{{Cloudder::show($image->value, ["secure" => true])}}" data-fancybox="gallery{{$image->feed_id}}" class="half-width" style="padding:0px !important">
                                                        <img src="{{Cloudder::show($image->value, ["width" =>600, "height" =>600, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" alt="photo">
                                                            <span class="play-video h3" style="padding: 0px !important;line-height:61px;color:white;">

                                                                +{{count($feed->images)-2}}
                                                            </span>
                                                        </a>
                                                    @else
                                                        <a href="{{Cloudder::show($image->value, ["secure" => true])}}" data-fancybox="gallery{{$image->feed_id}}" class="half-width" hidden style="padding:0px !important" >
                                                        <img src="{{Cloudder::show($image->value, ["width" =>600, "height" =>600, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" alt="photo">
                                                            <span class="play-video h3" style="padding: 0px !important;line-height:61px;color:white;">

                                                                +{{count($feed->images)-2}}
                                                            </span>
                                                        </a>
                                                    @endif

                                            @endforeach
                                        @endif
                                        </div>

                                        <div class="post-additional-info inline-items">
                                            
                                            <ul class="friends-harmonic">
                                                    @foreach($feed->comments as $key => $comment)
                                                        @if($key<=5)
                                                            <li>
                                                                <a   @if(!Auth::guest()) data-toggle="modal" data-target="#open-comments-popup-{{$feed->id}}" @endif>
                                                                    <img @if($comment->user->avatar!=null) src="{{Cloudder::show($comment->user->avatar, ["width" =>28, "height" =>28, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" 
                                                                    @else src="{{url('/img/user.png')}}" @endif width="28" heght="28" alt="friend">
                                                                </a>
                                                            </li>
                                                        @endif    
                                                    @endforeach
                                                       
                                            </ul>
                                            
                                            
                                            <div class="names-people-likes">
                                                @if($feed->comments->count()==1)
                                                Hay un comentario
                                                @endif 
                                                @if($feed->comments->count()>1)
                                                {{$feed->comments->count()}} personas han Comentado
                                                @endif 
                                            </div>


                                        </div>
                                        
                                        <div class="control-block-button post-control-button">
                                            <a href="{{'/plant/'.$feed->plant_id}}" class="btn btn-control fafeed fa fa-eye">
                                            </a>

                                            @if(!Auth::guest())
                                                <a href="#" class="btn btn-control fafeed fa fa-comments-o" data-toggle="modal" data-target="#open-comments-popup-{{$feed->id}}" ></a>

                                                @if( (Auth::user()->id == $feed->user_id) && (count($feed->phases)==0) )
                                                    <div class="modal fade show text-center" id="delete-feed-{{$feed->id}}" >
                                                        <div class="modal-dialog ui-block">
                                                            {{Form::open(['action' => 'FeedController@delete'])}}
                                                                    <input type="" name="feed_id" id="feed_delete_id" value="{{$feed->id}}" hidden>
                                                                    <h5 class="ui-block-title">Eliminar seguimiento</h5>
                                                                    <p >Si eliminas esta hoja de tu Bitacora se perdera toda la información en ella. </p>
                                                                    <p>¿Deseas continuar?</p>
                                                                    <button class="btn btn-primary btn-lg" type="submit"> Si, eliminar</button>
                                                                    

                                                            {{Form::close()}}
                                                            <a href="#" class="btn btn-blue btn-lg" data-dismiss="modal" aria-label="Close" >Cancelar</a>
                                                        </div>
                                                    </div>

                                                    <a class="btn btn-control fafeed fa fa-ellipsis-v " type="button" id="dropdownFeedTools" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white"></a> 
                                                
                                                    <div class="dropdown-menu" aria-labelledby="dropdownFeedTools">
                                                        <a class="dropdown-item" href="{{url('feed/'.$feed->id.'/edit')}}">Editar</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete-feed-{{$feed->id}}" >Eliminar</a>
                                                    </div>
                                                    
                                                 @endif
                                            @endif

                                        </div>
                                        

                                    </article>
                                </div>
                            </div>