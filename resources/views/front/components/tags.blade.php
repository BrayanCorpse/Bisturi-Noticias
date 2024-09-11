@foreach ($tags as $tag)
<a href="{{ route('showTagPosts', ['tagName' => $tag->name, 'tagId' => $tag->id] ) }}" 
    class="uk-label uk-link-toggle uk-text-capitalize" 
    style="background-color: #f5f2f2;">
    <small>{{ $tag->name }}</small>
</a>
@endforeach
