@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Customers</h3>
</div>
<div id="main-wrapper">

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading">
<!--                    <a href="{{ url('/admin/users/create') }}" class="btn btn-success btn-sm" title="Add New User" style="margin-bottom: 5px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add Customer
                    </a>-->

                </div>
                <div class="panel-body">
                   
                   
                    <div class="table-responsive">
                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created_at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ url('/admin/users', $item->id) }}">{{ $item->name }}  {{$item->lname}}</a></td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->created_at }}</td>
                                      
                                        <td>
                                            <a href="{{ url('/admin/users/' . $item->id) }}" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/users/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/users', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete User',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            <a href="{{ url('/admin/addresses/' . $item->id . '') }}" title="Add Address"><button class="btn btn-warning btn-sm"><i class="fa fa-home" aria-hidden="true"></i></button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
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
    <!-- Row -->
    <!-- Row -->
    <!-- Row -->
    <!-- Row -->
</div> 
@endsection
