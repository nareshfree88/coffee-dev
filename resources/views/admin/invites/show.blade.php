@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Invitation #{{ $invite->id }}</h3>
</div>
    <div class="main-wrapper">
        <div class="row">
           

            <div class="col-md-9">
                <div class="panel panel-white">
                   
                    <div class="card-body">

                        <a href="{{ url('/admin/invites') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <!--<a href="{{ url('/admin/invites/' . $invite->id . '/edit') }}" title="Edit Invite"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>-->
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/invites', $invite->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Invite',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $invite->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $invite->name }} </td></tr><tr><th> Email </th><td> {{ $invite->email }} </td></tr><tr><th> Message </th><td> {{ $invite->message }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
