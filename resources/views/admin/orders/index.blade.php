@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Orders</h3>
</div>
<div class="main-wrapper">
    <div class="row">


        <div class="col-md-12">
            <div class="panel panel-white">

                <div class="card-body">
                    <!--                        <a href="{{ url('/admin/orders/create') }}" class="btn btn-success btn-sm" title="Add New Order">
                                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                            </a>-->

                    <div class="table-responsive">
                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Product Name</th>
                                    <!--<th>Transection Id</th>-->
                                    <th>Product Price</th>
                                    <th>Shipping charges</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                    <th>Grand Total</th>
                                    <th>Order Date</th>
                                    <th>Bill TO</th>
                                    <th>Shipped To</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)

                                <tr> 
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user_id." - ". ucwords($item->get_user->name) }}</td>  
                                    <td>{{$item->product_name}}</td>
                                    <!--<td>{{ $item->customer_trans_id }}</td>-->
                                    <td>${{ number_format($item->product_price,2) }}</td>
                                    <td>{{ $item->flat_rate? '$'.$item->flat_rate:'Free Shipping' }}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>${{ number_format($item->sub_total,2) }}</td>
                                    <td>${{ number_format($item->grand_total,2) }}</td>
                                    <td><?php
                                        $date = $item->created_at;
                                        $createDate = new DateTime($date);
                                        $strip = $createDate->format('d-m-Y');
                                            echo $strip;
                                        ?></td>
                                    <td>{{ $item->get_user['name'] }}</td>
                                    <td>{{ $item->get_user['name'] }}</td>

                                    <td>
                                        <a href="{{ url('/admin/orders/' . $item->id) }}" title="View Order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <!--<a href="{{ url('/admin/orders/' . $item->id . '/edit') }}" title="Edit Order"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>-->
                                        <!--                                            {!! Form::open([
                                                                                        'method' => 'DELETE',
                                                                                        'url' => ['/admin/orders', $item->id],
                                                                                        'style' => 'display:inline'
                                                                                    ]) !!}
                                                                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                                                                'type' => 'submit',
                                                                                                'class' => 'btn btn-danger btn-sm',
                                                                                                'title' => 'Delete Order',
                                                                                                'onclick'=>'return confirm("Confirm delete?")'
                                                                                        )) !!}
                                                                                    {!! Form::close() !!}
                                                                                </td>-->
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Product Name</th>
                                    <!--<th>Transection Id</th>-->
                                    <th>Product Price</th>
                                    <th>Shipping Charges</th>

                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                    <th>Grand Total</th>
                                    <th>Order Date</th>
                                    <th>Bill TO</th>
                                    <th>Shipped To</th>

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
