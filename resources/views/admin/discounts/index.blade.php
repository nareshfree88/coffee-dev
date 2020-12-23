@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Discounts</h3>
</div>
<div class="main-wrapper">
    <div class="row">


        <div class="col-md-12">
            <div class="panel panel-white">

                <div class="card-body">
                    <a href="{{ url('/admin/discounts/create') }}" class="btn btn-success btn-sm" title="Add New Discount" style="margin-bottom: 10px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add Discount
                    </a>


                    <div class="table-responsive">
                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>ID</th><th>Coupan Code</th><th>Discount Percentage</th><th>Status</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($discounts as $item)
                                <tr>
                                    <td>{{  $item->id }}</td>
                                    <td>{{ $item->coupan_code }}</td>
                                    <td>{{ $item->discount_percentage }}</td>
                                    <td>
                                        @if($item->status==0)
                                        <button class="btn btn-danger discount" data-status="1" data-id="{{$item->id}}">Inactive</button>
                                        @else
                                        <button class="btn btn-success discount" data-status="0" data-id="{{$item->id}}">Active</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/discounts/' . $item->id) }}" title="View Discount"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/admin/discounts/' . $item->id . '/edit') }}" title="Edit Discount"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/discounts', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete Discount',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th><th>Coupan Code</th><th>Discount Percentage</th><th>Status</th><th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="pagination-wrapper"> {!! $discounts->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
   $(document).ready(function(){
  $(".discount").click(function(){
   var discountId = $(this).attr('data-id');
   var status = $(this).attr('data-status');
   $.ajax({
       url:"{{route('active.discount')}}",
       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
       type:'post',
       data:{discountId:discountId,status:status},
       success:function(res){
          location.reload();
       },
       error:function(res){
          
       }
   });
  });
});
</script>

@endsection
