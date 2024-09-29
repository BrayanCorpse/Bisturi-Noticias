<style>
    .last-image{
        object-fit: cover;
    }
</style>
<div class="uk-padding-small uk-child-width-1-2@s" uk-grid="masonry: pack">

    <div class="uk-width-expand@m">
        @foreach ($lastNewText as $lastnew)
        <div class="uk-card uk-card-default uk-card-hover uk-grid-collapse uk-margin 
                    uk-child-width-1-2@s" uk-grid>
            <div class="uk-card-media-left uk-cover-container" style="border-radius: 5px 0 0 5px;">
                @foreach ($lastnew->images as $key=>  $image)
                    @if ($key == 0)
                    <a href="{{ route('showArticle',['category'=> $lastnew->category->slug,'slug'=>$lastnew->slug])}}" class=" uk-link-reset" title="{{ $lastnew->title }}">
                        <img src="{{ asset('storage'.'/'.$lastnew->user->name.'/'.$image->name) }}" 
                                alt="{{ $lastnew->title }}"
                                class="last-image" uk-cover>
                        <canvas width="600" height="400"></canvas>
                    </a>
                    @endif
                 @endforeach
            </div>
            <div class="uk-box-shadow-large">
                <div class="uk-card-body">
                    <div style="margin-bottom: -25px;">
                        <small class="uk-text-muted side-title">
                            {{$lastnew->category->name}}
                        </small>
                        <small class="font-codec">| &nbsp;&nbsp; 
                            {{$lastnew->created_at->diffForHumans()}} 
                        </small> 
                    </div>
                        <h3 style="line-height: 1;">
                            <a href="{{ route('showArticle',['category'=> $lastnew->category->slug,'slug'=>$lastnew->slug])}}" 
                                class="blue-links" 
                                title="{{ $lastnew->title }}">{{ Str::limit($lastnew->title, 150) }}
                            </a>
                        </h3>
                    </a>
                    <p class="new-desc">{{ Str::limit($lastnew->summary, 85) }}</p>
                </div>
            </div>
        </div>
        @endforeach
        @include('front.components.blockquote') 
        <section class="uk-margin-top">
            {{ $lastNewText->links('vendor.pagination.new-pagination') }}
        </section>    
    </div>


    <div class="uk-width-1-3@m">
        <div class="uk-card uk-card-default">
                @include('front.components.sideColumn')
        </div>
    </div>
    
</div>