@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="card-header">Payment# {{ $payment->id }}</h3>
</div>
<div class="main-wrapper">
    <div class="row">


        <div class="col-md-9">
            <div class="panel panel-white">

                <div class="card-body">

                    <a href="{{ url('/admin/payments') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

<!--                    {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/payments', $payment->id],
                    'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => 'Delete Payment',
                    'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}-->
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $payment->id }}</td>
                                </tr>
                                <tr>
                                    <th> User Id </th>
                                    <td> {{ $payment->user_id }} </td>
                                </tr>

                                <tr>
                                    <th> Charge Id </th>
                                    <td> {{ $payment->charge_id }} </td>
                                </tr>
                                <tr>
                                    <th> Payment Method </th>
                                    <td> {{ $payment->charge_type }} </td>
                                </tr>
                                <tr>
                                    <th> Created At </th>
                                    <td> {{ $payment->created_at }} </td>
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
