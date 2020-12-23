<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('name_fr') ? 'has-error' : ''}}">
    {!! Form::label('name_fr', 'Name Fr', ['class' => 'control-label']) !!}
    {!! Form::text('name_fr', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name_fr', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
    {!! Form::text('price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('quantity') ? 'has-error' : ''}}">
    {!! Form::label('quantity', 'Quantity', ['class' => 'control-label']) !!}
    {!! Form::text('quantity', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('month') ? 'has-error' : ''}}">
    {!! Form::label('month', 'Month', ['class' => 'control-label']) !!}
    {!! Form::text('month', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('month', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
