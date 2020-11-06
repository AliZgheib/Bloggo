@extends('layouts.app')

@section('content')
<div class="posts-edit container mt-5">

<h1>Edit Post</h1>
@include('inc.messages')
{!! Form::open(['action'=>['App\Http\Controllers\PostsController@update',$post->id] , 'method' => 'POST','enctype'=>"multipart/form-data"  ]) !!}
<div class="form-group">
    {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title','autocomplete'=>"off"])}}
</div>
<div class="form-group">
    {{Form::textarea('body',$post->body,['class'=>'form-control textarea','placeholder'=>'Body','autocomplete'=>"off"])}}
</div>
<div class="form-group">
    {{Form::file('cover_image')}}
</div>
{{Form::hidden('_method','PUT')}}
{{Form::submit('Update',['class'=>'btn btn-dark'])}}




{!! Form::close() !!}
</div>

@endsection