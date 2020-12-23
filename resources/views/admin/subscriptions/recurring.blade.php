@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Recuring Subscriptions</h3>
</div>
<div class="main-wrapper">
    <div class="row">


        <div class="col-md-12">
            <div class="panel panel-white">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Stripe ID</th>
                                    <th>Stripe Status</th>
                                    <th>Stripe Plan</th>
                                    <th>Quantity</th>
                                    <th>Trial_ends_at</th>
                                    <th>Ends_at</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscription as $item)
                                <tr>
                                    <td>{{  $item->id }}</td>
                                    <td><a href="{{url('admin/users/'.$item->user_id)}}" title="Click here">{{$item->user_id}}</a></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->stripe_id }}</td>
                                    <td>{{ $item->stripe_status }}</td>
                                    <td>{{ $item->stripe_plan }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->trial_ends_at }}</td>
                                    <td>{{ $item->ends_at }}</td>

                                    <td>
                                        <a href="{{ url('/admin/recurring/show/' . $item->id) }}" title="View Subscriper"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Stripe ID</th>
                                    <th>Stripe Status</th>
                                    <th>Stripe Plan</th>
                                    <th>Quantity</th>
                                    <th>Trial_ends_at</th>
                                    <th>Ends_at</th>
                                    <th>Created At</th>
                                </tr>
                            </tfoot>
                        </table>
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@endsection
