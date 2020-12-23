@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Edit Subscription_plan #{{ $subscription_plan->id }}</h3>
</div>
    <div class="main-wrapper">
        <div class="row">
           

            <div class="col-md-9">
                <div class="panel panel-white">
                    
                    <div class="panel-body">
                        <a href="{{ url('/admin/subscription_plans') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($subscription_plan, [
                            'method' => 'PATCH',
                            'url' => ['/admin/subscription_plans', $subscription_plan->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.subscription_plans.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
