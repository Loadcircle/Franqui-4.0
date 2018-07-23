<div class="form-group">
        {{ Form::label('mensaje', 'Escribe tu mensaje') }}
        {{ Form::textarea('mensaje', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('status', 'Estado') }}
    {{ Form::select('status', array(
        '1' => 'Pendiente',
        '2' => 'Cerrado',
    ), null,['class' => 'form-control', 'id' => 'status']) }}
</div>
<div class="form-group">
    {{ Form::label('cliente', 'Estado') }}
    {{ Form::select('cliente', $clientes, null,['class' => 'form-control', 'id' => 'cliente', 'placeholder' => 'Toda la empresa']) }}
</div>
{{ Form::hidden('maker_id', Auth::user()->id, ['class' => 'form-control']) }}
{{ Form::hidden('ticket_id', $tickets->id, ['class' => 'form-control']) }}
<div class="form-group text-right">
    {{ Form::submit('Enviar', ['class' => 'btn btn-sm btn-success']) }}    
</div>