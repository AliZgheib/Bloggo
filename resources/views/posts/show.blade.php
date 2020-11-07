@extends('layouts.app')

@section('links')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection


@section('content')
<div class="posts-show container mt-5" post_id="{{$post->id}}">

@include('inc.messages')

<div class="content-title">
    <h1 class="text-center">{{$post->title}}</h1>
</div>

<div class="content-data">
    <img src="/storage/images/{{$post->cover_image}}" alt="post"/>
    <p>{!!$post->body!!}</p>
</div>
<hr>
<span>Written by <b>{{$name}}</b> on {{date("d-m-Y", strtotime($post->created_at))}}</span>
<hr>

@auth
    
@if (Auth::user()->id==$post->user_id)

<div class="post-actions">
<a target="_blank" href="/posts/{{$post->id}}/edit" class="btn btn-primary mr-3"> Edit</a>


{!! Form::open(['action'=>['App\Http\Controllers\PostsController@destroy',$post->id] , 'method' => 'POST' ]) !!}

{{Form::hidden('_method','DELETE')}}
{{Form::submit('Delete',['class'=>'btn btn-danger'])}}

{!! Form::close() !!}

</div>
@endif
@endauth

<div class="additional">

    @include('socials.socialmedia') 

    @auth
    @include('socials.likescomments') 
    @endauth

 <div   class="comments-section">
    <h3>Comments Section</h3>
    
    @auth
    @include('socials.commentform') 
    @endauth

    @include('socials.commentlist') 

    
  </div>

</div>

@include('layouts.modal') 

</div>
@endsection

