            {{-- Success --}}
            @if(Session::has('success'))
                    <div class="alert alert-success">
                        <i class=" fa fa-check position-left"></i>  {{ Session::get('success') }}
                    </div>
            @endif
            {{-- END Success --}}
            {{-- Success --}}
            @if(Session::has('warning'))
                    <div class="alert alert-warning">
                        <i class=" fa fa-cross position-left"></i>  {{ Session::get('warning') }}
                    </div>
            @endif

            {{-- Errores --}}
            @if($errors->any())

                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </div>

            @endif
            {{-- END errores --}}
