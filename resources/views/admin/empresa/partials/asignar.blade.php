<div class="form-group">
    {{ Form::label('servicio', 'Servicios') }}
        <ul class="list-group">
            @foreach ($servicios as $servicio)
            <li>
                <label>
                    {{ Form::checkbox('servicios[]', $servicio->id, null) }}
                    {{ $servicio->name }}
                </label>  
            </li>            
            @endforeach
        </ul>
</div>
    <div class="form-group">
        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}    
    </div>
    <a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('empresas.index') }}">Volver</a>
    