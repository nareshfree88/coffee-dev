@extends('layouts.admin')

@section('content')
<div class="page-title">
    <h3 class="breadcrumb-header">Create New Product</h3>
</div>
<div class="main-wrapper">
    <div class="row">


        <div class="col-md-12">
            <div class="panel panel-white">
               
                <div class="card-body">
                    <a href="{{ url('/admin/products') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />


                    <div id="rootwizard">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-user m-r-xs"></i>Products Detail </a></li>
                            <li role="presentation"><a href="#tab2" data-toggle="tab"><i class="fa fa-truck m-r-xs"></i>Description</a></li>
                            <li role="presentation"><a href="#tab3" data-toggle="tab"><i class="fa fa-truck m-r-xs"></i>Price</a></li>
                            <li role="presentation"><a href="#tab4" data-toggle="tab"><i class="fa fa-check m-r-xs"></i>Product Weight</a></li>
                            <li role="presentation"><a href="#tab5" data-toggle="tab"><i class="fa fa-check m-r-xs"></i>Product Image</a></li>

<!--<li role="presentation"><a href="#tab6" data-toggle="tab"><i class="fa fa-check m-r-xs"></i>Linked Products</a></li>-->
                            <li role="presentation"><a href="#tab7" data-toggle="tab"><i class="fa fa-check m-r-xs"></i>complete</a></li>
                        </ul>
                        <div class="progress progress-sm m-t-sm">
                            <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            </div>
                        </div>
                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/products','id'=>'wizardForm' , 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.products.form', ['formMode' => 'create'])

                        {!! Form::close() !!}
                    </div>






                </div>
            </div>
        </div>
    </div>
</div>



@endsection
