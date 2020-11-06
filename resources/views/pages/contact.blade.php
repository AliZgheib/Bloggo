@extends('layouts.app')

@section('content')
    <div class="contact">
       <div class="container mt-5">
            <h1 class="text-center">{{$title}}</h1>
            <div class="contact-form"> 
                {!! Form::open([ 'method' => 'POST' ]) !!}
                <div class="form-group">
                    {{Form::label('subject','Subject')}}
                    {{Form::text('subject','',['class'=>'form-control','placeholder'=>'Subject','autocomplete'=>"off"])}}
                </div>
                <div class="form-group">
                    {{Form::label('body','Body')}}
                    {{Form::textarea('body','',['class'=>'form-control textarea','placeholder'=>'Body'])}}
                </div>
                {{Form::submit('Send',['class'=>'btn btn-dark'])}}
                {!! Form::close() !!}
            </div>
        </div>
   </div>
@endsection