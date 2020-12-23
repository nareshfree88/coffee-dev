@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Invitation List</h3>
   
</div>
    <div class="main-wrapper">
        <div class="row">
            
            <div class="col-md-12">
                <div class="panel panel-white">
                   
                    <div class="card-body">
                        <a href="{{ url('/admin/invites/create') }}" class="btn btn-success btn-sm" title="Add New Invite" style="margin-bottom: 10px;">
                            <i class="fa fa-plus" aria-hidden="true"></i> Send Invitation
                        </a>
                        <div class="table-responsive">
                            <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Email</th><th>Message</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($invites as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->email }}</td><td>{{ $item->message }}</td>
                                        <td>
                                            <a href="{{ url('/admin/invites/' . $item->id) }}" title="View Invite"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <!--<a href="{{ url('/admin/invites/' . $item->id . '/edit') }}" title="Edit Invite"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>-->
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/invites', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Invite',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Email</th><th>Message</th><th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="pagination-wrapper"> {!! $invites->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
