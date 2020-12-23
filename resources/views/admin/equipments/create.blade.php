@extends('layouts.admin')

@section('content')
    <div class="main-wrapper">
        <div class="row">
           
            <div class="col-md-12">
                <div class="panel panel-white">
                    <h3 class="card-header">Create New Equipment</h3>
                    <div class="panel-body">
                        <a href="{{ url('/admin/equipments') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                      

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/equipments', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.equipments.form', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
