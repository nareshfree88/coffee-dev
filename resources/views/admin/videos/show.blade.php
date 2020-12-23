@extends('layouts.admin')

@section('content')
<div class="main-wrapper">
    <div class="row">


        <div class="col-md-9">
            <div class="panel panel-white">
                <div class="card-header">Video #{{ $video->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/videos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/videos/' . $video->id . '/edit') }}" title="Edit Video"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/videos', $video->id],
                    'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => 'Delete Video',
                    'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $video->id }}</td>
                                </tr>
                                <tr><th> Video </th>

                            <video width="400" controls>
                                <source src="{{asset('public/uploads/videos/'.$video->video)}}" type="video/mp4">
                                <source src="mov_bbb.ogg" type="video/ogg">
                                Your browser does not support HTML video.
                            </video>


                            <td> {{ $video->video }} </td>
                            </tr>
                            <tr><th> Created_at </th><td> {{ $video->created_at }} </td></tr>
                            <tr><th> Updated_at </th><td> {{ $video->updated_at }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
