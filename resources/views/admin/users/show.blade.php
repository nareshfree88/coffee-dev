@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Customers# {{$user->id}}</h3>
</div>
<div class="main-wrapper">
    <div class="row">


        <div class="col-md-6">
            <div class="panel panel-white">

                <div class="card-body">

                    <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::open([
                    'method' => 'DELETE',
                    'url' => ['/admin/users', $user->id],
                    'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => 'Delete User',
                    'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">

                            <tbody>
                                <tr>
                                    <th>ID.</th><td>{{ $user->id }}</td> 
                                </tr>
                                <tr>
                                    <th>Name</th><td> {{ $user->name }} </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td> {{ $user->email }} </td>
                                </tr>
                                <tr>
                                    <th>Address Details</th>
                                    <td>
                                       <a href="{{ url('/admin/addresses/' . $user->id . '') }}" title="Add Address"><button class="btn btn-info btn-sm"><i class="fa fa-home" aria-hidden="true"></i></button></a> 
                                    </td>
                                    
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
