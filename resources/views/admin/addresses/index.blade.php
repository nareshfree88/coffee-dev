
@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Address</h3>
</div>
<div id="main-wrapper">

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <a href="{{ url('admin/users') }}" class="btn btn-warning btn-sm" title="Back" style="margin-bottom: 5px;">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                    </a>
                    <a href="{{ url('/admin/addresses/create/'.$user_addr ) }}" class="btn btn-success btn-sm" title="Add New User" style="margin-bottom: 5px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New Address
                    </a>
                    
                    

                </div>
                <div class="panel-body">


                    <div class="table-responsive">
                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                               
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Post Code</th>
                                    <th>Default Address</th>
                                    <th>Actions</th>
                                </tr>
                               
                            </thead>

                            <tbody>
                                @foreach($addresses as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->city }}</td>
                                    <td>{{ $item->state }}</td>
                                    <td>{{ $item->country }}</td>
                                    <td>{{ $item->post_code }}</td>
                                    <td>{{ $item->default_address }}</td>
                                    <td>
                                        <a href="{{ url('/admin/addresses/show/' . $item->id.'/'.$user_addr) }}" title="View Address"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/admin/addresses/' . $item->id . '/edit/'.$user_addr) }}" title="Edit Address"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/addresses/delete', $item->id,$user_addr],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete Address',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Post Code</th>
                                    <th>Default Address</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>  

    </div>
    <!-- Row -->
    <!-- Row -->
    <!-- Row -->
    <!-- Row -->
</div>
@endsection
