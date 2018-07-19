<div class="form-row form-group">
    <div class="col">
        {{ Form::label('lugar', 'Lugar de reunion') }}
        {{ Form::text('lugar', null, ['class' => 'form-control']) }}
    </div>
    <div class="col">
        {{ Form::label('asunto', 'Asunto') }}
        {{ Form::text('asunto', null, ['class' => 'form-control']) }}
    </div>
    <div class="col">
        {{ Form::label('comentario', 'Comentario') }}
        {{ Form::text('comentario', null, ['class' => 'form-control']) }}
    </div>
    <div class="col">
        {{ Form::label('status', 'Estado') }}
        {{ Form::select('status', array(
            '1' => 'Pendiente',
            '2' => 'Concretada',
            '3' => 'Cancelada',
        ), null,['class' => 'form-control', 'id' => 'status']) }}
    </div>
</div>
<div class="form-row form-group">
    <div class="col">
        {{ Form::label('asesor', 'Asesor') }}
        {{ Form::select('asesor', $usuarios, null,['class' => 'form-control', 'id' => 'asesor']) }}
    </div>
    <div class="col">
        {{ Form::label('cliente', 'Cliente') }}
        {{ Form::select('cliente', $usuarios, null,['class' => 'form-control', 'id' => 'cliente']) }}
    </div>
    <div class="col">
        {{ Form::label('dia', 'Dia de la reunion') }}
        {{ Form::date('dia', null, ['class' => 'form-control']) }}
    </div>
    <div class="col">
        {{ Form::label('inicio', 'Inicio de la reunion') }}
        {{ Form::time('inicio', null, ['class' => 'form-control']) }}
    </div>
    <div class="col">
        {{ Form::label('fin', 'Fin de la reunion') }}
        {{ Form::time('fin', null, ['class' => 'form-control']) }}
    </div>
</div>
{{ Form::hidden('maker_id', Auth::user()->id, ['class' => 'form-control']) }}
<div class="form-group text-right">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}    
</div>