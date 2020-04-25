<div class="row">
    <div class="col-lg-12 col-md-12  col-sm-12  col-xs-12 container-fluid ">
        
            <!-- Fluid width widget -->        
          <div class="card card-default">
                <div class="card-header bg-primary">
                    <h3 class="created_at-title">
                        <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 
                        Recent Comments
                    </h3>
                </div>
                <div class="card-body">
                    <ul class="media-list">
                      @foreach($comments as $comment)
                        <li class="media">
                            <div class="media-left">
                                <img src="http://placehold.it/60x60" class="rounded-circle">
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">
                                    <a href="/users/{{$comment->user->id}}">{{ $comment->user->first_name }}  {{ $comment->user->first_name }} 
                                    - {{ $comment->user->email }}</a>
                                    <br>
                                    <small>
                                        commented on {{ $comment->created_at }}
                                    </small>
                                </h6>
                                <p>
                                    {{ $comment->body }}
                                </p>
                                <b>Proof:</b>
                                <p>
                                    {{ $comment->url }}
                                </p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- End fluid width widget --> 
    </div>
</div>