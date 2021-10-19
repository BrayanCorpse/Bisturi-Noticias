@extends('front.template.layout')

@section('title', 'Bisturi Noticias |'.' '.$article->category->name)

@section('content')

    <div class="uk-text-center uk-grid-collapse uk-margin-medium-top b-show" uk-grid>

        <div class="uk-width-expand@m">

            <div class="uk-card">
                <div class="uk-card uk-card-default uk-card-body">
                    @if ($article->category->id == 15 || 
                         $article->category->id == 16 ||
                         $article->category->id == 17 || 
                         $article->category->id == 18 ||
                         $article->category->id == 20 ||
                         $article->category->id == 21)

                        <span class="b-h5-link uk-align-left uk-label">
                            <a class="uk-link-reset" href="{{url($article->category->slug)}}">
                                {{ $article->category->name }}
                            </a>
                        </span>
                    @else
                        {{-- NO MOSTRAR LABEL --}}
                    @endif

                  
                    <br>

                    <h1 class=" uk-text-left b-h1-content">{{$article->title}}</h1>

                    <h4 class="uk-text-left uk-text-secondary uk-text-uppercase uk-margin-remove-top"> 
                        {{$article->updated_at->diffForHumans()}}
                    </h4>

                    
                      
                    <h5 class="uk-text-left uk-margin-remove-top uk-text-bold">
                       {{$article->summary}}
                    </h5>

                    <h6 class="uk-text-left uk-margin-remove-top uk-text-bold" style="color: #44AAD4">
                        {{$article->user->name}}
                    </h6>
                   

                    <hr>
                    {!! $article->content !!}
               
                    
                    <div class="uk-margin-large-top">
                        @foreach ($article->tags as $tag)
                            <span class="uk-label"
                                    style="background: #43A1C4;">
                                #{{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                      
                    
                   

                </div>
                @include('front.partials.showSharelinks', ['article' => $article])
            </div>
        </div>
        

        <div class="uk-width-1-3@m uk-margin-top">  
            @each('front.components.generalNews',$generals, 'general')
        </div>
        
    </div>


@endsection

@push('js')
<script>
    let Swmytags = document.getElementsByClassName('show-tags');
    let Swtwitter = document.querySelector('.show-twitter');
    let Swnewtags = [];
    let Swurl = ';'
    function SwnewTags(){
        for (var i = 0; i < Swmytags.length; i++) {
            Swnewtags.push(Swmytags[i].value);
        }
        Swnewtags = Swnewtags.toString();
        Swurl = `https://twitter.com/intent/tweet?url={{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}&text={{ $article->title }}&via=BisturiNoticias&hashtags=${Swnewtags}`
        
        Swtwitter.setAttribute('href',Swurl);

        // console.log(twitter);

    }

    window.onload = SwnewTags;
</script>  
@endpush
    

