<style>
    .btn-size{
        width: 92%;
    }
</style>
<div class="row">
    <input type="hidden" value="" name="flat_rate" id="flat_rate"/>
<!--    <input type="text" value="" name="discount_rate" id="discount_rate"/>
    <input type="text" value="" name="gTotal" id="gTotal"/>-->

    <div class="col-md-6">
        <div class="form-group{{ $errors->has('first_name') ? 'has-error' : ''}}">
            <label class="control-label">{{__('customlang.first_name')}}</label>
            <input type="text" name="first_name" value="<?php if (isset($userAddress)) echo $userAddress->first_name ?>" autocomplete="off" class="form-control" required="required">
            {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('last_name') ? 'has-error' : ''}}">
            <label class="control-label">{{__('customlang.last_name')}}</label>
            <input type="text" name="last_name" value="<?php if (isset($userAddress)) echo $userAddress->last_name ?>" autocomplete="off" class="form-control" required="required">
            {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('address') ? 'has-error' : ''}}">
            <label class="control-label">{{__('customlang.address')}}</label>
            <textarea class="form-control" name="address" id="address"><?php if (isset($userAddress)) echo $userAddress->address ?></textarea>
            {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group{{ $errors->has('city') ? 'has-error' : ''}}">
            <label class="control-label">{{__('customlang.city')}}</label>
            <input type="text" name="city" value="<?php if (isset($userAddress)) echo $userAddress->city ?>" class="form-control" required="required">
            {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
        </div>
    </div>


    <div class="col-md-4">
        <div class="form-group{{ $errors->has('state') ? 'has-error' : ''}}">
            <label class="control-label">{{__('customlang.state')}}</label>
            <input type="text" name="state" value="<?php if (isset($userAddress)) echo $userAddress->state ?>" class="form-control" autocomplete="off" required="required">
            {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('country') ? 'has-error' : ''}}">
            <label class="control-label">{{__('customlang.country')}}</label>
           
            <select id="country" name="country" class="form-control" autocomplete="off" >
                
                <option value="" >--</option>
                <option value="canada" <?php if (isset($userAddress)) echo ($userAddress->country == 'canada')? 'selected':'' ?> >Canada</option>
                <option value="united_states" <?php if (isset($userAddress)) echo ($userAddress->country == 'united_states')? 'selected':'' ?>>United States</option>
            </select>
            {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('post_code') ? 'has-error' : ''}}">
            <label class="control-label">{{__('customlang.pin_code')}}</label>
            <input type="text" name="post_code" value="<?php if (isset($userAddress)) echo $userAddress->post_code ?>" class="form-control" required="required">
            {!! $errors->first('post_code', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-8" style="display:none;">
        <div class="form-group{{ $errors->has('default_address') ? 'has-error' : ''}}">
            <label class="control-label">Default Address</label>
            <select class=" form-control" name="default_address">
                <option value="">Choose Any</option>
                <option value="0">No</option>
                <option value="1" selected>Yes</option>
            </select>
        <!--    <input type="text" name="default_address" value="<?php if (isset($address)) echo $userAddress->default_address ?>" class="form-control" required="required">
            {!! $errors->first('default_address', '<p class="help-block">:message</p>') !!}-->
        </div>
    </div>
    <div class="col-md-6 col-md-offset-1" style="padding: 32px 0 0 0; width: 92% !important; margin-left: 15px;">
        <div class="form-group">
            {!! Form::submit($formMode === 'edit' ? 'Update' : __('customlang.create'), ['class' => 'button button-full'] ) !!}
        </div>
    </div>

</div>




