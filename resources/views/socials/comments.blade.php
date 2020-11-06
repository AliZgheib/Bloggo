

 <div   class="comments-section" id="comments-section">
    <h3>Comments Section</h3>
    
    <div class="add-comment">
      <h5>Post your comment</h5>
      {!! Form::open(['action'=>"App\Http\Controllers\PostsController@store" , 'method' => 'POST' ,'enctype'=>"multipart/form-data" ]) !!}

      <div class="form-group">
          {{Form::textarea('body','',['class'=>'form-control textarea','placeholder'=>'Body'])}}
      </div>
      

      {{Form::submit('Submit',['class'=>'btn btn-dark'])}}
      {!! Form::close() !!}

    </div>

    <div class="comment-list">
      <h5>What other readers are saying</h5>
      <ul style="list-style: none">
          
        <li class="comment">
          <img src="/assets/user.png"/>
          <div class="comment-info">
            <span class="comment-user">Ali Zgheib </span><small class="comment-date">5/6/2020</small>
            <div class="comment-content">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum accusantium sed suscipit voluptatem cum distinctio, optio aut cupiditate assumenda eligendi corporis, dolores vel rerum ut quaerat quo dicta asperiores placeat? Itaque tempore, ducimus ea quia obcaecati architecto vitae odit. Id libero quasi earum dignissimos at ut, sit, in, nulla blanditiis iste nostrum voluptatibus voluptas tempore dolores accusantium dolorum nobis ratione quia eaque corporis tenetur repellat hic sapiente inventore? Cum incidunt ducimus sint quasi corrupti quae cumque consequuntur dolorum labore soluta!
            </div>
          </div>
        </li>

        <li class="comment">
          <img src="/assets/user.png"/>
          <div class="comment-info">
            <span class="comment-user">Ali Zgheib </span><small class="comment-date">5/6/2020</small>
            <div class="comment-content">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum accusantium sed suscipit voluptatem cum distinctio, optio aut cupiditate assumenda eligendi corporis, dolores vel rerum ut quaerat quo dicta asperiores placeat? Itaque tempore, ducimus ea quia obcaecati architecto vitae odit. Id libero quasi earum dignissimos at ut, sit, in, nulla blanditiis iste nostrum voluptatibus voluptas tempore dolores accusantium dolorum nobis ratione quia eaque corporis tenetur repellat hic sapiente inventore? Cum incidunt ducimus sint quasi corrupti quae cumque consequuntur dolorum labore soluta!
            </div>
          </div>
        </li>


        <li class="comment">
          <img src="/assets/user.png"/>
          <div class="comment-info">
            <span class="comment-user">Ali Zgheib </span><small class="comment-date">5/6/2020</small>
            <div class="comment-content">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum accusantium sed suscipit voluptatem cum distinctio, optio aut cupiditate assumenda eligendi corporis, dolores vel rerum ut quaerat quo dicta asperiores placeat? Itaque tempore, ducimus ea quia obcaecati architecto vitae odit. Id libero quasi earum dignissimos at ut, sit, in, nulla blanditiis iste nostrum voluptatibus voluptas tempore dolores accusantium dolorum nobis ratione quia eaque corporis tenetur repellat hic sapiente inventore? Cum incidunt ducimus sint quasi corrupti quae cumque consequuntur dolorum labore soluta!
            </div>
          </div>
        </li>

        <li class="comment">
          <img src="/assets/user.png"/>
          <div class="comment-info">
            <span class="comment-user">Ali Zgheib </span><small class="comment-date">5/6/2020</small>
            <div class="comment-content">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum accusantium sed suscipit voluptatem cum distinctio, optio aut cupiditate assumenda eligendi corporis, dolores vel rerum ut quaerat quo dicta asperiores placeat? Itaque tempore, ducimus ea quia obcaecati architecto vitae odit. Id libero quasi earum dignissimos at ut, sit, in, nulla blanditiis iste nostrum voluptatibus voluptas tempore dolores accusantium dolorum nobis ratione quia eaque corporis tenetur repellat hic sapiente inventore? Cum incidunt ducimus sint quasi corrupti quae cumque consequuntur dolorum labore soluta!
            </div>
          </div>
        </li>
      </ul>
    </div>
       
  </div>