<div class="row align-items-center my-4 review-section">
    <div class="col col-12 col-lg-1">
    </div>
    <div class="review card mt-3 col-12 col-lg-8 px-0">
        <div class="card-header row review-header" onclick="location.href='review_page.php'">
            <div class="col col-12 col-lg-9 no-padding">
                {{$review->title}}
            </div>
            <div class="col col-12 col-lg-3 review-author no-padding">
                <a class="btn text-dark" href="user_profile.php">
                    {{$review->author}}
                </a>
            </div>
        </div>
        <div class="review-body card-body d-flex flex-column" onclick="location.href='review_page.php'">
            {{$review->text}}
        </div>
        <div class="card-footer d-flex d-flex justify-content-between review-footer">
            <div class="like_button no-padding">
                <i onclick="myFunction(this)" class="fa fa-thumbs-up"> 113</i>
            </div>
            <a class="btn" data-toggle="collapse" href="#comments0" role="button" aria-expanded="false"
                aria-controls="comments0">
                0 Comments
            </a>
        </div>
        @auth
        <div class="comment-section mt-3 collapse" id="comments0">
            <form class="add-comment">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Add a commment</label>
                    <div class=" d-flex ">
                        <textarea class="form-control comment-textarea" id="exampleFormControlTextarea1"
                            rows="1"></textarea>
                        <button class="btn btn-primary ms-3">
                            Send
                        </button>
                    </div>
                </div>
            </form>
        </div>            
        @endauth
    </div>
</div>