<div class="card col-12 col-lg-7 no-padding mx-auto mt-3" id="request_{{$notification->id}}">
    <div class="card-body d-flex justify-content-between">
        @if($notification->group != null)
        <p class="card-text my-auto"><a href="#">{{$notification->group->title}}</a> invited you to join their group
        </p>
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-primary ms-3 request_button" id="request_{{$notification->id}}_accept">Join</a>
            <a href="#" class="btn btn-primary ms-3 request_button" id="request_{{$notification->id}}_decline">Decline</a>
        </div>

        @elseif($notification->review != null)
        <p class="card-text my-auto"><a href="{{route('review',[$notification->review])}}">Review {{$notification->review->id}}</a> was reported</p>
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-primary ms-3 request_button" id="request_{{$notification->id}}_accept">Delete Review</a>
            <a href="#" class="btn btn-primary ms-3 request_button" id="request_{{$notification->id}}_decline">Dissmiss</a>
        </div>

        @elseif($notification->friend != null)
        <p class="card-text my-auto"><a href="{{route('user',[$notification->friend])}}">{{$notification->friend->username}}</a> sent you a friend request</p>
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-primary ms-3 request_button" id="request_{{$notification->id}}_accept">Accept</a>
            <a href="#" class="btn btn-primary ms-3 request_button" id="request_{{$notification->id}}_decline">Decline</a>
        </div>

        @endif
    </div>
</div>
