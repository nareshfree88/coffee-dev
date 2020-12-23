@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Edit Email-Content #{{ $emailcontent->id }}</h3>
</div>
    <div class="main-wrapper">
        <div class="row">
         

            <div class="col-md-9">
                <div class="panel panel-white">
                
                    <div class="card-body">
                        <a href="{{ url('/admin/email-content') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($emailcontent, [
                            'method' => 'PATCH',
                            'url' => ['/admin/email-content', $emailcontent->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.email-content.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
