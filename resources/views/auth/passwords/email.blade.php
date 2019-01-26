@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-4 text-center" style="height: 30px;display: block;">
        </div>
        <div class="col-md-4">
            <div style="margin-top: 20px;"></div>
            <div class="ui-block">
                
                    <h4 class="ui-block-title">Restaurar Contraseña</h4>
                    <br>
                    <div class="ui-block-content">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail</label>

                                <div >
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                       Enviar link para restaurar contraseña
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                
            </div>
            
        </div>
    </div>
</div>
@endsection
