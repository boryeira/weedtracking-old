                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 sorting-item worlds family" >
                                    <div class="ui-block">
                                        <article class="hentry post">
                                            <div class="post__author author vcard inline-items">
                                                <img @if($feed->user->avatar!=null) src="{{Cloudder::show($feed->user->avatar, ["width" =>50, "height" =>50, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" @else src="{{url('/img/user.png')}}" @endif  class="avatar">

                                                <div class="author-date">
                                                    <a class="h6 post__author-name fn" href="{{url('/user/'.$feed->user->id)}}">{{$feed->user->name}}</a>
                                                    <div class="post__date">
                                                        {{ $feed->created_at->diffForHumans() }}
                                                    </div>
                                                </div>

                                            </div>


                                            {{-- todas las imagenes --}}
                                            <div class="post-video">
                                                <div class="image-slick">
                                                @foreach($feed->images as $key => $image)
                                                    <img width="100%" src="{{Cloudder::show($image->value, ["width" =>600, "height" =>600, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" alt="photo"/>
                                                        
                  
                                                @endforeach
                                                </div>

                                                <div class="video-content">
                                                        
                                                        {{-- todos los textos --}}
                                                        @foreach($feed->texts as $text)
                                                            <p>{{$text->value}}</p>
                                                        @endforeach

                                                        <div class="post-additional-info inline-items">

                                                            <ul class="friends-harmonic">
                                                            @foreach($feed->comments as $key => $comment)
                                                                @if($key<=5)
                                                                    <li>
                                                                
                                                                        <a href="#" data-toggle="modal" data-target="#open-comments-popup-{{$feed->id}}">
                                                                            <img @if($comment->user->avatar!==null) src="{{Cloudder::show($comment->user->avatar, ["width" =>28, "height" =>28, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" @else src="{{url('/img/user.png')}}" @endif width="28" heght="28" alt="friend"></a>
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

                                                        
                                                </div>

                                            </div>

                                            <div class="control-block-button post-control-button">

                                                <a href="#" class="btn btn-control fafeed fa fa-comments-o" data-toggle="modal" data-target="#open-comments-popup-{{$feed->id}}">

                                                </a>

                                            </div>

                                        </article>

                                    </div>
                                </div> 