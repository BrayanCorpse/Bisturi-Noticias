@extends('front.template.main')

@section('title', 'Principal')

@section('content')

{{-- {{ dd($categories) }} --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="logo-image">
                <a href="#">
                    <img class="image-content-title" src="{{ asset('img/logo.png') }}" alt="">
                </a>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-8">

            @include('flash::message')

            <!-- Standard post -->
            @foreach ($articles as $article)
                {{-- {{ dd($article->images) }} --}}
                {{-- {{ dd(count($article->images)) }} --}}

                <article class="article">
                    <div class="article-image">
                        <a href="{{ route('view.article', $article->slug) }}" title="#">
                            {{-- @foreach ($article->images  as $image) --}}

                            <div id="carouselControls{{ $article->slug }}" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">

                                            @foreach ($article->images   as $key => $image)
                                                    {{-- {{ dd($key) }} --}}
                                                @if ($key == 0)

                                                    <div class="carousel-item active content-image">
                                                        <img src="{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}" alt="{{ $article->title }}" class="img-responsive article-image-mod d-block w-100 ">
                                                    </div>

                                                @endif

                                                @if($key > 0)
                                                    <div class="carousel-item content-image">
                                                        {{-- <img class="d-block w-100" src="..." alt="First slide"> --}}
                                                        <img src="{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}" alt="{{ $article->title }}" class="img-responsive article-image-mod d-block w-100 ">

                                                    </div>
                                                @endif

                                            @endforeach

                                        {{-- <div class="carousel-item">
                                            <img class="d-block w-100" src="..." alt="Second slide">
                                        </div> --}}
                                </div>
                                @if (count($article->images) > 1)


                                        <a class="carousel-control-prev" href="#carouselControls{{ $article->slug }}" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselControls{{ $article->slug }}" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                @endif
                            </div>

                                {{-- <img src="{{ asset('images/articles/'. $image->name) }}" alt="#"class="img-responsive article-image-mod"> --}}

                            {{-- @endforeach --}}
                        </a>
                    </div>
                    <div class="article-box box">
                        <h3 class="box-title">
                            <a href="{{ route('view.article', $article->slug) }}" title="{{ $article->title }}">{{ $article->title }}</a>
                        </h3>
                        <div class="info">
                            {{-- <div>
                                <span class="date">March 26, <span data-current-year></span></span>
                            </div> --}}
                            <div>{{ $article->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="description-1 d-none">
                            {{-- {{ dd($article->content) }} --}}
                            {{-- {{ $article->content  }} --}}
                            {!! BBCode::convertToHtml($article->content) !!}
                        </div>


                        <div class="description" id="editor">

                        </div>
                        <div class="btns text-center">
                            <a href="{{ route('view.article', $article->slug) }}" title="#" class="btn btn-color"><span>Continue reading</span></a>
                        </div>

                        <footer class="article-footer">
                            <div class="row ">
                                <div class="col-sm-12 col-lg-6 tags">
                                        <a href="#" title="#">{{ $article->category->name . ' - ' }}</a>
                                        @foreach ($article->tags as $item)
                                      {{-- {{  dd($article->tag)}} --}}
                                            <a href="#" title="#">#{{ $item->name }}</a>
                                        @endforeach
                                </div>
                                <div class="col-sm-12 col-lg-6 moreInfo">
                                    {{-- <div><span><i class="fa fa-eye"></i> 86</span> Views</div>
                                    <div><span><i class="fa fa-comments"></i> 36</span> Comments</div> --}}
                                </div>
                            </div>
                        </footer>
                    </div>
                </article>
            @endforeach
            <div class="pagination">
                {!! $articles->render() !!} {{-- para que funciones la paginación --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 aside ">
            <!-- Aside -->
            <aside class="col-xs-12 col-sm-12 aside">

                @include('front.partials.aside')

            </aside>
        </div>
    </div>
</div>

@endsection
