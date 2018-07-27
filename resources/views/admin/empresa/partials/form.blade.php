<div class="form-group">
    {{ Form::label('name', 'Nombre de Empresa') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('razon_social', 'Razon Social') }}
    {{ Form::text('razon_social', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('status', 'Estado') }}
    {{ Form::select('status', array(
        '1' => 'Active',
        '2' => 'Inactive',
    ), null,['class' => 'form-control', 'id' => 'status']) }}
</div>
<div class="form-group ">
    {{ Form::label('logo', 'Logo de la empresa')}}<em>(La imagen debe ser de maximo 200x200 y 200kb)</em>
    {{ Form::file('logo', ['class' => 'form-control', 'id' => 'logo']) }}               
</div>         
<img class="img-fluid my-3" @if (isset($empresa->logo) && !empty($empresa->logo))src="{{ asset('').$empresa->logo}}"@else{ src="" }@endif id="profile-img-tag" style="max-width: 200px" />      
    {{ Form::hidden('maker_id', Auth::user()->id, ['class' => 'form-control']) }}
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}    
</div>
<a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('empresas.index') }}">Volver</a>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#profile-img-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#logo").change(function(){
            readURL(this);
        });
    </script>
