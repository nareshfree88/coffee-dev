<div class="form-group{{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'control-label']) !!}
    {!! Form::text('user_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('params') ? 'has-error' : ''}}">
    {!! Form::label('params', 'Params', ['class' => 'control-label']) !!}
    {!! Form::textarea('params', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('params', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('charge_id') ? 'has-error' : ''}}">
    {!! Form::label('charge_id', 'Charge Id', ['class' => 'control-label']) !!}
    {!! Form::text('charge_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('charge_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('charge_type') ? 'has-error' : ''}}">
    {!! Form::label('charge_type', 'Charge Type', ['class' => 'control-label']) !!}
    {!! Form::text('charge_type', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('charge_type', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
