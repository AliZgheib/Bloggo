@extends('layouts.app')

@section('content')
<div class="posts-show container mt-5">

@include('inc.messages')

<div class="content-title">
    <h1 class="text-center">{{$post->title}}</h1>
</div>

<div class="content-data">
    <img src="/storage/images/{{$post->cover_image}}" alt="post"/>
    <p>{{$post->body}}</p>
</div>
<hr>
<small>Written on {{$post->created_at}}</small>
<hr>

@auth
    
@if (Auth::user()->id==$post->user_id)

<div class="post-actions">
<a href="/posts/{{$post->id}}/edit" class="btn btn-primary mr-3"> Edit</a>


{!! Form::open(['action'=>['App\Http\Controllers\PostsController@destroy',$post->id] , 'method' => 'POST' ]) !!}

{{Form::hidden('_method','DELETE')}}
{{Form::submit('Delete',['class'=>'btn btn-danger'])}}

{!! Form::close() !!}

</div>
@endif


@endauth
</div>
@endsection