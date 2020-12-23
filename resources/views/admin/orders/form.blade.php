<div class="form-group{{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'control-label']) !!}
    {!! Form::text('user_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('sub_total') ? 'has-error' : ''}}">
    {!! Form::label('sub_total', 'Sub Total', ['class' => 'control-label']) !!}
    {!! Form::text('sub_total', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('sub_total', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('grand_total') ? 'has-error' : ''}}">
    {!! Form::label('grand_total', 'Grand Total', ['class' => 'control-label']) !!}
    {!! Form::text('grand_total', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('grand_total', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('channel_name') ? 'has-error' : ''}}">
    {!! Form::label('channel_name', 'Channel Name', ['class' => 'control-label']) !!}
    {!! Form::text('channel_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('channel_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::text('status', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
