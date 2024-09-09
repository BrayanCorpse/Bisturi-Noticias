<div class="uk-child-width-1-2@s" uk-lightbox="animation: fade" style="display: flex;
    flex-wrap: wrap;">
    @foreach ($lastNewPhoto as  $lastPhoto)
        @foreach ($lastPhoto->images as $key=>  $image)
            @if ($key >= 0)
            <div style="padding: 5px;">
                <a class="uk-inline" 
                    href="{{ asset('storage'.'/'.$lastPhoto->user->name.'/'.$image->name) }}" 
                    data-caption="{{ $lastPhoto->title }}">
                    <img src="{{ asset('storage'.'/'.$lastPhoto->user->name.'/'.$image->name) }}" 
                            width="1800" 
                            height="1200" 
                            class="visual-img uk-border-rounded"
                            alt="{{ $lastPhoto->title }}">
                </a>
            </div>
            @endif
        @endforeach
    @endforeach
</div>

