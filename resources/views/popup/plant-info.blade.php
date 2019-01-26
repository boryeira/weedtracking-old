                    <div class="modal fade show" id="open-plant-info-popup-{{$plant->id}}" >
                        <div class="modal-dialog ui-block window-popup edit-widget edit-widget-blog-post">
                            <a href="" class="close icon-close" data-dismiss="modal" aria-label="Close">
                                <svg class="olymp-close-icon"><use xlink:href="{{url('/icons/icons.svg#olymp-close-icon')}}"></use></svg>
                            </a>

                            <div class="modal-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#informacion" role="tab">Información</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#imagenes" role="tab">Imagenes</a>
                                    </li>

                                </ul>
                                <!-- Tab panels -->
                                <div class="tab-content card">
                                    <!--Panel 1-->
                                    <div class="tab-pane fade in show active" id="informacion" role="informacion">
                                        <ul class="widget w-blog-posts">
                                            <li>
                                                <article class="hentry post">
                                                    <h4>Resumen</h4>

                                                     <!--fases de la planta-->
                                                    @foreach($plant->phases as $phase)
                                                        @if(is_numeric($phase->value))
                                                        <div class="">{{$phase->phase->name}}: {{$phase->value}} dias </div>
                                                        @endif

                                                    @endforeach
                                                    <div class="">{{$plant->phase->name}} hase {{Carbon\Carbon::now()->diffInDays($plant->phase_at)}} dias</div>

                                                </article>
                                            </li>
                                            <li>
                                                <article class="hentry post">
                                                    <h4>Información</h4>
                                                    <br>
                                                    @if($plant->description != null)
                                                    {!!$plant->description!!}
                                                    @else
                                                    <p>no hay mas registros</p>
                                                    @endif

                                                </article>
                                            </li>
                                        </ul>


                                    </div>
                                    <div class="tab-pane fade in show " id="imagenes" role="imagenes">
                                      <h4>Imágenes subidas</h4>
                                 
                                        <div class="ui-block-content">
                                            <ul class="widget w-last-photo js-zoom-gallery">
                                                @foreach($plant->images as $img)
                                                <li>
                                                    <a href="{{Cloudder::show($img->value, ["quality"=>50, "format"=>"jpg","secure" => true])}}"  data-img="{{$img->id}}" data-fancybox="allgalleryplant{{$plant->id}}"  data-url="{{Cloudder::show($img->value, ["secure" => true])}}" data-public="{{$img->value}}" style="position: relative;">
                                                        <img style="padding:0; margin-right:0" alt="" src="{{Cloudder::show($img->value, ["width" =>300, "height" =>300, "crop"=>"fill","format"=>"jpg","secure" => true ])}}" />

                                                    </a>
                                                    <span class="text-centered">{{$img->phase->name}} dia {{$img->phase_day}}</span>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>



                                </div>
                            </div>

                        </div>

                    </div>
                 
