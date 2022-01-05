
    <div class="b-card-body b-mrt uk-position-relative" >
            <div class="uk-card-header b-card-header">
                {{-- <img class="uk-border-circle uk-float-left" src="{{asset('img/icon.png')}}" alt="Bisturí Noticias" width="25" height="25"> --}}
                <a href="{{ route('clicks')}}">
                    <span class="b-span-text" uk-icon="icon: expand">
                        Click Del Día
                    </span>
                </a>   
            </div>
            <div uk-lightbox="animation: scale">
                @foreach ($click->images   as $key => $image)
                    @if ($key >= 0)
                        <a class="uk-inline" 
                            href="{{ asset('storage' . '/' . $click->user->name . '/'. $image->name ) }}"  
                            data-caption="{{ Str::limit($click->excerpt, 350) }}"
                            >
                    @endif
                    @if ($key == 0)
                        <img loading="lazy" src="{{ asset('storage' . '/' . $click->user->name . '/'. $image->name ) }}" 
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
    </div>

    @include('front.partials.facebook')
    
  