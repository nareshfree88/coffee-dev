@extends('layouts.admin')

@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">Try-Subscriptions</h3>
</div>
<div class="main-wrapper">
    <div class="row">


        <div class="col-md-12">
            <div class="panel panel-white">

                <div class="panel-body">
<!--                    <a href="{{ url('/admin/trysubscriptions/create') }}" class="btn btn-success btn-sm" title="Add New Trysubscription" style="margin-bottom: 10px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>-->


                    <div class="table-responsive">
                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User_id</th>
                                    <th>Name</th>
                                    <th>Bags</th>
                                    <th>Bag Per Months</th>
                                    <th>Bag Price</th>
                                    <th>Started_At</th>
                                    <th>End_At</th>
                                    <th>Status</th>

                                    <th>Created_at</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trysubscriptions as $item)
                                <tr>
                                    <td>{{  $item->id }}</td>
                                    <td>{{ $item->user_id  }}</td>
                                    <td>{{ ucwords($item['get_user']['name']) }}</td>

                                    <td>
                                        <?php
                                        $json = $item->bag_qty;
                                        $json = json_decode($json, true);
                                        ?>
                                        @foreach($json as $subscribe)

                                        <img src="{{$subscribe['image']}}" width="70px" style="margin-top: 7px;"/>  <strong>{{$subscribe['name']}}</strong> x <strong>{{$subscribe['qty']}}</strong> <br>
                                        @endforeach

                                    </td>
                                    <td>
                                        @foreach($json as $subscribe)

                                        <strong>{{$subscribe['months']}}</strong>  
                                        <?php break; ?>
                                        @endforeach
                                    </td>
                                    <td>Total Subscription Price<br> <strong>${{ $item->total_bag_price }}</strong></td>
                                    <td>{{ date('d-M-Y',$item->started_at)}}</td>
                                    <td>{{ date('d-M-Y',$item->ended_at)}}</td>
                                <td>
                                   @if($item->status == '1')
                                   <button class="btn btn-success">Active</button>
                                   @else
                                   <button class="btn btn-danger">Inactive</button>
                                   @endif
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ url('admin/trysubscriptions/' . $item->id) }}" title="View Trysubscription"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                    <!--<a href="{{ url('trysubscriptions/' . $item->id . '/edit') }}" title="Edit Trysubscription"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>-->
                                    <!--                                        {!! Form::open([
                                                                            'method' => 'DELETE',
                                                                            'url' => ['/admin/trysubscriptions', $item->id],
                                                                            'style' => 'display:inline'
                                                                            ]) !!}
                                                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                                            'type' => 'submit',
                                                                            'class' => 'btn btn-danger btn-sm',
                                                                            'title' => 'Delete Trysubscription',
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
                                <th>User_id</th>
                                <th>Name</th>
                                <th>Bags</th>
                                <th>Bag Per Months</th>
                                <th>Bag Price</th>
                                <th>Started_At</th>
                                <th>End_At</th>
                                <th>Status</th>
                                <th>Created_at</th>
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
