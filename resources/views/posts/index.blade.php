@extends('layouts.app')

@section('content')

<div class=" posts-index container mt-5">
<h1>{{$title}}</h1>
<hr>

@include('inc.messages')
@if (sizeof($posts)>0)

<h3 class="pl-2 mb-4">{{$subTitle}}</h3>
<hr/>
<div class="grid">
    @foreach ($posts as $post)


            <div class="grid__item">
                <div class="card"><img class="card__img" src="/storage/images/{{$post->cover_image}}" alt="{{$post->title}}">
                  <div class="card__content">
                    <h1 class="card__header">{{$post->title}}</h1>

                    @if (strlen($post->body)<100)
                    <p class="card__text">{{$post->body}} </p>

                    @else
                    <p class="card__text">{{substr($post->body,0,100)."..."}}</p>

                    @endif
                  <a  style="text-decoration:none" href="/posts/{{$post->id}}" class="card__btn" >Explore<span>&rarr;</span></a>

                  </div>
                </div>
              </div>

        @endforeach

     
</div>
{{ $posts->links() }}
@else
<h3>No posts found...</h3>
<a href="/posts/create" class="btn btn-dark">Add Post</a>
@endif
</div>
@endsection






