@foreach ($smallarticles as $smallArticle) 
<div class="uk-flex-middle small-news uk-margin-small-top" uk-grid>
    <div class="uk-width-expand@s">
        <a href="{{ route('showArticle',['category'=> $smallArticle->category->slug,'slug'=>$smallArticle->slug])}}"
            class="uk-link-reset" 
            title="{{ $smallArticle->title }}">
            <h6 class="uk-margin-remove-bottom blue-links">{{ Str::limit($smallArticle->title, 85) }}</h6>
        </a>
        <small class="uk-text-light"> {{$smallArticle->created_at->diffForHumans()}} </small> 
    </div>
    <div class="uk-flex-first small-title">
        @foreach ($smallArticle->images as $key=>  $image)
            @if ($key == 0)
            <img src="{{ asset('storage'.'/'.$smallArticle->user->name.'/'.$image->name) }}" 
                    class="small-image uk-border-rounded"
                    width="200" height="60"
                    alt="{{ $smallArticle->title }}"
                    style="height: 60px;">
            @endif
        @endforeach
    </div>
</div>
@endforeach
