@extends('layouts.admin')

@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">Products</h3>
</div>

<div class="main-wrapper">
    <div class="row">


        <div class="col-md-12">
            <div class="panel panel-white">
                
                <div class="card-body">
                    <a href="{{ url('/admin/products/create') }}" class="btn btn-success btn-sm" title="Add New Product" style="margin-bottom: 5px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add Product
                    </a>

                    <div class="table-responsive">
                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <!--<th>Attribute Family</th>-->
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <!--<th>Quantity</th>-->
                                    <th>Created_at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)
                                <tr>
                                    <td>{{  $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <!--<td>{{ $item->category }} {{($item->equip_addon !=null)?', '.$item->equip_addon:''}}</td>-->
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->price }}</td>
                                    <!--<td>{{ $item->quantity }}</td>-->
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ url('/admin/products/' . $item->id) }}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/admin/products/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/products', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete Product',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <!--<th>Attribute Family</th>-->
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <!--<th>Quantity</th>-->
                                    <th>Created_at</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
