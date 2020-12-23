@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Gift-Subscriptions</h3>
</div>

<div class="main-wrapper">
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-white">

                <div class="card-body">
                    <!--                        <a href="{{ url('/admin/subscriptions/create') }}" class="btn btn-success btn-sm" title="Add New Subscription" style="margin-bottom: 10px;">
                                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                            </a>-->


                    <div class="table-responsive">
                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Bag Per Month</th>
                                    <th>month</th>
                                    <th>Subscription Code</th>
                                    <th>Status</th>
                                    <th>Claimed At</th>
                                    <th>Expire At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscriptions as $item)
                                <tr>
                                    <td>{{  $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>${{ number_format($item->price,2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->month }}</td>
                                    <td>{{ $item->subscription_code }}</td>
                                    
                                    <td>
                                     
                                        @if($item->status =='1')
                                        <button class="btn btn-warning">Active</button>
                                        @else
                                        <button class="btn btn-danger">Inactive</button>
                                        @endif
                                    
                                    </td>
                                    <td>{{ ($item->claimed_at ==null)?'No claimed yet':$item->claimed_at }}</td>
                                    <td>{{ ($item->expiring_at==null)?'--':$item->expiring_at }}</td>
                                    <td>
                                        <a href="{{ url('/admin/subscriptions/' . $item->id) }}" title="View Subscription"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <!--<a href="{{ url('/admin/subscriptions/' . $item->id . '/edit') }}" title="Edit Subscription"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>-->
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/subscriptions',$item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete Subscription',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                               <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Bag Per Month</th>
                                    <th>month</th>
                                    <th>Subscription Code</th>
                                    <th>Status</th>
                                    <th>Claimed At</th>
                                    <th>Expire At</th>
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
