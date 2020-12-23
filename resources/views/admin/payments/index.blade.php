@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="card-header">Payments</h3>
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
                                    <th>#</th>
                                    <th>User Id</th>
                                    
                                    <th>Transaction Id</th>
                                    <th>Payment Method</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $item)
                               
                                <tr>
                                    <td>{{  $item->id }}</td>
                                    <td>{{ $item->user_id }}</td>
                                   
                                    <td>{{ $item->charge_id }}</td>
                                    <td>{{ $item->charge_type }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ url('/admin/payments/' . $item->id) }}" title="View Payment"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>

                                        <!--                                        {!! Form::open([
                                                                                'method' => 'DELETE',
                                                                                'url' => ['/admin/payments', $item->id],
                                                                                'style' => 'display:inline'
                                                                                ]) !!}
                                                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                                                'type' => 'submit',
                                                                                'class' => 'btn btn-danger btn-sm',
                                                                                'title' => 'Delete Payment',
                                                                                'onclick'=>'return confirm("Confirm delete?")'
                                                                                )) !!}
                                                                                {!! Form::close() !!}-->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>User Id</th>
                                    <th>Transaction Id</th>
                                    <th>Payment Method</th>
                                    <th>Created At</th>
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
