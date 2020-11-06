@extends('layouts.app')

@section('content')
<div class="dashboard">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($posts)>0)

                        <div class="dashboard-headear d-flex justify-content-center align-items-start mb-4">
                            <h3>You have {{count($posts)}} Published Post(s)</h3>
                            <a href="/posts/create" class="btn btn-secondary ml-5">Create Another Post</a>
                        </div>

                        <table class="table">
                            <thead class="thead-dark">
                              <tr >
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th  colspan="3" class="text-center" >Actions</th>

                              </tr>
                            </thead>
                            <tbody>

                        @foreach ($posts as $post)
                            <tr>
                              <th scope="row">1</th>
                            <td class="title">{{$post->title}}</td>
                            <td><a href="/posts/{{$post->id}}" class="btn btn-block btn-success"> View</a></td>
                              <td><a href="/posts/{{$post->id}}/edit" class="btn btn-block btn-primary"> Edit</a></td>
                              <td>{!! Form::open(['action'=>['App\Http\Controllers\PostsController@destroy',$post->id] , 'method' => 'POST' ]) !!}

                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class'=>'btn btn-block btn-danger'])}}
                                
                                {!! Form::close() !!}</td>
                            </tr>

                        @endforeach
                            </tbody>
                        </table>
                            {{ $posts->links() }}
                    @else
                        <h3>You Haven't Published Anything Yet :( </h3>
                        <a href="/posts/create" class="btn btn-dark mt-3">Create First Post</a>
                    @endif
                
                   
                   
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
