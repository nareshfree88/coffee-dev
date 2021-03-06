@extends('layouts.user_layouts.main')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('public/user/profile/profile.css') }}" >

<main>
    <div class="container account-setting">
        <h2 class="title-h2">Welcome to your account! 😊</h2>

        <div class="row">
            @include('partials.profile-sidebar')
            <div class="col-sm-8">
                <div class="content-account">

                    <div class="col col--8of12 col--tablet_portrait--12of12">
                        <div><div class="padded white_back normal_bottom relative">
                                <div class="grid grid--spaced grid--middle normal_bottom">
                                    <center><h3 class="h3--alt"><strong>Order History</strong></h3></center>
                                    <!--<div><button type="button" class="button button--small" style="margin-bottom: 14px;">+ Add new Address</button></div>-->
                                </div>
                                <table class="table--small_on_phone">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Total Subscription Months</th>
                                            <th>Tracking Id</th>
                                            <th>Status</th>
                                        </tr>
                                        @if(count($orders) > 0)
                                        @foreach($orders as $order)


                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$Details->name}}</td>
                                            <td>${{$Details->price}}</td>
                                            <td>{{$order->month}}-Month</td>
                                            <td>
                                                <?php
                                                if ($order->status == '0'):
                                                    echo 'AWAITING';
                                                elseif ($order->status == '1'):
                                                    echo 'AWAITING PROCESS';
                                                elseif ($order->status == '2'):
                                                    echo 'SHIPPED';
                                                elseif ($order->status == '3'):
                                                    echo 'DELIVERED';
                                                endif;
                                                ?>
                                            </td>
                                            <td><a href="javascript:void(0)">{{($order->tracking_id)?$order->tracking_id :'AWAITING'}}</a></td>
                                        </tr>

                                        @endforeach
@else
                                    <td></td>
                                    
                                    <td></td>
                                    <center><th colspan="2">No-Data</th></center>
                                    <td></td>
                                    <td></td>
@endif
                                        <tr>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</main>


@endsection