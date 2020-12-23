@extends('layouts.admin')

@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">Email-Content #{{ $emailcontent->id }}</h3>
</div>



    <div class="main-wrapper">
        <div class="row">
        

            <div class="col-md-9">
                <div class="panel panel-white">
                  
                    <div class="card-body">

                        <a href="{{ url('/admin/email-content') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/email-content/' . $emailcontent->id . '/edit') }}" title="Edit EmailContent"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/emailcontent', $emailcontent->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete EmailContent',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $emailcontent->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Status </th>
                                        <td> {{ $emailcontent->status }} </td>
                                    </tr>
                                    
                                    <tr>
                                        <th> Subject </th>
                                        <td> {{ $emailcontent->subject }} </td>
                                    </tr>
                                    
                                    <tr>
                                        <th> Content </th>
                                        <td> {{ $emailcontent->content }} </td>
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
