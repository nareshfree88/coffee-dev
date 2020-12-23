<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('bag_qty') ? 'has-error' : ''}}">
    {!! Form::label('bag_qty', 'Bag Qty', ['class' => 'control-label']) !!}
    {!! Form::text('bag_qty', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('bag_qty', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('bag_price') ? 'has-error' : ''}}">
    {!! Form::label('bag_price', 'Bag Price', ['class' => 'control-label']) !!}
    {!! Form::text('bag_price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('bag_price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('filter') ? 'has-error' : ''}}">
    {!! Form::label('filter', 'Filter', ['class' => 'control-label']) !!}
    {!! Form::text('filter', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('filter', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('equipment') ? 'has-error' : ''}}">
    {!! Form::label('equipment', 'Equipment', ['class' => 'control-label']) !!}
    {!! Form::text('equipment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('equipment', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('merch') ? 'has-error' : ''}}">
    {!! Form::label('merch', 'Merch', ['class' => 'control-label']) !!}
    {!! Form::text('merch', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('merch', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('monthly_subtotal') ? 'has-error' : ''}}">
    {!! Form::label('monthly_subtotal', 'Monthly Subtotal', ['class' => 'control-label']) !!}
    {!! Form::text('monthly_subtotal', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('monthly_subtotal', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
