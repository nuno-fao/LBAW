<div class="comment">
    <div class="comment-author d-flex">
        <img class="card-img-top img-responsive user-pic" src="{{asset("img/user_pic.png")}}" alt="user"> {{--  REDIRECT TO USER PROFILE --}}
        <span class="mt-auto mb-auto">
            Beauty
        </span>
    </div>
    <div class="comment-data">
        {{$comment->text}}
    </div>
</div>
