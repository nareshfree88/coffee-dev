<div class="form-group{{ $errors->has('code') ? 'has-error' : ''}}">
    <label class="control-label">Code</label>
    <input type="text" name="code" value="<?php if (isset($attribute)) echo $attribute->code ?>" class="form-control" required="required" >
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    <label class="control-label">Name</label>
    <input type="text" name="name" value="<?php if (isset($attribute)) echo $attribute->name ?>" class="form-control" required="required" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('type') ? 'has-error' : ''}}">
    <label class="control-label">Type</label>
    <input type="text" name="type" value="<?php if (isset($attribute)) echo $attribute->type ?>" class="form-control" required="required" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('required') ? 'has-error' : ''}}">
    <label class="control-label">Required</label>
    <select name="required" class="form-control">
        <option value="">Choose Any</option>
        <option value="true" <?php  if(isset($attribute)) echo ($attribute->required === 'true')?'selected':'' ?>>True</option>
        <option value="false" <?php if(isset($attribute)) echo ($attribute->required === 'false')?'selected':'' ?>>False</option>
    </select>
  
    {!! $errors->first('required', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('unique') ? 'has-error' : ''}}">
    <label class="control-label">Unique</label>
    <select name="unique" class="form-control">
        <option value="">Choose Any</option>
        <option value="true" <?php if(isset($attribute)) echo ($attribute->unique === 'true')?'selected':'' ?>>True</option>
        <option value="false" <?php if(isset($attribute)) echo ($attribute->unique === 'false')?'selected':'' ?>>False</option>
    </select>
    {!! $errors->first('unique', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('locale_based') ? 'has-error' : ''}}">
    <label class="control-label">Locale Based</label>
    <select name="locale_based" class="form-control">
        <option value="">Choose Any</option>
        <option value="true" <?php if(isset($attribute)) echo ($attribute->locale_based === 'true')?'selected':'' ?>>True</option>
        <option value="false" <?php if(isset($attribute)) echo ($attribute->locale_based === 'false')?'selected':'' ?>>False</option>
    </select>
    {!! $errors->first('locale_based', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('channel_based') ? 'has-error' : ''}}">

    <label class="control-label">Channel Based</label>
    <select name="channel_based" class="form-control">
        <option value="">Choose Any</option>
        <option value="true" <?php if(isset($attribute)) echo ($attribute->channel_based === 'true')?'selected':'' ?>>True</option>
        <option value="false" <?php if(isset($attribute)) echo ($attribute->channel_based === 'false')?'selected':'' ?> >False</option>
    </select>

    {!! $errors->first('channel_based', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
