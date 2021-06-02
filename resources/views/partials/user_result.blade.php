<div class="card mb-3 col-6 col-sm-12 mx-auto" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-4">
            <img src="{{ asset($user->photo) }}" alt="{{ $user->name }} Photo"
                style="max-width: 100%; max-height: 100%">
        </div>
        <div class="col-8 my-auto">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <a class="card-text text-decoration-none"
                    href="{{ route('user', $user) }}">{{ '@' }}{{ $user->username }}</a>
            </div>
        </div>
    </div>
</div>
