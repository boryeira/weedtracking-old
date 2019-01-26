

                    <div class="modal fade show" id="open-comments-popup-{{$feed->id}}" >
                        <div class="modal-dialog ui-block window-popup event-private-public private-event">
                            <article class="hentry post" style="padding: 0px;">
                                <div class="private-event-head inline-items">
                                   

                                    <div class="author-date" style="padding: 10px;">
                                        <h3>Comentarios</h3>
                                    </div>
                                </div>

                                <div class="open-photo-content">

                                    <div class="" data-mcs-theme="dark" >
                                        <ul class="comments-list">
                                        @foreach($feed->comments->sortBy('created_at') as $comment)
                                        
                                            <li>
                                                <div class="post__author author vcard inline-items col-xs-3">
                                                    <img @if($comment->user->avatar!=null) src="{{Cloudder::show($comment->user->avatar, ["width" =>50, "height" =>50, "crop"=>"fill", "format"=>"jpg","secure" => true])}}" @else src="{{url('/img/user.png')}}" @endif width="50" heght="50" alt="friend">

                                                    <div class="author-date">
                                                        <a class="h6 post__author-name fn" href="#">{{$comment->user->name}}</a>
                                                        <div class="post__date">
                                                            <time class="published" datetime="{{ $comment->created_at->diffForHumans() }}">
                                                                {{ $comment->created_at->diffForHumans() }}
                                                            </time>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <p class="col-xs-9">{{$comment->value}}</p>
                                            
                                            </li>
                                        @endforeach
                                        </ul>
                                    

                                    </div>
                                    @if(!Auth::guest())
                                    {{Form::open(['action' => 'FeedController@comment','class' => 'comment-form inline-items'])}}
                                    
                                        <input type="hidden" name="feed" value="{{$feed->id}}">

                                        <div class="form-group with-icon-right is-empty" style="width: 100%">
                                            <textarea class="form-control" placeholder="Comentar..." name="comment"></textarea>
                                            <div class="add-options-message">

                                            </div>


                                        </div>
                                             <button type="submit" class="btn btn-xs bg-blue" style="margin-bottom: -10px;" onClick="this.disabled=true; this.value='Enviando…';this.form.submit();"><span class="fa fa-comment"></span>Enviar comentario</button>

                                         

                                    {{Form::close()}}
                                    @endif

                                </div>
                                <div class="control-block-button post-control-button">

                                    <a href="#" class="btn btn-control fa fa-close" data-dismiss="modal" aria-label="Close" ></a>

                                </div>
                            </article>


                        </div>
                    </div>