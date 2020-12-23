@extends('layouts.admin')

@section('content')
    <div class="main-wrapper">
        <div class="row">
           

            <div class="col-md-9">
                <div class="panel panel-white">
                    <h3 class="card-header">Address {{ $address->id }}</h3>
                    <div class="card-body">

                        <a href="{{ url('/admin/addresses/'.$user_addr) }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/addresses/' . $address->id . '/edit/'.$user_addr) }}" title="Edit Address"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',  
                            'url' => ['admin/addresses/delete', $address->id,$user_addr],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Address',
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
                                        <td>{{ $address->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Address </th>
                                        <td> {{ $address->address }} </td>
                                    </tr>
                                    <tr>
                                        <th> City </th><td> {{ $address->city }} </td>
                                    </tr>
                                    <tr>
                                        <th> State </th>
                                        <td> {{ $address->state }} </td>
                                    </tr>
                                    <tr>
                                        <th> Country </th>
                                        <td> {{ $address->country }} </td>
                                    </tr>
                                    <tr>
                                        <th> Post Code </th>
                                        <td> {{ $address->post_code }} </td>
                                    </tr>
                                    <tr>
                                        <th> Default Adress </th>
                                        <td> {{ $address->default_address }} </td>
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
