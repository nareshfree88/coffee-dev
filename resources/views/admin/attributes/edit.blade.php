@extends('layouts.admin')

@section('content')
    <div class="main-wrapper">
        <div class="row">
          

            <div class="col-md-9">
                <div class="panel panel-white">
                    <h3 class="card-header">Edit Attribute #{{ $attribute->id }}</h3>
                    <div class="card-body">
                        <a href="{{ url('/admin/attributes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($attribute, [
                            'method' => 'PATCH',
                            'url' => ['/admin/attributes', $attribute->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.attributes.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
