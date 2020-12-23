@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Product# {{ $product->id }}</h3>
</div>
    <div class="main-wrapper">
        <div class="row">
          

            <div class="col-md-9">
                <div class="panel panel-white">
                    
                    <div class="card-body">

                        <a href="{{ url('/admin/products') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/products/' . $product->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/products', $product->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Product',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $product->id }}</td>
                                    </tr>
<!--                                    <tr>
                                        <th> Sku </th>
                                        <td> {{ $product->sku }} </td>
                                    </tr>-->
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $product->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Description </th>
                                        <td> <fieldset>{{ $product->description }}</fieldset>  </td>
                                    </tr>
                                    <tr>
                                        <th> Long Description </th>
                                        <td> <fieldset>{{ $product->long_description }}</fieldset>  </td>
                                    </tr>
                                    <tr>
                                        <th> Category </th>
                                        <td> <fieldset>{{ $product->category }}</fieldset>  </td>
                                    </tr>
                                    <tr>
                                        <th> Type </th>
                                        <td> <fieldset>{{ (!$product->Type)?'Equipment':$product->Type }}</fieldset>  </td>
                                    </tr>
                                    <tr>
                                        <th> Price </th>
                                        <td> <fieldset>{{ $product->price }}</fieldset>  </td>
                                    </tr>
                                    <tr>
                                        <th> Weight </th>
                                        <td> <fieldset>{{ $product->weight }}</fieldset>  </td>
                                    </tr>
                                     <tr>
                                        <th> Product Images </th>
                                        <td><?php 
                                            $images = explode(',',$product->image);
                                         
                                            for($i = 0; $i < count($images); $i++):
                                               echo '<img src ='.asset('public/uploads/products/'.$images[$i]).' width="70px" height="70px" style="margin-left: 3px;" />';
                                            endfor;
                                        ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
