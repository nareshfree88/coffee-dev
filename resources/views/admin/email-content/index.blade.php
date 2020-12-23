@extends('layouts.admin')

@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">Email-Content </h3>
</div>

<div class="main-wrapper">
    <div class="row">


        <div class="col-md-12">
            <div class="panel panel-white">

                <div class="card-body">
                    <a href="{{ url('/admin/email-content/create') }}" class="btn btn-success btn-sm" title="Add New EmailContent" style="margin-bottom: 10px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>


                    <div class="table-responsive">
                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Subject</th>
                                    <th>Content</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($emailcontent as $item)
                                <tr>
                                    <td>{{$item->id }}</td>
                                    <td>
                                        <?php
                                        if ($item->status == '0'):
                                            echo 'AWAITING';
                                        elseif ($item->status == '1'):
                                            echo 'AWAITING PROCESS';
                                        elseif ($item->status == '2'):
                                            echo 'SHIPPED';
                                        elseif ($item->status == '3'):
                                            echo 'DELIVERED';
                                        endif;
                                        ?>
                                    </td>
                                    <td>{{ $item->subject}}</td>

                                    <td>{{ $item->content }}</td>
                                    <td>
                                        <a href="{{ url('/admin/email-content/' . $item->id) }}" title="View EmailContent"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/admin/email-content/' . $item->id . '/edit') }}" title="Edit EmailContent"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/email-content', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete EmailContent',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Subject</th>
                                    <th>Content</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
