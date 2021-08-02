<div class="row">

    <!-- About me box -->
    <div class="col-xs-12 i">
        <div class="box aboutMeBox ">
            <div class="conten-about">
                <img src="{{ asset('img/190x190-1.jpg') }}" alt="#" width="190" height="190" class="img-responsive image-about">
                <div class="name">Brayan Manzano</div>
                <p class="info info-about">Blog specialist, design nerd and I like soccer.</p>

                <div class="btns">
                    {{-- <a href="page-about-me.html" title="#" class="btn"><span>Follow</span></a> --}}
                    <a href="#" title="#" class="btn btn-color"><span>Message</span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div class="col-xs-12 i">
        <div class="box categories ">
            <h2>Categories</h2>

            <div class="c">
                @foreach ($categories as $category)

                    <div class="i">
                        <a href="{{ route('search.category', $category->name) }}" title="#" class="clearfix">
                            <span class="count">{{ $category->name }}</span>
                            <span class="count">({{ $category->articles->count() }})</span>
                        </a>
                    </div>

                @endforeach
                <div class="btns text-center mt-3">
                    <a href="{{ route('welcome') }}" title="#" class="btn btn-color"><span>All Categories</span></a>
                </div>
            </div>

        </div>
    </div>

    <!-- Tags -->
    <div class="col-xs-12 i">
        <div class="box tags ">
            <h2>Tags</h2>

            <div class="c">
                @foreach ($tags as $tag)
                    <a href="{{ route('search.tags', $tag->name) }}" title="#" class="btn btn-color btn-tags"><span>#{{ $tag->name }}</span></a>
                @endforeach


            </div>
        </div>
    </div>
</div>
