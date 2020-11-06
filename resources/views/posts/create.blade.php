@extends('layouts.app')

@section('content')
<div class="posts-create container mt-5">

<h1>Create Post</h1>
@include('inc.messages')
{!! Form::open(['action'=>"App\Http\Controllers\PostsController@store" , 'method' => 'POST' ,'enctype'=>"multipart/form-data" ]) !!}
<div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title','autocomplete'=>"off"])}}
</div>
<div class="form-group">
    {{Form::label('body','Body')}}
    {{Form::textarea('body','',['class'=>'form-control textarea','placeholder'=>'Body'])}}
</div>

<div class="form-group">
    {{Form::file('cover_image')}}
</div>

{{Form::submit('Submit',['class'=>'btn btn-dark'])}}
{!! Form::close() !!}
</div>

@endsection