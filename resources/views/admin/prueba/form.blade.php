<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
    {!! Form::label('apellido', 'Apellido', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
        {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('documento') ? 'has-error' : ''}}">
    {!! Form::label('documento', 'Documento', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('documento', null, ['class' => 'form-control']) !!}
        {!! $errors->first('documento', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('mascota') ? 'has-error' : ''}}">
    {!! Form::label('mascota', 'Mascota', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('mascota', null, ['class' => 'form-control']) !!}
        {!! $errors->first('mascota', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('vehiculo') ? 'has-error' : ''}}">
    {!! Form::label('vehiculo', 'Vehiculo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('mascota', null, ['class' => 'form-control']) !!}
        {!! $errors->first('vehiculo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('bicicleta') ? 'has-error' : ''}}">
    {!! Form::label('bicicleta', 'Bicicleta', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('otros_datos["mascota"]', null, ['class' => 'form-control']) !!}
        {!! $errors->first('otros_datos', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
