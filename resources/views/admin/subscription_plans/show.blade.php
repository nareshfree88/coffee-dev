@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Subscription Plan# {{ $subscription_plan->id }}</h3>
</div>
    <div class="main-wrapper">
        <div class="row">
          

            <div class="col-md-9">
                <div class="panel panel-white">
                    
                    <div class="panel-body">

                        <a href="{{ url('/admin/subscription_plans') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/subscription_plans/' . $subscription_plan->id . '/edit') }}" title="Edit Subscription_plan"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/subscription_plans', $subscription_plan->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Subscription_plan',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $subscription_plan->id }}</td>
                                    </tr>
                                    <tr><th> Plan Name </th><td> {{ $subscription_plan->plan_name }} </td></tr><tr><th> Price </th><td> {{ $subscription_plan->price }} </td></tr><tr><th> Currency </th><td> {{ $subscription_plan->currency }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
