                    <div class="modal fade show" id="open-plant-popup-{{$plant->id}}" >
                        <div class="modal-dialog ui-block ">
                            <a href="" class="close icon-close" data-dismiss="modal" aria-label="Close">
                                <svg class="olymp-close-icon"><use xlink:href="{{url('/icons/icons.svg#olymp-close-icon')}}"></use></svg>
                            </a>

                            <div class="modal-body">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">Cambiar fase de la planta</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Informacion</a>
                                    </li>
                                </ul>
                                <!-- Tab panels -->
                                <div class="tab-content card">
                                    <!--Panel 1-->
                                    <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
                                        <br>
                             {{--cambio de fase --}}
                                        @if(($plant->phase->id<4))
                                        <div class="col-xs-12">
                                          <div class="panel">
                                            <div class="panel-body">
                                               {!!Form::open(['action' => 'PlantController@phaseChange'])!!}
                                                  <input class="form-control" type="hidden" name="plantId" value="{{$plant->id}}">
                                                  <input class="form-control" type="hidden" name="phaseId" value="{{$plant->next_phase->id}}">
                                                  <div class="form-group">
                                                      <h4>Cambiar a estado <strong>{{$plant->next_phase->name}}</strong></h4>
                                                      <div>
                                                        <p>Esta acción debes realizarla cuando tu planta está lista para avanzar a la siguiente fase de cultivo. Una vez que el cambio de estado es ingresado, ya no podrás regresar la planta a su estado anterior. <strong>¿Estás seguro que deseas continuar?</strong></p>
                                                      </div>
                                                  </div>
                                                  <input class="btn btn-success" type="submit" onClick="this.disabled=true; this.value='Enviando…';this.form.submit();" value="Cambiar estado" >
                                                {{Form::close()}}
                                              </div>
                                          </div>
                                        </div>
                                        @endif
                             {{-- cosechar o eliminar --}}
                                        <div class="col-xs-12">
                                        @if(($plant->phase->id<5))
                                          <div class="panel">
                                            <div class="panel-body">
                                              {!!Form::open(['action' => 'PlantController@harvest'])!!}
                                                <input class="form-control" type="hidden" name="plantId" value="{{$plant->id}}">
                                                <h4>Cosechar planta</h4>
                                                <div class="form-group">
                                                  <p>Al realizar esta acción, estás declarando que tu planta ha sido cosechada o quieres cerrar el seguimiento sin perder la información. Esta acción no puede ser revertida.
                                                    <strong>¿Estás seguro que deseas continuar?</strong></p>
                                                </div>
                                                <input class="btn btn-danger" onClick="this.disabled=true; this.value='Enviando…';this.form.submit();" type="submit" value="Cosechar planta">
                                              {{Form::close()}}
                                            </div>
                                          </div>
                                        @endif  

                                        </div>
 

                                    </div>
                                    <!--/.Panel 1-->
                                    <!--Panel 2-->
                                    <div class="tab-pane fade" id="panel2" role="tabpanel">
                                        <br>
                                        {!!Form::open(['action' => 'PlantController@edit','files' => true])!!}
                                          <input class="form-control" type="hidden" name="plantId" value="{{$plant->id}}">
                                          <h4>Editar información</h4>
                                              <div class="form-group">
                                                  <label>Nombre de la planta</label>
                                                  <input class="form-control" name="name" value="{{$plant->name}}">
                                              </div>
                                              <div class="form-group"> 
                                              <label>Avatar de la planta</label>
                                                <div class="uploader">
                                                    {!! Form::file('image', ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                  <label>Descripción de la planta</label>
                                                  <textarea id="summernote" class="form-control" rows="12" name="description">{!!$plant->description!!}</textarea> 
                                              </div>

                                              <input class="btn btn-primary" onClick="this.disabled=true; this.value='Enviando…';this.form.submit();" type="submit" value="Guardar cambios"></input>

                                   
                                        {!!Form::close()!!}
                                    </div>
                                    <!--/.Panel 2-->
                                </div>

                            </div>

                        </div>
                    </div>
