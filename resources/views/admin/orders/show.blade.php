@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Order# {{$order->id}}</h3>
</div>

<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">
                    <div id="rootwizard">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-user m-r-xs"></i>Order Information</a></li>
                            <li role="presentation"><a href="#tab2" data-toggle="tab"><i class="fa fa-truck m-r-xs"></i>Address Info</a></li>
                            <li role="presentation"><a href="#tab3" data-toggle="tab"><i class="fa fa-truck m-r-xs"></i>Payment & Shipping</a></li>
                            <li role="presentation"><a href="#tab4" data-toggle="tab"><i class="fa fa-check m-r-xs"></i>Product Ordered</a></li>
                        </ul>
                        <div class="progress progress-sm m-t-sm">
                            <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            </div>
                        </div>
                        <!--<form id="wizardForm">-->
                        <div class="tab-content">
                            <div class="tab-pane active fade in" id="tab1">
                                <div class="row m-b-lg">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>ID</th>
                                                        <td>{{ $order->id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th> User Id </th>
                                                        <td> {{ $user->name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Product Name </th>
                                                        <td> 
                                                            @php
                                                            $id = explode(',',$order->product_id);
                                                            foreach($id as $product_id){
                                                            $productName=  \App\Http\Controllers\Admin\OrdersController::getProductName($product_id);
                                                            echo   $productName .'<br>';
                                                            }

                                                            @endphp
                                                        </td>
                                                    </tr>

                                                    <tr><th> Grand Total </th>
                                                        <td> ${{ number_format($order->sub_total,2) }} </td>
                                                    </tr>
                                                    <tr><th> Bill To </th>
                                                        <td> {{ $user->name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Ship To </th>
                                                        <td> {{ $user->name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Tracking ID </th>
                                                        <td> {{ ($order->tracking_id)? $order->tracking_id:'No Tracking Id Yet.'}} </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Status </th>


                                                <form method="post" action="{{route('order-status')}}" id="wizardForm">
                                                    @csrf
                                                    <td><input type="hidden" name="order_id" value="{{$order->id}}" />

                                                        <select class="form-control" name="Order_status" id="OrderStatus">

                                                            <option value="0" {{ ($order->status == 0)? 'selected':'' }}>AWAITING</option>
                                                            <option value="1" {{ ($order->status == 1)? 'selected':'' }}>AWAITING PROCESS</option>
                                                            <option value="2" {{ ($order->status == 2)? 'selected':'' }}>SHIPPED</option>
                                                            <option value="3" {{ ($order->status == 3)? 'selected':'' }}>DELIVERED</option>
                                                        </select>
                                                        <div  id="TrackingId" style="display:none">
                                                            <label>Tracking Id</label>
                                                            <input type="text" value="{{$order->tracking_id}}" class="form-control" name="tracking_id"  />
                                                        </div>
                                                    </td>
                                                    <td><button type="submit" class="btn btn-warning">Update Status</button></td>
                                                </form>
                                                </td>
                                                </tr>
                                                @if(Session::has('success'))
                                                <tr>
                                                    <th></th>
                                                    <th>{{Session::get('success')}}</th>
                                                </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--                                        <div class="col-md-6">
                                                                                <h3>Personal Info</h3>
                                                                                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.</p>
                                                                                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                                            </div>-->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <div class="row">
                                    <div class="col-md-3">

                                        <div class="m-t-md">

                                            <strong>Account Information</strong><br>


                                            <address>
                                                <h5><strong>{{ ucwords($address->first_name)}}</strong> <strong>{{ucwords($address->last_name)}}</strong> ,</h5><br>
                                                <a href="javascript:void(0)">{{$user->email}}</a>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="m-t-md">
                                            <strong>Shipping Address</strong><br><br>
                                            <h5><strong>{{ ucwords($address->first_name)}}</strong> <strong>{{ucwords($address->last_name)}}</strong> ,</h5><br>
                                            <address>

                                                {{ ucwords($address->address)}},<br>
                                                {{ ucwords($address->city)}} {{ ucwords($address->state)}},<br>
                                                {{ ucwords($address->country)}} {{ ucwords($address->post_code)}}
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="m-t-md">
                                            <strong>Billing Address</strong><br><br>
                                            <h5><strong>{{ ucwords($address->first_name)}}</strong> <strong>{{ucwords($address->last_name)}}</strong> ,</h5><br>
                                            <address>

                                                {{ ucwords($address->address)}},<br>
                                                {{ ucwords($address->city)}} {{ ucwords($address->state)}} ,<br>
                                                {{ ucwords($address->country)}} {{ ucwords($address->post_code)}}
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab3">
                                <div class="row">
                                    <div class="col-md-3">

                                        <div class="m-t-md">

                                            <strong>Payment Information</strong><br>
                                            <p>Payment Method:  <strong>Online Payment</strong></p><br>
                                            <p>Currency:  <strong>{{($order->currency)?$order->currency:''}}</strong></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="m-t-md">
                                            <strong>Shipping information</strong><br><br>

                                            <strong>Shipping Method:</strong> &nbsp;&nbsp;&nbsp;<p>Flat-Rate</p><br>
                                            <strong>Shipping Price:</strong> &nbsp;&nbsp;&nbsp;<p>${{number_format($order->flat_rate,2) }}</p>

                                        </div>
                                    </div>




                                </div>
                            </div>


                            <div class="tab-pane fade" id="tab4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="m-t-md">

                                            <div class="table-responsive">
                                                <table  class="table" style="width: 100%; cellspacing: 0;">
                                                    <thead>
                                                        <tr>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Customer ID</th>
                                                            <th>product Name</th>
                                                            <th>Product Price</th>
                                                            <th>Quantity</th>
                                                            <th>Sub Total</th>
                                                            <th>Bill To</th>
                                                            <th>Shipped To</th>
                                                            <th>Created At</th>

                                                        </tr>
                                                        <?php
                                                        $json = $order->product_description;
                                                        $json = json_decode($json, true);
                                                        foreach ($json as $info) {
                                                            ?>
                                                            <tr> 
                                                                <td>{{$order->id}}</td>
                                                                <td><?php echo $info['user_id'] ?></td>
                                                                <td><?php echo $info['product_name'] ?></td>
                                                                <td><?php echo '$' . number_format($info['product_price'], 2) ?></td>
                                                                <td><?php echo $info['quantity'] ?></td>
                                                                <td>$<?php echo number_format($info['sub_total'], 2) ?></td>
                                                                <td><?php echo $user->name ?></td>
                                                                <td><?php echo $user->name ?></td>
                                                                <td><?php echo $order->created_at ?></td>
                                                            </tr>

                                                        <?php } ?>




                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>shipping charges</td>
                                                            <td>{{$order->flat_rate? '$'.number_format($order->flat_rate,2):'No-shipping charges' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Taxes</td>
                                                            <td>--</td>
                                                        </tr>

                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Gift-Subscription</td>
                                                            <td>{{($order->gift_sub_total==0)?'No Gift-Subscription':'$'.number_format($order->gift_sub_total,2)}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Try-Subscription</td>
                                                            <td>{{($order->subscription_amt==0)?'No Subscription':'$'.number_format($order->subscription_amt,2)}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Sub Total</td>
                                                            <td>${{number_format($order->grand_total,2)}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><b>Grand Total</b></td>
                                                            <td><strong>${{number_format($order->grand_total,2)  }}</strong></td>
                                                        </tr>

                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Customer ID</th>
                                                            <th>product Name</th>
                                                            <th>Product Price</th>
                                                            <th>Quantity</th>
                                                            <th>Sub Total</th>
                                                            <th>Bill To</th>
                                                            <th>Shipped To</th>
                                                            <th>Created At</th>

                                                        </tr>

                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>    


                                        </div>
                                    </div>





                                </div>
                            </div>


                        </div>


                        <!--                            <div class="tab-pane fade" id="tab4">
                                                        <h3 style="margin-top:25px;">Thank You!</h3>
                                                        <div class="alert alert-success m-t-sm m-b-lg" role="alert">
                                                            Congratulations! You got the last step.
                                                        </div>
                                                    </div>-->
                        <ul class="pager wizard">
                            <li class="previous"><a href="#" class="btn btn-default">Previous</a></li>
                            <li class="next"><a href="#" class="btn btn-default">Next</a></li>
                        </ul>
                    </div>
                    <!--</form>-->
                </div>
            </div>
        </div>
    </div>
</div><!-- Row -->


<script>
    $(document).ready(function () {

        $('#OrderStatus').change(function () {
            var OrderValue = $(this).val();

            if (OrderValue == '2') {

                $('#TrackingId').css('display', 'block');
            } else {
                $('#TrackingId').css('display', 'none');
            }
        });
    });
</script>
@endsection
