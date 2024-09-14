<div class="uk-position-relative uk-visible-toggle uk-light uk-margin-large-top uk-box-shadow-large uk-border-rounded"  
      tabindex="-1" uk-slideshow="min-height: 220; max-height: 500">

  <div class="uk-slideshow-items uk-border-rounded">
    @foreach ($article->images as  $image)
      <div>
        <a href="{{ route('showArticle', ['category' => $article->category->slug, 'slug' => $article->slug]) }}" title="{{ $article->title }}">
          <img src="{{ asset('storage'.'/'.$article->user->name.'/'.$image->name) }}" 
                alt="{{ $article->title }}" 
                uk-cover>
        </a>
      </div>
      @endforeach
  </div>

  <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>
  <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>

</div>

 <div class="uk-card uk-card-default new-card uk-border-rounded uk-card-body uk-width-1-2@m">
    <div class=" uk-flex-inline uk-flex-wrap">
        <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top uk-margin-medium-right">
            <li>
              <a class="uk-text-capitalize" href="{{ route('categories', [ 'categorySlug' => $article->category->slug ]) }}">
                <small class="uk-text-muted side-title">
                {{$article->category->name}}
                </small>
              </a>
            </li>  
            <small class="font-codec">
              {{$article->created_at->diffForHumans()}} 
            </small> 
        </ul>     
        <ul class="uk-subnav uk-subnav-divider uk-margin-remove-top">
            @include('front.partials.sharelinks')
        </ul>        
    </div>
    <h1 class="uk-card-title uk-text-bold uk-margin-remove-top">
      <a href="{{ route('showArticle',['category' => $article->category->slug, 'slug'=>$article->slug])}}"
          class="blue-links"
          title="{{ $article->title }}">
      {{ Str::limit($article->title, 150) }}
      </a>
    </h1>
    <a href="{{ route('showArticle',['category' => $article->category->slug, 'slug'=>$article->slug]) }}"
      title="{{ $article->title }}" 
      class="uk-link-reset uk-float-right" 
      uk-icon="icon: arrow-right; ratio: 1.5">
    </a>
    <p class="uk-text-emphasis new-desc">{{ Str::limit($article->summary, 150) }}</p>
</div>


{{-- @push('js')
<script>
    let mytags = document.getElementsByClassName('tags');
    let twitter = document.querySelector('.twitter');
    let newtags = [];
    let url = ';'
    function newTags(){
        for (var i = 0; i < mytags.length; i++) {
            newtags.push(mytags[i].value);
        }
        newtags = newtags.toString();
        url = `https://twitter.com/intent/tweet?url={{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}&text={{ $article->title }}&via=BisturiNoticias&hashtags=${newtags}`
        
        twitter.setAttribute('href',url);

    }

    newTags();
</script>  
@endpush  --}}


 @push('ogf')
    <meta property="og:locale" content="es_MX">
        <meta property="og:type" content="article"> 
        <meta property="og:title" content="{{ $article->title }}"> 
        @if ( empty($article->excerpt) )
            <meta property="og:description" content="{{ $article->summary }}">
        @else
            <meta property="og:description" content="{{ $article->excerpt }}">
        @endif
        <meta property="og:url" content="{{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}">
        @if ( Route::current()->getName() == "index" )
            <meta property="og:site_name" content="Bisturí Noticias">  
        @else
            <meta property="og:site_name" 
                    content="Bisturí Noticias | {{ $article->category->name }}">
        @endif
        <meta property="article:publisher" content="https://www.facebook.com/bisturibnnoticias/">
        <meta property="og:image" 
                content="{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}">
        <meta property="og:image:height" content="600">
        <meta property="og:image:width" content="1200">
        <meta property="fb:app_id" content="1963124430785043" />
        
@endpush 

@push('ogt')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:creator" content="@BisturiNoticias">
<meta name="twitter:site" content="@BisturiNoticias">
<meta name="twitter:title" content="{{ Str::limit($article->title, 70) }}">
<meta name="twitter:description" content="{{ $article->summary }}">
<meta name="twitter:image" 
        content="{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}">
<meta name="twitter:image:alt" content="{{ $article->title }}">
@endpush

