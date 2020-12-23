<div class="form-group{{ $errors->has('video') ? 'has-error' : ''}}">
    {!! Form::label('video', 'Video', ['class' => 'control-label']) !!}
    {!! Form::file('video', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
