@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Videos</h3>
</div>
<div class="main-wrapper">
    <div class="row">


        <div class="col-md-12">
            <div class="panel panel-white">

                <div class="card-body">
                    <a href="{{ url('/admin/videos/create') }}" class="btn btn-success btn-sm" title="Add New Video" style="margin-bottom: 10px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>


                    <div class="table-responsive">
                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Video</th>
                                    <th>Created_at</th>
                                    <th>Update_at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($videos as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <?php if ($item->video) { ?>
                                            <a href="{{ url('/admin/videos/' . $item->id) }}" title="View Video">
                                                <img src="{{asset('public/uploads/play.png')}}" width="50px" height="50px"/></a>
                                        <?php } ?>
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('/admin/videos/' . $item->id) }}" title="View Video"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/admin/videos/' . $item->id . '/edit') }}" title="Edit Video"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/videos', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete Video',
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
                                    <th>Video</th>
                                    <th>Created_at</th>
                                    <th>Update_at</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="pagination-wrapper"> {!! $videos->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
