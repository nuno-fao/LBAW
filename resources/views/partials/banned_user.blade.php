<div class="card no-padding mx-auto mt-3" id="banned_{{ $user->id }}">
    <div class="card-body  d-flex justify-content-between">
        <p class="card-text my-auto"><a href="{{ url("/user/{$user}") }}"> {{ $user->name }} </a> has been Banned
        </p>
        <div class="d-flex justify-content-end">
            <button href="#" class="btn btn-primary ms-3" onclick="unban({{ $user->id }})">Revoke</button>
        </div>
    </div>
</div>
