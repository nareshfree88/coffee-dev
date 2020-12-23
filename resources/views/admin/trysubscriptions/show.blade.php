@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Trysubscription#  {{ $trysubscription->id }}</h3>
</div>
<div class="main-wrapper">
    <div class="row">


        <div class="col-md-12">
            <div class="panel panel-white">

                <div class="panel-body">

                    <a href="{{ url('admin/trysubscriptions') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <!--<a href="{{ url('admin/trysubscriptions/' . $trysubscription->id . '/edit') }}" title="Edit Trysubscription"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>-->
                    <!--                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['trysubscriptions', $trysubscription->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete Trysubscription',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                        ))!!}
                                        {!! Form::close() !!}-->
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $trysubscription->id }}</td>
                                </tr>
                                <tr>
                                    <th> Name </th>
                                    <td> {{ $trysubscription->user_id }} </td>
                                </tr>
                                <tr>
                                    <th> Bag Qty </th>
                                    <td>
                                        <?php
                                        $json = $trysubscription->bag_qty;
                                        $json = json_decode($json, true);
                                        ?>
                                        @foreach($json as $subscribe)
                                        <img src="{{$subscribe['image']}}" width="70px" style="margin-top: 7px;"/>  <strong>{{$subscribe['name']}}</strong> x {{$subscribe['qty']}}<br>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bag Per Month </th>
                                    <td> 
                                        @foreach($json as $subscribe)
                                        <strong> {{$subscribe['months']}}</strong><br>
                                        <?php break; ?>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Bag Price </th>
                                    <td><strong>${{ $trysubscription->total_bag_price }} </strong></td>
                                </tr>

                                <tr>
                                    <th>Address</th>
                                    <td> <address>{{$trysubscription->address}}</address>
                                        <address>{{strtoupper($trysubscription->city)}}, {{strtoupper($trysubscription->state)}}</address>
                                        <address>{{strtoupper($trysubscription->country)}}, {{$trysubscription->post_code}}</address>

                                    </td>
                                </tr>
                                <tr>
                                    <th>Start Date</th>
                                    <td>{{ date('d-M-Y',$trysubscription->started_at)}}</td>
                                </tr>
                                <tr>
                                    <th>End Date</th>
                                    <td>{{date('d-M-Y',$trysubscription->ended_at)}}</td>
                                </tr>


                                <tr>
                                    <th>Tracking ID </th>
                                    <td><strong>{{ ($trysubscription->tracking_id)?  $trysubscription->tracking_id:'Nothing To Track' }} </strong></td>
                                </tr>

                                @if($trysubscription->status == '1')
                                <tr>
                                    <td>
                                        <form method="post" action="{{route('try-subscription')}}">
                                            @csrf
                                            <input type="hidden" name="trySubscription_id" value="{{$trysubscription->id}}" />

                                            <select class="form-control" name="Order_status" id="OrderStatus">

                                                <option value="0" {{ ($trysubscription->shipping_status == 0)? 'selected':'' }}>AWAITING</option>
                                                <option value="1" {{ ($trysubscription->shipping_status == 1)? 'selected':'' }}>AWAITING PROCESS</option>
                                                <option value="2" {{ ($trysubscription->shipping_status == 2)? 'selected':'' }}>SHIPPED</option>
                                                <option value="3" {{ ($trysubscription->shipping_status == 3)? 'selected':'' }}>DELIVERED</option>
                                            </select>
                                            <div  id="TrackingId" style="display:none">
                                                <label>Tracking Id</label>
                                                <input type="text" value="{{$trysubscription->tracking_id}}" class="form-control" name="tracking_id" style="background-color: beige;"  />
                                            </div>

                                            <td><button type="submit" class="btn btn-warning">Update Status</button></td>
                                        </form>
                                    </td>
                                    @if(Session::has('success'))
                                <tr>
                                    <th></th>
                                    <th>{{Session::get('success')}}</th>
                                </tr>
                                @endif
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('#OrderStatus').change(function () {
            var OrderValue = $(this).val();

            if (OrderValue == '2') {

                $('#TrackingId').css('display', 'block');
            } else {
                $('#TrackingId').css('display', 'none');
            }
        });
    });
</script>
@endsection
