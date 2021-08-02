@extends('front.template.layout')

@section('title', 'Bisturi Noticias |'.' '.$article->category->name)

@section('content')

    <div class="uk-text-center uk-grid-collapse uk-margin-medium-top" uk-grid>

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

                    <h1 class="uk-text-left b-h1-content">{{$article->title}}</h1>

                    <h6 class="uk-text-left uk-margin-remove-top">
                        Por: <strong>{{$article->user->name}}</strong>
                    </h6>

                    <h6 class="uk-text-left uk-margin-remove-top"> 
                        {{$article->updated_at->diffForHumans()}} 
                    </h6>

                    {!! $article->content !!}
                    
                    @foreach ($article->tags as $tag)
                        <span class="uk-label uk-float-left uk-margin-right uk-margin-top"
                              style="background: #43A1C4;">
                            #{{ $tag->name }}
                        </span>
                    @endforeach
                   

                </div>
            </div>
            
            
        </div>
        

        <div class="uk-width-1-3@m">  
            @each('front.components.generalNews',$generals, 'general')
        </div>
        
    </div>


@endsection
    
