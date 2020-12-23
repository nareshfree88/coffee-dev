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
                                            <th>Tracking Status</th>
                                            <th>Tracking Id</th>
                                            <td>Status</td>
                                        </tr>

                                        @foreach($orders as $order)


                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->name}}</td>
                                            <td>${{$order->price}}</td>
                                            <td>{{$order->month}}</td>
                                            <td>
                                                <?php
                                                if ($order->shipping_status == '0'):
                                                    echo 'AWAITING';
                                                elseif ($order->shipping_status == '1'):
                                                    echo 'AWAITING PROCESS';
                                                elseif ($order->shipping_status == '2'):
                                                    echo 'SHIPPED';
                                                elseif ($order->shipping_status == '3'):
                                                    echo 'DELIVERED';
                                                endif;
                                                ?>
                                            </td>
                                            <td>
                                                @if($order->tracking_id)
                                                <a href="">{{$order->tracking_id}}</a>
                                                @else
                                                <span>No-Data</span>
                                                @endif
                                            </td>
                                            <!--<td><button class="button button--tight">Status</button></td>-->
                                            <!--<td><button type="button" class="button button--tight" data-toggle="modal" data-target="#myModal">Subscription Details</button></td>-->
                                            <td> <a href="{{url('giftSubscription-history/'.$order->id)}}"><button type="button" class="button button--small">Detail</button></a></td>

                                        </tr>


                                        @endforeach

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