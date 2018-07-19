<div class="form-group">
    {{ Form::label('padre_id', 'Mover de modulo') }}
    {{ Form::select('padre_id', $padres, null,['class' => 'form-control', 'id' => 'status']) }}
</div>            
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}    
</div>
<a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('modulos.index') }}">Volver</a>
