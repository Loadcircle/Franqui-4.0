<div class="form-group">
    {{ Form::label('name', 'Nombre del Documento') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group ">
    {{ Form::file('file', ['class' => 'form-control', 'id' => 'file']) }}               
</div>   
<div class="form-group">
    {{ Form::label('comentario', 'Comentario') }}
    {{ Form::textarea('comentario', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('empresa_id', 'Empresa') }}
    {{ Form::select('empresa_id', $empresas, null,['class' => 'form-control', 'id' => 'empresa_id']) }}
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
<a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('smodulos', $slug) }}">Volver</a>    