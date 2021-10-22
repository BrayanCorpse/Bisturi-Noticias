{{-- <h3 class="b-h3">
        CLICK DEL DÍA
    </h3>
    <hr class="b-hr uk-margin-remove-top uk-align-center"> --}}

    <div class="b-card-body b-mrt uk-position-relative" uk-lightbox="animation: scale">
        <span class="b-span-section b-span-text">Click Del Día</span>
        @foreach ($click->images   as $key => $image)
            @if ($key >= 0)
                <a class="uk-inline" 
                    href="{{ asset('storage' . '/' . $click->user->name . '/'. $image->name ) }}"  
                    data-caption="{{ Str::limit($click->excerpt, 250) }}"
                    >
            @endif
            @if ($key == 0)
                <img  src="{{ asset('storage' . '/' . $click->user->name . '/'. $image->name ) }}" 
                        alt="{{ $click->title }}">
                </a>
                <div class=" uk-card-footer uk-card-default b-click-footer">
                    {{ Str::limit($click->excerpt, 250) }}
                    <br>
                    <small class="b-creditos">
                        Foto: {{ $click->author}}
                    </small>
                </div>
            @else
                <img  src="{{ asset('storage' . '/' . $click->user->name . '/'. $image->name ) }}" 
                        alt="{{ $click->title }}" hidden>
                </a>
            @endif
        @endforeach 

       
    </div>
    
  