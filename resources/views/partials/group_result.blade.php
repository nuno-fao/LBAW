<div class="card mb-3 col-6 col-sm-12 mx-auto" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-4 my-auto">
            <img class="my-auto" src="{{ asset($group->photo) }}" alt="{{ $group->title }} Photo"
                style="max-width: 100%; max-height: 100%">
        </div>
        <div class="col-8 my-auto">
            <div class="card-body">
                <a class="card-text text-decoration-none"
                    href="{{ route('group', $group) }}">{{ $group->title }}</a>
                <p class="card-title">{{ $group->description }}</p>
            </div>
        </div>
    </div>
</div>
