<div class="modal fade show" id="open-plant-strain-popup-{{$plant->id}}" >
    <div class="modal-dialog ui-block " style="max-width:720px">
        <a href="" class="close icon-close fa fa-close" data-dismiss="modal" aria-label="Close">
        </a>

        <div class="modal-body">
            <h4>Universal Cannabis Product Code<br>(UCPC) </h4>
            <p>El Código Universal de Productos del Cannabis es una forma abierta impulsada por <a href="http://www.cannabisreports.com" target="blank_">CannabisReports</a> para identificar variedades y productos relacionados con el cannabis.</p>
            <h6 class="font-italic" >Como nuestro lema es no reinventar la rueda </h6>
            <p>Busca la variedad en <a href="http://www.cannabisreports.com" target="blank_">www.cannabisreports.com</a>  y copia el código UCPC de 25 digitos para asociar la variedad a tu planta  </p>
            </p>
            {{Form::open(['action' => 'StrainController@getCR'])}}
            <input name="plant_id" hidden value="{{$plant->id}}">
            <input class="form-control " id="input-ucpc" placeholder="codigo ucpc de 25 digitos"  type="text"  name="ucpc">
            <button class="btn btn-primary" type="submit" >Verificar información</button>

            {{Form::close()}}

            <div id="plant-strain-selector">
                
            </div>


        </div>

    </div>

</div>
{{-- 

@section('scripts')

<script type="text/javascript">
$(document).ready(function() {
    $('#input-ucpc').on('change', function() {
        $.getJSON("https://www.cannabisreports.com/api/v1.0/strains/VUJCJ4TYMG000000000000000", function() { 
            console.log(data);
        });
    });
});


</script>

@endsection
                 
 --}}