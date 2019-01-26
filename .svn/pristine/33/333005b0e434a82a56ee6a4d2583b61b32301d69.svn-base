@extends('layouts.app')

@section('content')
<div class="container ">

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            {{-- alertas--}}
            @include('alerts.alert')
            

        </div>


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            {{-- Header --}}
            @include('plant.header', ['plant' => $plant])
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            {{--cambio de fase --}}
            <div class="ui-block">
                <h4 class="ui-block-title">Cambio de estado o cosecha</h4>
                
                <div class="ui-block-content ">
                    @if(($plant->phase->id<4))
                      <div class="panel">
                        <div class="panel-body">
                           {!!Form::open(['action' => 'PlantController@phaseChange'])!!}
                              <input class="form-control" type="hidden" name="plantId" value="{{$plant->id}}">
                              <input class="form-control" type="hidden" name="phaseId" value="{{$plant->next_phase->id}}">
                              <div class="form-group">
                                  <h5>Cambiar a estado <strong>{{$plant->next_phase->name}}</strong></h5>
                                  <div>
                                    <p>Esta acción debes realizarla cuando tu planta está lista para avanzar a la siguiente fase de cultivo. Una vez que el cambio de estado es ingresado, ya no podrás regresar la planta a su estado anterior. <strong>¿Estás seguro que deseas continuar?</strong></p>
                                  </div>
                              </div>
                              <input class="btn btn-success" type="submit" onClick="this.disabled=true; this.value='Enviando…';this.form.submit();" value="Cambiar estado" >
                            {{Form::close()}}
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
                            <h5>Cosechar planta</h5>
                            <div class="form-group">
                              <p>Al realizar esta acción, estás declarando que tu planta ha sido cosechada o quieres cerrar el seguimiento sin perder la información. Esta acción no puede ser revertida.
                                <strong>¿Estás seguro que deseas continuar?</strong></p>
                            </div>
                            <input class="btn btn-danger" onClick="this.disabled=true; this.value='Enviando…';this.form.submit();" type="submit" value="Cosechar planta">
                          {{Form::close()}}
                        </div>
                      </div>
                    @else
                    <p>Ya no es posible cambiar de estado</p>
                    @endif  
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="ui-block">
                <h4 class="ui-block-title">Cambio de estado o cosecha</h4>
                <div class="ui-block-content ">
                    {!!Form::open(['action' => 'PlantController@edit','files' => true])!!}
                      <input class="form-control" type="hidden" name="plantId" value="{{$plant->id}}">
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
                              <label>Información de la planta</label>
                              <textarea id="summernote" class="form-control" rows="12" name="description">{!!$plant->description!!}</textarea> 
                          </div>

                          <input class="btn btn-primary" onClick="this.disabled=true; this.value='Enviando…';this.form.submit();" type="submit" value="Guardar cambios"></input>

               
                    {!!Form::close()!!}
                </div>
            </div>
        </div>

    </div>




</div>





@endsection



