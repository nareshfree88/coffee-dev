@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Create New Category</h3>
</div>
<div class="container">
    <div class="main-wrapper">


        <div class="col-md-6">
            <div class="panel panel-white">
                
                <div class="panel-body">
                    <a href="{{ url('/admin/categories') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />
                    <div class="col-md-12">
                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/categories', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.categories.form', ['formMode' => 'create'])

                        {!! Form::close() !!}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
