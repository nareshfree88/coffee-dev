<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Name: ', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('lname') ? ' has-error' : ''}}">
    {!! Form::label('lname', 'Last Name: ', ['class' => 'control-label']) !!}
    {!! Form::text('lname', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('lname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
    {!! Form::label('email', 'Email: ', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
    {!! Form::label('password', 'Password: ', ['class' => 'control-label']) !!}
    @php
        $passwordOptions = ['class' => 'form-control'];
        if ($formMode === 'create') {
            $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
        }
    @endphp
    {!! Form::password('password', $passwordOptions) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('gender') ? ' has-error' : ''}}">
    <label for="gender">Gender</label>
    <select class="form-control" name="gender">
        <option value="men">Men</option>
        <option value="women">Women</option>
    </select>
</div>
<div class="form-group{{ $errors->has('dob') ? 'has-error': ''}}">
    <label for="dob">Date of Birth</label>
    <input type="date" name="dob" class="form-control" value="<?php if(isset($user)) echo $user->dob ?>" />
</div>

<div class="form-group{{ $errors->has('phone') ? ' has-error' : ''}}">
    <label for="phone">Phone</label>
    <input type="text" name="phone" class="form-control" value="<?php if(isset($user)) echo  $user->phone; ?>" id="phone" required="required">
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group{{ $errors->has('phone') ? ' has-error' : ''}}">
    <label for="customer_group">Customer Group</label>
    <select class="form-control" name="customer_group">
        <option value="General">General</option>
       
    </select>
</div>
<div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}}">
    {!! Form::label('role', 'Role: ', ['class' => 'control-label']) !!}
    {!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control', 'multiple' => false]) !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
