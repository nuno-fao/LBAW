<div class="card no-padding mx-auto mt-3" id="request_1">
    <div class="card-body  d-flex justify-content-between">
        <p class="card-text my-auto"><a href="{{url("/user/{$user}")}}"> {{$user->name}} </a> has been Banned
        </p>
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-primary ms-3 request_button" id="request_1_accept">Revoke</a>
        </div>
    </div>
</div>