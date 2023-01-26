@extends('front.template.layout')

@section('title', 'Bisturi Noticias |'.' '.$article[0]->category->name)

@section('content')


    <div class="uk-text-center uk-grid-collapse uk-margin-medium-top b-show" uk-grid>

        <div class="uk-width-expand@m">

            <div class="uk-card">
                <div class="uk-card uk-card-default uk-card-body">
                @foreach ($article as $art)
                    @each('front.partials.showSharelinks', $article, 'article')
                    @if ($art->category->id == 15 || 
                         $art->category->id == 16 ||
                         $art->category->id == 17 || 
                         $art->category->id == 18 ||
                         $art->category->id == 20 ||
                         $art->category->id == 21)

                        <span class="b-h5-link uk-align-left uk-label">
                            <a class="uk-link-reset" href="{{url($art->category->slug)}}">
                                {{ $art->category->name }}
                            </a>
                        </span>
                    @else
                        {{-- NO MOSTRAR LABEL --}}
                    @endif

                  
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
                   

                    <hr>
                    {!! $art->content !!}
               
                    
                    <div class="uk-margin-large-top">
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
        
        <div class="uk-width-1-3@m">  
            @each('front.components.generalNews',$generals, 'general')
            {{-- {{ $generals->links() }} --}}
        </div>
        
    </div>


@endsection


    

