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

                    @if (strlen($post->title)<15)
                    <h1 class="card__header">{!!$post->title!!}</h1>

                    @else
                    <h1 class="card__header">{!!substr($post->title,0,15)."..."!!}</h1>

                    @endif


                    @if (strlen($post->body)<100)
                    <div class="card__text">{!!$post->body!!}</div>

                    @else
                    <div class="card__text">{!!substr($post->body,0,100)."..."!!}</div>

                    @endif
                  <a  target="_blank" style="text-decoration:none" href="/posts/{{$post->id}}" class="card__btn" >Explore<span>&rarr;</span></a>

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






