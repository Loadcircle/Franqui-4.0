<div class="form-group">
    {{ Form::label('name', 'Nombre de la Herramienta') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'Url') }}
    {{ Form::text('slug', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('servicio_id', 'Asignar a servicio') }}
    {{ Form::select('servicio_id', $servicios, null,['class' => 'form-control', 'id' => 'roles']) }}
</div>  
<div class="form-group">
    {{ Form::label('status', 'Estado') }}
    {{ Form::select('status', array(
        '1' => 'Active',
        '2' => 'Inactive',
    ), null,['class' => 'form-control', 'id' => 'status']) }}
</div>            
    {{ Form::hidden('maker_id', Auth::user()->id, ['class' => 'form-control']) }}
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}    
</div>
<a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('herramientas.index') }}">Volver</a>

    <script type="text/javascript">        
        document.addEventListener("DOMContentLoaded", function(e) {
            var name = document.getElementById('name'),
                slug = document.getElementById('slug');    
            name.onkeyup = function() {
            slug.value = string_to_slug(name.value);
            }
        });
        function string_to_slug (str) {
                str = str.replace(/^\s+|\s+$/g, ''); 
                str = str.toLowerCase();
                var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
                var to   = "aaaaeeeeiiiioooouuuunc------";
                for (var i=0, l=from.length ; i<l ; i++) {
                    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }
                str = str.replace(/[^a-z0-9 -]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');

                return str;
        }
    </script>
