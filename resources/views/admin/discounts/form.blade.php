
    
        <div class="form-group{{ $errors->has('coupan_code') ? 'has-error' : ''}}">
            {!! Form::label('coupan_code', 'Coupan Code', ['class' => 'control-label']) !!}
            {!! Form::text('coupan_code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('coupan_code', '<p class="help-block">:message</p>') !!}
        </div> 
 

        <div class="form-group{{ $errors->has('discount_percentage') ? 'has-error' : ''}}">
            {!! Form::label('discount_percentage', 'Discount Percentage', ['class' => 'control-label']) !!}
            {!! Form::text('discount_percentage', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('discount_percentage', '<p class="help-block">:message</p>') !!}
        </div>

   
        <div class="form-group">
        {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
    
    





<!--<div class="form-group{{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::text('status', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>-->



