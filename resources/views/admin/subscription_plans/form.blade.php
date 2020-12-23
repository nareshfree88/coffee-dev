<div class="form-group{{ $errors->has('plan_name') ? 'has-error' : ''}}">
    {!! Form::label('plan_name', 'Plan Name', ['class' => 'control-label']) !!}
    {!! Form::text('plan_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('plan_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
    {!! Form::text('price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('currency') ? 'has-error' : ''}}">
    {!! Form::label('currency', 'Currency', ['class' => 'control-label']) !!}
    <select class="form-control" name="currency">
        <option value="INR" selected="selected">INR</option>
        <!--<option value="USD">USD</option>-->

    </select>
    <!--{!! Form::text('currency', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}-->
    {!! $errors->first('currency', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('recurring') ? 'has-error' : ''}}">
    {!! Form::label('recurring', 'Recurring', ['class' => 'control-label']) !!}
    <select class="form-control" name="recurring">
        <option value="day">One Day Subscription</option>
        <option value="week">Weekly Subscription</option>
        <option value="month">Monthly Subscription</option>
        <option value="year">Yearly Subscription</option>
    </select>
    <!--{!! Form::text('recurring', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}-->
    {!! $errors->first('recurring', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Image', ['class' => 'control-label']) !!}
    {!! Form::file('image', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
