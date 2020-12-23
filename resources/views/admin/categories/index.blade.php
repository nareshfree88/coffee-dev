@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Categories</h3>
</div>
<div class="container">
    <div class="main-wrapper">


        <div class="col-md-12">
            <div class="panel panel-white">

                <div class="card-body">
                    <a href="{{ url('/admin/categories/create') }}" class="btn btn-success btn-sm" title="Add New Category" style="margin-bottom: 10px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New Categories
                    </a>


                    <div class="table-responsive">
                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>#</th><th>Category Name</th><th>Category Slug</th><th>Created_at</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $item)
                                <tr>
                                    <td>{{  $item->id }}</td>
                                    <td>{{ $item->category_name }}</td><td>{{ $item->category_slug }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ url('/admin/categories/' . $item->id) }}" title="View Category"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/admin/categories/' . $item->id . '/edit') }}" title="Edit Category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/categories', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete Category',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th><th>Category Name</th><th>Category Slug</th> <th>Created_at</th><th>Actions</th>
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
