@extends('layouts.user_layouts.main')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('public/user/profile/profile.css') }}" >
<style>
    .check-icon{
        width: 47px;
        margin-bottom: 15px;
    }
    .actice-status{
        font-size:27px;
    }
</style>

<main>
    <div class="container account-setting">
        <h2 class="title-h2">Welcome To Your Account! 😊</h2>
        <div class="row">
           
            @include('partials.profile-sidebar')
            <?php $i=0; ?>
            @foreach($SubscriptionStatus as $retrive)

         
           
            <div class="col-sm-9 ">
                <div class="content-account" style="margin-bottom: 4px;">
                    <h3 class="content-title">Manage My Subscription</h3>

                    @if($retrive != '')
                    <center>
                        <span><img src="{{asset('public/user/assets/images/check.png')}}" class="check-icon" /> &nbsp;&nbsp;&nbsp;&nbsp; <span class="actice-status"><b>Active Subscription</b></span></span><h6>You're subscribed</h6></br>
                    </center>
                    <!--<a class="btn btn-primary round-new" style="background-color: green;" href="javascript:void(0)">Subscribed</a>-->

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Plan</th>
                                    <th scope="col"></th>
                                    <th scope="col">1 Month Pack</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col"><b>Start Date</b></td>
                                    <td></td>
                                    <td scope="col"><b>{{date('d-M-Y',$retrive->started_at)}}</b></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td scope="col"><b>End Date</b></td>
                                    <td></td>
                                    <td scope="col"><b>{{date('d-M-Y',$retrive->ended_at)}}</b></td>
                                </tr>
                                <tr>

                                    <td scope="col"><b>Account</b></td>
                                    <td></td>
                                    <td scope="col"><b>{{$user->email}}</b></td>
                                </tr>
                                <tr>

                                    <td scope="col"><b>Subscription ID</b></td>
                                    <td></td>
                                    <td scope="col"><b>{{($retrive == null)?'':$retrive->subscription_id}}</b></td>
                                </tr>
                                <tr>

                                    <td scope="col"><b>Total</b></td>
                                    <td></td>
                                    <td scope="col"><b>${{$retrive->total_bag_price}}</b></td>
                                </tr>
                                <tr>

                                    <td scope="col"><b>Shipping status</b></td>
                                    <td></td>
                                    <td scope="col">
                                        <b>
                                            <?php 
                                            if($retrive->shipping_status == '0'):
                                                echo 'AWAITING';
                                            elseif($retrive->shipping_status == '1'):
                                                echo 'AWAITING PROCESS';
                                            elseif($retrive->shipping_status == '2'):
                                                echo 'SHIPPED';
                                            elseif($retrive->shipping_status == '3'):
                                                echo 'DELIVERED';
                                            endif;
                                            ?>
                                          
                                        </b></td>
                                </tr>
                                <tr>

                                    <td scope="col"><b>Tracking ID</b></td>
                                    <td></td>
                                    <td scope="col"><b>{{($retrive->tracking_id)? $retrive->tracking_id: 'No Yet' }}</b></td>
                                </tr>
                                <tr>

                                    <td scope="col"><b>product Details</b></td>
                                    <td></td>
                                    <td scope="col">
                                          
                                        @foreach(json_decode($retrive->bag_qty,true) as $key => $product)
                                        
                                        <b>{{($key == 'grind')?'Coffee Type '. ucwords($product['name']):$product['name']}}</b><hr><br>
                                       
                                      
                                        @endforeach
                                      
                                        </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>


                    <a class="btn btn-primary round-new" style="background-color: red; " href="{{route('subscription-cancel')}}?_token={{csrf_token()}} && sub_id={{$retrive->subscription_id}}">Cancel Subscription</a>
                    @elseif($data!=null)
                    <a class="btn btn-primary round-new" style="{{(date("Y-m-d",$data->ended_at) == date("Y-m-d") )? '':'display:none'}}" href="{{url('subscribe')}}">Subscribe Now</a>
                    <img src="{{asset('public/user/images/forbidden.png')}}" class="check-icon" />       <a style="background-color:blue; {{(date("Y-m-d",$data->ended_at) == date("Y-m-d") )? 'display:none;':''}}" class="btn btn-primary round-new "  href="javascript:void(0)">Subscription Will be End At {{($data->ended_at)?date("Y-m-d", $data->ended_at):''}}</a>


                    @elseif($retrive == '')
                    <a class="btn btn-primary round-new"  href="{{url('subscribe')}}">Subscribe Now</a>
                    @endif


                </div>
            </div>
            <div class="col-sm-3"></div>
    
      
        @endforeach
    </div>


    </div>
</main>


@endsection