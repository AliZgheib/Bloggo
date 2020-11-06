@extends('layouts.app')

@section('links')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('content')
    <div class="contact">
       <div class="container mt-5">
            <div>
                <h1 class="text-center">Contact Bloggo</h1>
                @include('inc.messages')

                <div class="contact-form"> 
                    {!! Form::open([ 'action'=>['App\Http\Controllers\PagesController@postContact'] ,  'method' => 'POST' ]) !!}

                    <div class="form-group">
                        {{Form::text('email','',['class'=>'form-control','placeholder'=>'Email Address','autocomplete'=>"off"])}}
                    </div>

                    <div class="form-group">
                        {{Form::text('subject','',['class'=>'form-control','placeholder'=>'Subject','autocomplete'=>"off"])}}
                    </div>
                    <div class="form-group">
                        {{Form::textarea('body','',['class'=>'form-control textarea','placeholder'=>'Body'])}}
                    </div>
                    {{Form::submit('Send',['class'=>'btn btn-dark'])}}
                    {!! Form::close() !!}
                </div>
            </div>
                <div class="additional">
                    <img src="/assets/contact.jpg" alt="customer-service"/>
                    <div class="socials">
                            <h2>Connect with us</h2>
                            <!-- Add font awesome icons -->
                        <div class="links">                           
                             <a href="#" class="fa fa-facebook"></a>
                            <a href="#" class="fa fa-twitter"></a>
                            <a href="#" class="fa fa-google"></a>
                            <a href="#" class="fa fa-linkedin"></a>
                            <a href="#" class="fa fa-youtube"></a>
                            <a href="#" class="fa fa-instagram"></a></div>

                    </div>
                </div>
        </div>
   </div>
@endsection