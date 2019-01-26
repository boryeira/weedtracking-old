@extends('layouts.app')

@section('content')



<div class="container">

    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 20px;">
            
                <!-- Nav tabs -->

                <!-- Tab panes -->
                
                    <div class="ui-block" >
                        <div class="ui-block-title text-center"><h3>Ingresa a tu cuenta o <a style="display: inline;" href="{{url('/register')}}" >registrate</a></h3></div>
                            <div style="padding: 15px;">

                                   <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group label-floating is-empty">
                                            <label class="">Email</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group label-floating is-empty">
                                            <label class="">Contraseña</label>
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="remember">

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                                                </label>
                                            </div>

                                            <a  href="{{ route('password.request') }}">
                                                ¿Olvidaste tu contraseña?
                                            </a>
                                        </div>

                                        
                                        <button type="submit" class="btn btn-primary full-width">
                                            Iniciar sesión
                                        </button>
                                        
                                    </form>

                        </div>
                    </div>
                
            
        </div>


    </div>
</div>


@endsection
