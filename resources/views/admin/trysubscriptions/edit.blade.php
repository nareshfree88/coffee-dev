@extends('layouts.admin')

@section('content')
    <div class="main-wrapper">
        <div class="row">
           

            <div class="col-md-12">
                <div class="panel-white">
                    <h3 class="card-header">Edit Trysubscription #{{ $trysubscription->id }}</h3>
                    <div class="panel-body">
                        <a href="{{ url('/admin/trysubscriptions') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($trysubscription, [
                            'method' => 'PATCH',
                            'url' => ['/admin/trysubscriptions', $trysubscription->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.trysubscriptions.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
