<div class="comment">
    <div class="comment-author d-flex">
        <img class="card-img-top img-responsive user-pic" src="{{asset("img/user_pic.png")}}" alt="user"> {{--  REDIRECT TO USER PROFILE --}}
        <span class="mt-auto mb-auto">
            {{$comment->user->username}}
        </span>
    </div>
    <div class="d-flex flex-row">
        <div class="comment-data mr-0">
            {{$comment->text}}
        </div>

        @if(auth()->user()->admin || $comment->user == auth()->user())
        <button class="btn ml-0 mb-2 shadow-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
              </svg>
        </button>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <form action="">
                <button class="dropdown-item">Delete Comment</button>
            </form>   
            
        </div>
        @endif
    </div>
        
</div>
