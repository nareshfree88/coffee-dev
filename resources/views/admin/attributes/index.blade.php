@extends('layouts.admin')

@section('content')
    <div class="main-wrapper">
        <div class="row">
          

            <div class="col-md-12">
                <div class="panel panel-white">
                    <h3 class="card-header">Attributes</h3>
                    <div class="card-body">
                        <a href="{{ url('/admin/attributes/create') }}" class="btn btn-success btn-sm" title="Add New Attribute" style="margin-bottom: 5px;">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Attribute
                        </a>

                        <div class="table-responsive">
                             <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Required</th>
                                        <th>Unique</th>
                                        <th>Locale Based</th>
                                        <th>Channel Based</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($attributes as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->required }}</td>
                                        <td>{{ $item->unique }}</td>
                                        <td>{{ $item->locale_based }}</td>
                                        <td>{{ $item->channel_based }}</td>
                                        <td>
                                            <a href="{{ url('/admin/attributes/' . $item->id) }}" title="View Attribute"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/attributes/' . $item->id . '/edit') }}" title="Edit Attribute"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/attributes', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Attribute',
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
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Required</th>
                                        <th>Unique</th>
                                        <th>Locale Based</th>
                                        <th>Channel Based</th>
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
