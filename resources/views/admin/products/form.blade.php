<div class="tab-content">
    <div class="tab-pane active fade in" id="tab1">
        <div class="row m-b-lg">
            <div class="col-md-6">
                <div class="row">
                    <!--                    <div class="form-group col-md-6{{ $errors->has('sku') ? 'has-error' : ''}}">
                                            <label class="control-label">SKU</label>
                                            <input type="text" name="sku" value="<?php //if (isset($product)) echo $product->sku           ?>" class="form-control" required="required" >
                                            {!! $errors->first('sku', '<p class="help-block">:message</p>') !!}
                                        </div>-->

                    <div class="form-group col-md-6{{ $errors->has('name') ? 'has-error' : ''}}">
                        <label class="control-label">Name*</label>
                        <input type="text" name="name" value="<?php if (isset($product)) echo $product->name ?>" class="form-control" required="required" >
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>



                    <div class="form-group col-md-6{{ $errors->has('name_fr') ? 'has-error' : ''}}">
                        <label class="control-label">Name Fr</label>
                        <input type="text" name="name_fr" value="<?php if (isset($product)) echo $product->name_fr ?>" class="form-control" required="required" >
                        {!! $errors->first('name_fr', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group col-md-6{{ $errors->has('category') ? 'has-error' : ''}}">
                        <label class="control-label">category </label>

                        <select class="form-control" id="category" onchange="getCategories()" name="category" required="required">
                            <option value="" >Select Category</option>
                            @foreach($category as $item)
                            <option value="{{$item->category_slug}}"
                            <?php
                            if (isset($product)) {
                                echo $product->category == $item->category_slug ? "selected" : "";
                            }
                            ?>>{{ ($item->category_name=='Whole Beans')? 'Coffee':$item->category_name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
                    </div>

                    <!--                    <div class="form-group col-md-6{{ $errors->has('attribute_family') ? 'has-error' : ''}}">
                                            <label class="control-label">Attribute Family</label>
                                            <input type="text" name="attribute_family" value="<?php //if (isset($product)) echo $product->attribute_family           ?>" class="form-control" required="required" >
                                            {!! $errors->first('attribute_family', '<p class="help-block">:message</p>') !!}
                                        </div>-->

                    <div class="form-group col-md-6{{ $errors->has('type') ? 'has-error' : ''}}" id="type" style="display: block;">
                        <label class="control-label">Type</label>
                        <input type="text" name="type" value="<?php if (isset($product)) echo $product->type ?>" class="form-control" >
                        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                    </div>



                    <div class="form-group col-md-6{{ $errors->has('equip_addon') ? 'has-error' : ''}}" id="addon" style="display: none;">
                        <label class="control-label">Add on</label>
                        <select name="equip_addon" class="form-control" >
                            <option value="" selected>choose any</option>
                            <option value="basic_equipment" selected>Basic Equipment</option>
                            <option value="merch">Merch</option>
                            <option value="filter">Filter</option>
                        </select>
                        {!! $errors->first('equip_addon', '<p class="help-block">:message</p>') !!}
                    </div>



                    <!--                    <div class="form-group col-md-6{{ $errors->has('url_key') ? 'has-error' : ''}}">
                                            <label class="control-label">URL KEY</label>
                                            <input type="text" name="url_key" value="<?php //if (isset($product)) echo $product->url_key           ?>" class="form-control" required="required" >
                                            {!! $errors->first('url_key', '<p class="help-block">:message</p>') !!}
                                        </div>-->

                    <!--                    <div class="form-group col-md-6{{ $errors->has('tax_category') ? 'has-error' : ''}}">
                                            <label class="control-label">Tax Category</label>
                                            <input type="text" name="tax_category" value="<?php //if (isset($product)) echo $product->tax_category           ?>" class="form-control" required="required" >
                                            {!! $errors->first('tax_category', '<p class="help-block">:message</p>') !!}
                                        </div>-->

                    <!--                    <div class="form-group col-md-12{{ $errors->has('new') ? 'has-error' : ''}}">
                                            <label for="myCheck" class="control-label">New:</label> 
                                            <input type="checkbox" id="myCheck" name="new" value="1" class="form-control" >
                    
                                            <label class="control-label">featured</label>
                                            <input type="checkbox" id="myCheck" name="featured" value="1" class="form-control">
                    
                                            <label class="control-label">Visible Indivisually</label>
                                            <input type="checkbox" id="myCheck" name="visible_individually" value="1" class="form-control">
                                            {!! $errors->first('new', '<p class="help-block">:message</p>') !!}
                                        </div>-->


                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group col-md-6{{ $errors->has('color') ? 'has-error' : ''}}" id="color" style="display: none;">
                    <label class="control-label">Color</label>
                    <input type="text" name="color" value="<?php if (isset($product)) echo $product->color ?>" class="form-control" >
                    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group col-md-6{{ $errors->has('type_fr') ? 'has-error' : ''}}" id="type_fr" style="display: block;">
                    <label class="control-label">Type Fr</label>
                    <input type="text" name="type_fr" value="<?php if (isset($product)) echo $product->type_fr ?>" class="form-control" >
                    {!! $errors->first('type_fr', '<p class="help-block">:message</p>') !!}
                </div>

                <!--                <div class="form-group col-md-3{{ $errors->has('size') ? 'has-error' : ''}}">
                                    <label class="control-label">Size</label>
                                    <input type="text" name="size" value="<?php //if (isset($product)) echo $product->size           ?>" class="form-control" required="required" >
                                    {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
                                </div>-->
                <!--                <div class="form-group col-md-3{{ $errors->has('brand') ? 'has-error' : ''}}">
                                    <label class="control-label">Brand</label>
                                    <input type="text" name="brand" value="<?php //if (isset($product)) echo $product->brand           ?>" class="form-control" required="required" >
                                    {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
                                </div>-->

                <!--                <div class="form-group col-md-3{{ $errors->has('quantity') ? 'has-error' : ''}}">
                                    <label class="control-label">Quantity</label>
                                    <input type="text" name="quantity" value="<?php //if (isset($product)) echo $product->quantity           ?>" class="form-control" required="required" >
                                    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
                                </div>-->
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="tab2">
        <div class="row">

            <div class="col-md-9">
                <div class="form-group col-md-12{{ $errors->has('description') ? 'has-error' : ''}}">
                    <label class="control-label">Description</label>
                    <textarea name="description" class="form-control" ><?php if (isset($product)) echo $product->description ?></textarea>
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group col-md-12{{ $errors->has('description_fr') ? 'has-error' : ''}}">
                    <label class="control-label">Description Fr</label>
                    <textarea name="description_fr" class="form-control" ><?php if (isset($product)) echo $product->description_fr ?></textarea>
                    {!! $errors->first('description_fr', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group col-md-12{{ $errors->has('long_description') ? 'has-error' : ''}}">
                    <label class="control-label"> Long Description</label>
                    <textarea name="long_description" class="form-control" ><?php if (isset($product)) echo $product->long_description ?></textarea>
                    {!! $errors->first('long_description', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group col-md-12{{ $errors->has('long_description_fr') ? 'has-error' : ''}}">
                    <label class="control-label">Long Description Fr</label>
                    <textarea name="long_description_fr" class="form-control" ><?php if (isset($product)) echo $product->long_description_fr ?></textarea>
                    {!! $errors->first('long_description_fr', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="tab3">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group col-md-12{{ $errors->has('price') ? 'has-error' : ''}}">
                    <label class="control-label">Price*</label>
                    <input type="text" name="price" value="<?php if (isset($product)) echo $product->price ?>" class="form-control" required="required" >
                    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                </div>
                <!--                <div class="form-group col-md-12{{ $errors->has('cost') ? 'has-error' : ''}}">
                                    <label class="control-label">Cost</label>
                                    <input type="text" name="cost" value="<?php // if (isset($product)) echo $product->cost           ?>" class="form-control" required="required" >
                                    {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
                                </div>-->
                <!--                <div class="form-group col-md-12{{ $errors->has('special_price') ? 'has-error' : ''}}">
                                    <label class="control-label">Special Price</label>
                                    <input type="text" name="special_price" value="<?php //if (isset($product)) echo $product->special_price           ?>" class="form-control" required="required" >
                                    {!! $errors->first('special_price', '<p class="help-block">:message</p>') !!}
                                </div>-->
                <!--                <div class="form-group col-md-12{{ $errors->has('special_price_from') ? 'has-error' : ''}}">
                                    <label class="control-label">Special Price From</label>
                                    <input type="date" name="special_price_from" value="<?php //if (isset($product)) echo $product->special_price_from           ?>" class="form-control" required="required" >
                                    {!! $errors->first('special_price_from', '<p class="help-block">:message</p>') !!}
                                </div>-->
                <!--                <div class="form-group col-md-12{{ $errors->has('special_price_to') ? 'has-error' : ''}}">
                                    <label class="control-label">Special Price To</label>
                                    <input type="date" name="special_price_to" value="<?php //if (isset($product)) echo $product->special_price_to           ?>" class="form-control" required="required" >
                                    {!! $errors->first('special_price_to', '<p class="help-block">:message</p>') !!}
                                </div>-->
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="tab4">
        <div class="row">
            <div class="col-md-12">
                <!--                <div class="form-group col-md-6{{ $errors->has('width') ? 'has-error' : ''}}">
                                    <label class="control-label">Width</label>
                                    <input type="text" name="width" value="<?php //if (isset($product)) echo $product->width           ?>" class="form-control" required="required" >
                                    {!! $errors->first('width', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="form-group col-md-6{{ $errors->has('height') ? 'has-error' : ''}}">
                                    <label class="control-label">Height </label>
                                    <input type="text" name="height" value="<?php //if (isset($product)) echo $product->height           ?>" class="form-control" required="required" >
                                    {!! $errors->first('height', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="form-group col-md-6{{ $errors->has('depth') ? 'has-error' : ''}}">
                                    <label class="control-label">Depth</label>
                                    <input type="text" name="depth" value="<?php //if (isset($product)) echo $product->depth           ?>" class="form-control" required="required" >
                                    {!! $errors->first('depth', '<p class="help-block">:message</p>') !!}
                                </div>-->
                <div class="form-group col-md-6{{ $errors->has('weight') ? 'has-error' : ''}}">
                    <label class="control-label">Weight, Dimension, Size*</label>
                    <input type="text" name="weight" value="<?php if (isset($product)) echo $product->weight ?>" class="form-control" required="required" >
                    {!! $errors->first('weight', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="tab5">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($product)) {
                    $images = explode(',', $product->image);
                    for ($i = 0; $i < count($images); $i++) {
                        ?>
                        <img src="{{asset('public/uploads/products/'.$images[$i])}}" width="70px" height="70px" style="border-radius: 5px;" >
                        <?php
                    }
                }
                ?>
                <div class="form-group col-md-12{{ $errors->has('image') ? 'has-error' : ''}}">
                    <label class="control-label">Image </label>
                    <input type="file" multiple="" name="image[]" value="" class="form-control ">
                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                </div> 
            </div>
        </div>
    </div>

    <!--    <div class="tab-pane fade" id="tab6">
            <div class="row">
                <div class="form-group col-md-6{{ $errors->has('up_selling') ? 'has-error' : ''}}">
                            <label class="control-label">Up Selling</label>
                            <input type="text" name="up_selling" value="<?php if (isset($product)) echo $product->up_selling ?>" class="form-control" required="required" >
                            {!! $errors->first('up_selling', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group col-md-6{{ $errors->has('cross_seling') ? 'has-error' : ''}}">
                            <label class="control-label">Cross Selling</label>
                            <input type="text" name="cross_seling" value="<?php if (isset($product)) echo $product->cross_seling ?>" class="form-control" required="required" >
                            {!! $errors->first('cross_seling', '<p class="help-block">:message</p>') !!}
                        </div>
            </div>
        </div>-->

    <div class="tab-pane fade" id="tab7">
        <!--        <h3 style="margin-top:25px;">Thank You!</h3>
                <div class="alert alert-success m-t-sm m-b-lg" role="alert">
                    Congratulations! You got the last step.
                </div>-->
        <div class="form-group">
            <center>{!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success']) !!}</center>
        </div>
    </div>
    <ul class="pager wizard">
        <li class="previous"><a href="#" class="btn btn-default">Previous</a></li>
        <li class="next"><a type="submit" class="btn btn-default">Next</a></li>
    </ul>
</div>
<!--{!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-default']) !!}-->

<script>
    function getCategories() {
        var cat = document.getElementById("category").value;
        if (cat == 'equipment') {
            document.getElementById("type").style.display = "none";
            document.getElementById("type_fr").style.display = "none";
            document.getElementById("addon").style.display = "block";
            document.getElementById("color").style.display = "block";
        } else if (cat == 'whole_beans') {
            document.getElementById("color").style.display = "none";
            document.getElementById("type").style.display = "block";
            document.getElementById("type_fr").style.display = "block";
            document.getElementById("addon").style.display = "none";
        } else {
            document.getElementById("type").style.display = "block";
            document.getElementById("type_fr").style.display = "block";
            document.getElementById("addon").style.display = "none";
        }

    }
   
</script>