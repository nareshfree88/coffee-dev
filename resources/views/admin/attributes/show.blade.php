@extends('layouts.admin')

@section('content')
    <div class="main-wrapper">
        <div class="row">
           

            <div class="col-md-9">
                <div class="panel panel-white">
                    <h3 class="card-header">Attribute {{ $attribute->id }}</h3>
                    <div class="card-body">

                        <a href="{{ url('/admin/attributes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/attributes/' . $attribute->id . '/edit') }}" title="Edit Attribute"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/attributes', $attribute->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Attribute',
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
                                        <td>{{ $attribute->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Code </th>
                                        <td> {{ $attribute->code }} </td>
                                    </tr>
                                    <tr><th> Name </th>
                                        <td> {{ $attribute->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Type </th>
                                        <td> {{ $attribute->type }} </td>
                                    </tr>
                                    
                                    <tr>
                                        <th> Required </th>
                                        <td> {{ $attribute->required }} </td>
                                    </tr>
                                    
                                    <tr>
                                        <th> Unique </th>
                                        <td> {{ $attribute->unique }} </td>
                                    </tr>
                                    <tr>
                                        <th> Locale Based </th>
                                        <td> {{ $attribute->locale_based }} </td>
                                    </tr>
                                    <tr>
                                        <th> Channel Based </th>
                                        <td> {{ $attribute->channel_based }} </td>
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
