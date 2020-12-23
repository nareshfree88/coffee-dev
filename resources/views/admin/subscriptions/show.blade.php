@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Gift-Subscription# {{ $subscription->id }}</h3>
</div>
<div class="main-wrapper">
    <div class="row">


        <div class="col-md-12">
            <div class="panel panel-white">

                <div class="card-body">

                    <a href="{{ url('/admin/subscriptions') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <!--<a href="{{ url('/admin/subscriptions/' . $subscription->id . '/edit') }}" title="Edit Subscription"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>-->
                    {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/subscriptions', $subscription->id],
                    'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => 'Delete Subscription',
                    'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $subscription->id }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th> Name </th>
                                    <td> {{ $subscription->name }} </td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th> Price </th>
                                    <td> ${{ number_format($subscription->price,2) }} </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th> Quantity </th>
                                    <td> {{ $subscription->quantity }} </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th> month </th>
                                    <td> {{ $subscription->month }} </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th> Subscription Code </th>
                                    <td> {{ $subscription->subscription_code }} </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th> Status </th>
                                    <td> 
                                        @if($subscription->status=='1')
                                        <button class="btn btn-warning">Active</button>
                                        @else
                                        <button class="btn btn-danger">Inactive</button>
                                        @endif
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <?php if (empty($subscription->fname || $subscription->lname)) { ?>
                                    <tr>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <th> Address </th>
                                        <td>
                                            <p>{{ucwords($subscription->fname)}} {{ucwords($subscription->lname)}}</p>
                                            <address>{{$subscription->address}},{{$subscription->city}},{{$subscription->pin_code}}<br>
                                                {{$subscription->state}}, {{$subscription->country}}
                                            </address>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th> Request Grind </th>
                                        <td> {{ $subscription->request_grind }} </td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <th>Contact No </th>
                                        <td> {{ $subscription->contact }} </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <!---------------------SHIPPING CODE------------------------>

                                    @if($subscription->status == '1')

                                    <tr>
                                        <th>Months</th>
                                        <td>{{$subscription->month}}</td>
                                        <td></td>
                                       

                                        @endif

                                        <td>

                                            <form method="post" action="{{route('gift-subscription')}}">
                                                @csrf
                                                <input type="hidden" name="gift_subscription_id" value="{{$subscription->id}}" />
                                                <tr>
                                                    <td>
                                                        <select class="form-control" name="sub_month" required="required">
                                                            <option value="">Select</option>
                                                            @for($i=1; $i<=$subscription->month; $i++)
                                                            <option value="{{$i}}" {{ ($subscription->shipping_month == $i)? 'selected':'' }} >{{$i}} Month</option>
                                                            @endfor

                                                        </select>
                                                    </td>

                                                    <td>
                                                        <select class="form-control" name="Subscription_status" id="OrderStatus" data-id="">

                                                            <option value="0" {{ ($subscription->shipping_status == 0)? 'selected':'' }}>AWAITING</option>
                                                            <option value="1" {{ ($subscription->shipping_status == 1)? 'selected':'' }}>AWAITING PROCESS</option>
                                                            <option value="2" {{ ($subscription->shipping_status == 2)? 'selected':'' }}>SHIPPED</option>
                                                            <option value="3" {{ ($subscription->shipping_status == 3)? 'selected':'' }}>DELIVERED</option>
                                                        </select>
                                                        <div  id="TrackingId" style="display:none">
                                                            <label>Tracking Id</label>
                                                            <input type="text" value="{{$subscription->tracking_id}}" class="form-control" name="tracking_id"  data-id="" style="background-color: beige;" />
                                                        </div> 
                                                    </td>
                                                    <td><button type="submit" class="btn btn-warning">Update Status</button></td>
                                                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Subscription Details</button></td>

                                                    @if(Session::has('message'))
                                                    <td>
                                                        <div class="alert alert-success" role="alert">
                                                            {{Session::get('message')}}
                                                        </div>
                                                    </td>
                                                </tr>



                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                    <!---------------------END SHIPPING CODE-------------------->


                                    <tr>

                                        <th>Claimed At </th>
                                        <td> {{ $subscription->claimed_at }} </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Expire At </th>
                                        <td> {{ $subscription->expiring_at }}</td>
                                         <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Days left</th>
                                        <td>
                                            @php
                                            $datetime1 = new DateTime(date("Y-m-d h:m:s"));
                                            $datetime2 = new DateTime($subscription->expiring_at);
                                            $interval = $datetime1->diff($datetime2);
                                            echo $interval->format('%m months %d days');
                                            @endphp
                                        </td>
                                         <td></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>





                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------------------------Bootstrap Model-------------------------------->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Months Details</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Month</th>
                            <th>Status</th>
                            <th>Tracking Id</th>
                        </tr>
                        @foreach($trackerId as $track)

                        <tr>
                            <td>{{($track['month'])? $track['month'].'-Month':'Not Shipped Yet'}}</td>
                            <td><?php
                                if ($track->status == '0'):
                                    echo 'AWAITING';
                                elseif ($track->status == '1'):
                                    echo 'AWAITING PROCESS';
                                elseif ($track->status == '2'):
                                    echo 'SHIPPED';
                                elseif ($track->status == '3'):
                                    echo 'DELIVERED';
                                endif;
                                ?></td>
                            <td>{{ $track->tracking_id}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {

        $('select[name="Subscription_status"]').change(function () {
            var OrderValue = $(this).val();
            var track_id = $(this).attr('data-id');


            if (OrderValue == '2') {

                $('#TrackingId ').css('display', 'block');
            } else {
                $('#TrackingId').css('display', 'none');
            }
        });
    });
</script>
@endsection
