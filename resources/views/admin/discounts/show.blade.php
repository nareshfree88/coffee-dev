@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Discount# {{ $discount->id }}</h3>
</div>
    <div class="main-wrapper">
        <div class="row">
           

            <div class="col-md-9">
                <div class="panel panel-white">
                   
                    <div class="card-body">

                        <a href="{{ url('/admin/discounts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/discounts/' . $discount->id . '/edit') }}" title="Edit Discount"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/discounts', $discount->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Discount',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $discount->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Coupan Code </th>
                                        <td> {{ $discount->coupan_code }} </td>
                                    </tr>
                                    <tr>
                                        <th> Discount Percentage </th>
                                        <td> {{ $discount->discount_percentage }} </td>
                                    </tr>
                                    <tr>
                                        <th> Status </th>
                                        <td> 
                                             @if($discount->status==0)
                                            <button class="btn btn-danger">Inactive</button>
                                            @else
                                            <button class="btn btn-success">Active</button>
                                            @endif
                                        </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
