@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Subscription# {{ $subscription->id }}</h3>
</div>
<div class="main-wrapper">
    <div class="row">


        <div class="col-md-9">
            <div class="panel panel-white">

                <div class="card-body">

                    <a href="{{ url('/admin/recurring') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <!--<a href="{{ url('/admin/subscriptions/' . $subscription->id . '/edit') }}" title="Edit Subscription"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>-->
                 
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $subscription->id }}</td>
                                </tr>
                                <tr>
                                    <th>User ID</th>
                                    <td><a href="{{url('admin/users/'.$subscription->user_id)}}" title="Click Me"> Click Here-{{ $subscription->user_id }}</a></td>
                                </tr>
                                <tr>
                                    <th> Name </th>
                                    <td> {{ $subscription->name }} </td>
                                </tr>
                                <tr>
                                    <th> Stripe ID </th>
                                    <td> {{ $subscription->stripe_id }} </td>
                                </tr>
                                <tr>
                                    <th> Stripe Status </th>
                                    <td> {{ $subscription->stripe_id }} </td>
                                </tr>
                                <tr>
                                    <th> Stripe Status </th>
                                    <td> {{ $subscription->stripe_plan }} </td>
                                </tr>
                                <tr>
                                    <th> Quantity </th>
                                    <td> {{ $subscription->quantity }} </td>
                                </tr>
                                <tr>
                                    <th> Trial Ends At </th>
                                    <td> {{ $subscription->trial_ends_at }} </td>
                                </tr>
                                <tr>
                                    <th> Ends At </th>
                                    <td> {{ $subscription->ends_at }} </td>
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
