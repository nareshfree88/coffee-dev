@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="card-header">Subscription Plans</h3>
</div>
<div class="main-wrapper">
    <div class="row">


        <div class="col-md-12">
            <div class="panel panel-white">
                
                <div class="panel-body">
                    <a href="{{ url('/admin/subscription_plans/create') }}" class="btn btn-success btn-sm" title="Add New Subscription Plan" style="margin-bottom: 10px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New Plan
                    </a>

                   
                    <div class="table-responsive">
                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>#</th><th>Plan Name</th><th>Price</th><th>Currency</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscription_plans as $item)
                                <tr>
                                    <td>{{ $loop->iteration or $item->id }}</td>
                                    <td>{{ $item->plan_name }}</td><td>{{ $item->price }}</td><td>{{ $item->currency }}</td>
                                    <td>
                                        <a href="{{ url('/admin/subscription_plans/' . $item->id) }}" title="View Subscription_plan"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/admin/subscription_plans/' . $item->id . '/edit') }}" title="Edit Subscription_plan"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/subscription_plans', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete Subscription_plan',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th><th>Plan Name</th><th>Price</th><th>Currency</th><th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="pagination-wrapper"> {!! $subscription_plans->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
