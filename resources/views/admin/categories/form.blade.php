<div class="form-group{{ $errors->has('category_name') ? 'has-error' : ''}}">
    {!! Form::label('category_name', 'Category Name', ['class' => 'control-label']) !!}
    {!! Form::text('category_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('category_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('category_slug') ? 'has-error' : ''}}">
    {!! Form::label('category_slug', 'Category Slug', ['class' => 'control-label']) !!}
    {!! Form::text('category_slug', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('category_slug', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
