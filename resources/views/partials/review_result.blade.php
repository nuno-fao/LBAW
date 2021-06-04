<div class="card mb-3 col-12 col-sm-12 mx-auto" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-12 my-auto">
            <div class="card-body">
                <a class="card-title h5 text-decoration-none"
                    href="{{ route('review', $review->id) }}">{{ $review->title }}</a>
                <p class="card-text mt-3">
                    {{ Str::limit($review->text, 100, '...') }}</p>
            </div>
        </div>
    </div>
</div>
