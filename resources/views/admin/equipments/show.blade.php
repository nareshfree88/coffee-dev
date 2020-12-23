@extends('layouts.admin')

@section('content')
    <div class="main-wrapper">
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel panel-white">
                    <h3 class="card-header">Equipment {{ $equipment->id }}</h3>
                    <div class="panel-body">

                        <a href="{{ url('/admin/equipments') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/equipments/' . $equipment->id . '/edit') }}" title="Edit Equipment"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/equipments', $equipment->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Equipment',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $equipment->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Equipment Name </th>
                                        <td> {{ $equipment->equipment_name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Price </th>
                                        <td> {{ $equipment->price }} </td>
                                    </tr>
                                    <tr>
                                        <th> Color </th>
                                        <td> {{ $equipment->color }} </td>
                                    </tr>
                                    <tr>
                                        <th> Image </th>
                                        <td><img src="{{asset('uploads/equipments/'.$equipment->image)}}" width="300px" height="300px"/></td>
                                    </tr>
                                    <tr>
                                        <th> Description </th>
                                        <td> {{ $equipment->description }} </td>
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
