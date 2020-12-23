@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Dashboard</h3>
</div>
<div id="main-wrapper">

    <div class="row">

        <div class="col-lg-3 col-md-6" >
            <div class="panel panel-white stats-widget">
                <a href="{{url('admin/trysubscriptions')}}">
                    <div class="panel-body">
                        <div class="pull-left">
                            <span class="stats-number">{{$trySubscription}}</span>
                            <p class="stats-info">Subscription</p>
                        </div>
                        <div class="pull-right">
                            <i class="icon-list stats-icon" style="color: #61d38b;"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>


        <div class="col-lg-3 col-md-6">
            <div class="panel panel-white stats-widget">
                <a href="{{url('admin/subscriptions')}}">
                    <div class="panel-body">
                        <div class="pull-left">
                            <span class="stats-number">{{$subscriptions}}</span>
                            <p class="stats-info">Gift-Subscription</p>
                        </div>
                        <div class="pull-right">
                            <i class="icon-gift stats-icon" style="color: #61d38b;"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-white stats-widget">
                <a href="{{url('admin/users')}}">
                    <div class="panel-body">
                        <div class="pull-left">
                            <span class="stats-number">{{$user}}</span>
                            <p class="stats-info">Customers</p>
                        </div>
                        <div class="pull-right">
                            <i class="icon-user stats-icon" style="color: #61d38b;"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-white stats-widget">
                <a href="{{url('admin/products')}}">
                    <div class="panel-body">
                        <div class="pull-left">
                            <span class="stats-number">{{$products}}</span>
                            <p class="stats-info">Products</p>
                        </div>
                        <div class="pull-right">
                            <i class="icon-shop stats-icon" style="color: #61d38b;"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-white stats-widget">
                <a href="{{url('admin/orders')}}">
                    <div class="panel-body">
                        <div class="pull-left">
                            <span class="stats-number">{{$orders}}</span>
                            <p class="stats-info">Orders</p>
                        </div>
                        <div class="pull-right">
                            <i class="icon-cart stats-icon" style="color: #61d38b;"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- Row -->
    <!-- Row -->
    <!-- Row -->
</div>
@endsection
