<!--<div class="form-group{{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::text('status', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>-->


<div class="form-group{{ $errors->has('status') ? 'has-error' : ''}}">
    <div class="col-md-5">
         <select class="form-control" name="status" required="required">
             <option value="">----Select Status----</option>
        <option value="0" >AWAITING</option>
        <option value="1" >AWAITING PROCESS</option>
        <option value="2">SHIPPED</option>
        <option value="3">DELIVERED</option>

    </select>
    </div>
   
</div>

<div class="form-group{{ $errors->has('subject') ? 'has-error' : ''}}">
    <div class="col-md-5">
    {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
    {!! Form::text('subject', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('content') ? 'has-error' : ''}}">
    {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
