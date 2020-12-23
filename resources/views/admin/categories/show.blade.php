@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Category# {{ $category->id }}</h3>
</div>
<div class="container">
    <div class="main-wrapper">


        <div class="col-md-6">
            <div class="panel panel-white">

                <div class="card-body">

                    <a href="{{ url('/admin/categories') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/categories/' . $category->id . '/edit') }}" title="Edit Category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/categories', $category->id],
                    'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => 'Delete Category',
                    'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $category->id }}</td>
                                </tr>
                                <tr>
                                    <th> Category Name </th>
                                    <td> {{ $category->category_name }} </td>
                                </tr>
                                <tr>
                                    <th> Category Slug </th>
                                    <td> {{ $category->category_slug }} </td>
                                </tr>
                                <tr>
                                    <th> Created At </th>
                                    <td> {{ $category->created_at }} </td>
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
