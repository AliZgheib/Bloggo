
    <div class="add-comment">
        <h5>Post your comment</h5>
        {!! Form::open(['id'=>'comment-form']) !!}
  
        <div class="form-group">
            {{Form::textarea('body','',['class'=>'form-control textarea','placeholder'=>'Body'])}}
        </div>
        
  
        {{Form::submit('Submit',['class'=>'btn btn-dark'])}}
        {!! Form::close() !!}
  
      </div>
  