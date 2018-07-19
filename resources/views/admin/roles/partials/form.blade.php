<div class="form-group">
    {{ Form::label('name', 'Nombre del Rol') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'Slug') }}
    {{ Form::text('slug', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Descripcion') }}
    {{ Form::text('description', null, ['class' => 'form-control']) }}
</div>
<hr>
<h3>Permiso especial</h3>
<div class="form-group">
    <label>
        {{Form::radio('special', 'all-access')}} Acceso total
    </label>
    <label>
        {{Form::radio('special', 'no-access')}} Ningun acceso
    </label>
</div>
<h3>Lista de permisos</h3>
<div class="form-group">
    <ul class="list-group">
        @foreach ($permissions as $permission)
        <li>
            <label>
                {{ Form::checkbox('permissions[]', $permission->id, null) }}
                {{ $permission->name }}
                <em>({{ $permission->description }})</em>
	        </label>  
        </li>            
        @endforeach
    </ul>
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}    
</div>
<a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('roles.index') }}">Volver</a>

<script>
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