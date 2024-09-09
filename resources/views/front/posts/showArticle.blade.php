@extends('front.template.layout')

@section('title', 'BN Noticias |'.' '.$article[0]->category->name)

@section('content')


    <div class="uk-text-center uk-grid-collapse b-show" uk-grid>

        <div class="uk-width-expand@m">

            <div class="uk-card uk-margin-large-top">
                <div class="uk-card uk-card-default uk-card-body">
                @foreach ($article as $art)
                    @each('front.partials.showSharelinks', $article, 'article')

                        <span class="b-h5-link uk-align-left uk-label">
                            <a class="uk-link-reset" href="{{url($art->category->slug)}}">
                                    {{ $art->category->name }}
                            </a>
                        </span> 
                    <br>

                    <h1 class=" uk-text-left b-h1-content">{{$art->title}}</h1>

                    <h4 class="uk-text-left uk-text-secondary uk-text-uppercase uk-margin-remove-top"> 
                        {{$art->created_at->diffForHumans()}} 
                    </h4>

                    
                      
                    <h5 class="uk-text-left uk-margin-remove-top uk-text-bold">
                       {{$art->summary}}
                    </h5>

                    <h6 class="uk-text-left uk-margin-remove-top uk-text-bold" style="color: #44AAD4">
                        @if ($art->user->id != 28)
                        <a href="{{ route('showAuthorPosts', ['userName' => Str::slug($art->user->name, '-') ] ) }}" style="text-decoration: none">
                            {{$art->user->name}}
                        </a>
                        @endif
                    </h6>

                    <h6 class="uk-text-left uk-margin-remove-top">
                        <small id="time"></small>
                    </h6>

                    <hr>

                    <section id="content">
                        {!! $art->content !!}  
                    </section>   
                    
                    <div class="uk-float-left">
                        @if (empty($art->author))
                            <sub>
                                Foto(s): Cortesía | Bisturí Noticias
                            </sub>
                        @else
                            <sub>
                                Foto(s): {{$art->author}} | Bisturí Noticias
                            </sub>
                        @endif  
                    </div>   
                    
                    <div class="uk-margin-xlarge-top">
                        @foreach ($art->tags as $tag)
                            <a href="{{ route('showTagPosts', ['tagName' => $tag->name, 'tagId' => $tag->id] ) }}" style="text-decoration: none">
                                <span class="uk-label"style="background: #43A1C4;">
                                    #{{ $tag->name }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                @endforeach 
                </div>               
            </div>
        </div>
        
        <div class="uk-width-1-3@m uk-margin-large-top">  
            @each('front.components.generalNews',$generals, 'general')
            {{-- {{ $generals->links() }} --}}
        </div>
        
    </div>


@endsection

@push('js')
<script>

    const result = document.getElementById("time");
    const text = document.getElementById('content').innerText;
    const words = text.split(" ").length;

    function readingTime(words) {
        const readingSpeed = 200;
        const readingTime = words / readingSpeed;
        result.innerHTML = `${ readingTime < 0.6 
                        ? readingTime.toFixed(2)+' Seg.' 
                        : Math.round(readingTime)+' Min.' } 
                        de lectura <span uk-icon="icon: clock; ratio: 0.7"></span>`;

    }
    window.addEventListener("load", readingTime(words));
</script> 
@endpush


    

