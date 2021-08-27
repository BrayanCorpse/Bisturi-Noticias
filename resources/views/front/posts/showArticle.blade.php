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
                         $article->category->id == 18)

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
                   
                    <h5 class="uk-text-left uk-margin-remove-top uk-text-uppercase" style="color: #44AAD4">
                        <strong>{{$article->user->name}}</strong>
                    </h5>

                    <hr>
                  

                    

                    {!! $article->content !!}
                    
                    @foreach ($article->tags as $tag)
                        <span class="uk-label uk-float-left uk-margin-right uk-margin-top"
                              style="background: #43A1C4;">
                            #{{ $tag->name }}
                        </span>
                    @endforeach
                   

                </div>
                @include('front.partials.showSharelinks', ['article' => $article])
            </div>
        </div>
        

        <div class="uk-width-1-3@m">  
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
    

{{-- Twitter 
usuario: @BisturiNoticias
contraseña: Bisturi_Noticias

Facebook 
usuario: tuopinion@bisturinoticias.com
contraseña: Bisturi_Noticias

Instagram 
usuario: bisturi_noticias
contraseña: Bisturi_Noticias

Youtube 
usuario: tuopinion@bisturinoticias.com
contraseña: Bisturi_Noticias
 --}}
