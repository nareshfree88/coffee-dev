<div class="form-group{{ $errors->has('message') ? 'has-error' : ''}}">
    {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
    {!! Form::textarea('message', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
