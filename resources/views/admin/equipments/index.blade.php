@extends('layouts.admin')

@section('content')
<div class="main-wrapper">
    <div class="row">


        <div class="col-md-12">
            <div class="panel panel-white">
                <h3 class="card-header">Equipments</h3>
                <div class="panel-body">
                    <a href="{{ url('/admin/equipments/create') }}" class="btn btn-success btn-sm" title="Add New Equipment" style="margin-bottom: 10px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>


                    <div class="table-responsive">
                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Equipment Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Color</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($equipments as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->equipment_name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->color }}</td>
                                    <td><img src="{{asset('uploads/equipments/'.$item->image)}}" width="50px" height="50px"/></td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        <a href="{{ url('/admin/equipments/' . $item->id) }}" title="View Equipment"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/admin/equipments/' . $item->id . '/edit') }}" title="Edit Equipment"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/equipments', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete Equipment',
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
                                    <th>Equipment Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Color</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
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
