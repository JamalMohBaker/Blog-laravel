<div class="card">
    <h2 class="text-center">{{ $article->title }}</h2>
    <img src="{{ $article->image_url }}" class="card-img-top img-fluid h-100" alt="...">
    <div class="card-body">
    <p class="card-text">
        {{ $article->short_subject }}...
    </p>
    </div>
    <button class=" read " >Read More <i class="fa-solid fa-arrow-right"></i></button>
</div>
