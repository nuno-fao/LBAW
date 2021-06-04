<div class="card-header row review-header ">
    <span class="col col-12 col-lg-4 d-flex align-items-center">
        {{ $review->title }}
    </span>
    <div class="col col-12 col-lg-8 d-flex justify-content-end review-author no-padding">
        <div class="text-dark d-flex align-items-center">
            {{ \Carbon\Carbon::parse($review->date)->diffForHumans() }}
        </div>
        <a class="btn my-auto mr-0" href="{{ route('user', ['user' => $review->user->id]) }}">
            by {{ $review->user->username }}
        </a>
        @if($review->group != null)
            <a class="btn ml-0 my-auto" href="{{ route('group', ['group_id' => $review->group->id]) }}">
                in {{$review->group->title}} 
            </a>
        @endif


        @can('delete', $review)
            <button class="btn btn-primary ms-1" onclick="deleteReview('review_{{ $review->id }}',{{ $review->id }})">
                Delete
            </button>

        @endcan
        @can('report', $review)
            <button class="btn btn-primary ms-1 report_button"
                onclick="reportReview('review_{{ $review->id }}',{{ $review->id }})" @if (auth()->user()->reported()->get()->contains('review_id', $review->id) &&
        auth()->user()->reported()->get()->contains('signed_user_id', auth()->user()->id)) disabled @endif>
                Report
            </button>
        @endcan
        @can('see', $review)
            <button class="btn btn-primary ms-1" onclick="location.href='{{ route('review', [$review->id]) }}'">
                See
            </button>
        @endcan
    </div>
</div>
<div class="card-body d-flex flex-column ">
    {{ $review->text }}
</div>
<div class="card-footer d-flex justify-content-between review-footer">
    <div class="no-padding d-flex">
        @auth
            <span id="like_button_{{ $review->id }}" data-balloon="size: 2x" data-balloon-pos="up"
                class="db color-inherit link hover-orange like_button @if ($review->likes()->where('user_id', Auth::user()->id)->where('review_id', $review->id)->count() != 0) {{ 'clicked' }} @endif" role="button">
                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="thumbs-up" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    class="svg-inline--fa fa-thumbs-up fa-w-16 fa-2x my-auto " style="max-width: 17px">
                    @if ($review->likes()->where('user_id', Auth::user()->id)->where('review_id', $review->id)->count() == 0)
                        <path fill-opacity="1.0" fill="#2c3e50"
                            d="M466.27 286.69C475.04 271.84 480 256 480 236.85c0-44.015-37.218-85.58-85.82-85.58H357.7c4.92-12.81 8.85-28.13 8.85-46.54C366.55 31.936 328.86 0 271.28 0c-61.607 0-58.093 94.933-71.76 108.6-22.747 22.747-49.615 66.447-68.76 83.4H32c-17.673 0-32 14.327-32 32v240c0 17.673 14.327 32 32 32h64c14.893 0 27.408-10.174 30.978-23.95 44.509 1.001 75.06 39.94 177.802 39.94 7.22 0 15.22.01 22.22.01 77.117 0 111.986-39.423 112.94-95.33 13.319-18.425 20.299-43.122 17.34-66.99 9.854-18.452 13.664-40.343 8.99-62.99zm-61.75 53.83c12.56 21.13 1.26 49.41-13.94 57.57 7.7 48.78-17.608 65.9-53.12 65.9h-37.82c-71.639 0-118.029-37.82-171.64-37.82V240h10.92c28.36 0 67.98-70.89 94.54-97.46 28.36-28.36 18.91-75.63 37.82-94.54 47.27 0 47.27 32.98 47.27 56.73 0 39.17-28.36 56.72-28.36 94.54h103.99c21.11 0 37.73 18.91 37.82 37.82.09 18.9-12.82 37.81-22.27 37.81 13.489 14.555 16.371 45.236-5.21 65.62zM88 432c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z"
                            class="visible liked">
                        </path>
                        <path fill="#2c3e50"
                            d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"
                            class="invisible not-liked">
                        </path>
                    @else
                        <path fill-opacity="1.0" fill="#2c3e50"
                            d="M466.27 286.69C475.04 271.84 480 256 480 236.85c0-44.015-37.218-85.58-85.82-85.58H357.7c4.92-12.81 8.85-28.13 8.85-46.54C366.55 31.936 328.86 0 271.28 0c-61.607 0-58.093 94.933-71.76 108.6-22.747 22.747-49.615 66.447-68.76 83.4H32c-17.673 0-32 14.327-32 32v240c0 17.673 14.327 32 32 32h64c14.893 0 27.408-10.174 30.978-23.95 44.509 1.001 75.06 39.94 177.802 39.94 7.22 0 15.22.01 22.22.01 77.117 0 111.986-39.423 112.94-95.33 13.319-18.425 20.299-43.122 17.34-66.99 9.854-18.452 13.664-40.343 8.99-62.99zm-61.75 53.83c12.56 21.13 1.26 49.41-13.94 57.57 7.7 48.78-17.608 65.9-53.12 65.9h-37.82c-71.639 0-118.029-37.82-171.64-37.82V240h10.92c28.36 0 67.98-70.89 94.54-97.46 28.36-28.36 18.91-75.63 37.82-94.54 47.27 0 47.27 32.98 47.27 56.73 0 39.17-28.36 56.72-28.36 94.54h103.99c21.11 0 37.73 18.91 37.82 37.82.09 18.9-12.82 37.81-22.27 37.81 13.489 14.555 16.371 45.236-5.21 65.62zM88 432c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z"
                            class="invisible liked">
                        </path>
                        <path fill="#2c3e50"
                            d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"
                            class="visible not-liked">
                        </path>
                    @endif
                </svg>
            </span>
        @endauth
        <span class="my-auto mx-3" id="likes_{{ $review->id }}">{{ $review->likes->count() }} likes</span>
    </div>
    <a class="btn py-0" id="total_comments" data-toggle="collapse" href="#comments{{ $review->id }}" role="button"
        aria-expanded="false" aria-controls="comments{{ $review->id }}">
        {{ $review->comments->count() }} comments
    </a>
</div>

<div class="comment-section mt-3 collapse" id="comments{{ $review->id }}">
    @if ($review->comments->count() > 0)
        @each('partials.comment',$review->comments,'comment')
    @endif
    @auth
        <div class="form-group">
            <label for="addCommentArea_{{ $review->id }}">Add a commment</label>
            <div class=" d-flex ">
                <textarea class="form-control comment-textarea" name="text" id="addCommentArea_{{ $review->id }}"
                    rows="1"></textarea>
                <button class="btn btn-primary ms-3" onclick="addComment({{ $review->id }})">
                    Send
                </button>
            </div>
        </div>
    @endauth
</div>
