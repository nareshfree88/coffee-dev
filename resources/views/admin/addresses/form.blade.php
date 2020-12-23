<div class="form-group{{ $errors->has('address') ? 'has-error' : ''}}">
   
    <input type="hidden" name="userid" value="{{ $user_addr }}">
</div>

<div class="form-group{{ $errors->has('first_name') ? 'has-error' : ''}}">
    <label class="control-label">First Name</label>
    <input type="text" name="first_name" value="<?php if(isset($address)) echo  $address->first_name ?>" class="form-control" required="required">
    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('last_name') ? 'has-error' : ''}}">
    <label class="control-label">Last Name</label>
    <input type="text" name="last_name" value="<?php if(isset($address)) echo  $address->last_name ?>" class="form-control" required="required">
    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('address') ? 'has-error' : ''}}">
    <label class="control-label">Address</label>
    <textarea class="form-control" name="address" id="address"><?php if(isset($address)) echo  $address->address ?></textarea>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('city') ? 'has-error' : ''}}">
    <label class="control-label">City</label>
    <input type="text" name="city" value="<?php if(isset($address)) echo  $address->city ?>" class="form-control" required="required">
    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('state') ? 'has-error' : ''}}">
    <label class="control-label">State</label>
    <input type="text" name="state" value="<?php if(isset($address)) echo  $address->state ?>" class="form-control" required="required">
    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('country') ? 'has-error' : ''}}">
    <label class="control-label">Country</label>
    <input type="text" name="country" value="<?php if(isset($address)) echo  $address->country ?>" class="form-control" required="required">
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('post_code') ? 'has-error' : ''}}">
    <label class="control-label">Post Code</label>
    <input type="text" name="post_code" value="<?php if(isset($address)) echo  $address->post_code ?>" class="form-control" required="required">
    {!! $errors->first('post_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('default_address') ? 'has-error' : ''}}">
    <label class="control-label">Default Address</label>
    <input type="text" name="default_address" value="<?php if(isset($address)) echo  $address->default_address ?>" class="form-control" required="required">
    {!! $errors->first('default_address', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
