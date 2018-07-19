<div class="form-group ">             
    {!! Form::label('empresa_id', 'Asignar empresa') !!}            
    {{ Form::select('empresa_id', $empresas, null,['placeholder' => 'Seleccione una empresa','class' => 'form-control', 'id' => 'empresa_id']) }}
</div>  
<div class="form-group">
    {{ Form::label('name', 'Nombre') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'Correo') }}
    {{ Form::email('email', null, ['class' => 'form-control']) }}
</div>
<div class="form-group ">             
    {!! Form::label('roles', 'Asignar Rol') !!}            
    {{ Form::select('roles', $roles, null,['placeholder' => 'Seleccione un Rol','class' => 'form-control', 'id' => 'roles']) }}
</div>  

    @if (!isset($val))
    <div class="form-group">
        {{ Form::label('password', 'Contrasena') }}
        {{ Form::text('password', null, ['class' => 'form-control']) }}
        {{ Form::label('password_confirmation', 'Confirmar contrasena') }}
        {{ Form::text('password_confirmation', null, ['class' => 'form-control']) }}
    </div>        
    @endif
{{ Form::hidden('maker_id', Auth::user()->id, ['class' => 'form-control']) }}
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}    
</div>
<a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('usuarios.index') }}">Volver</a>
