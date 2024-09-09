<a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}&title={{ $article->title }}"
  rel="noopener noreferrer" 
  target="_blank"  
  class="uk-icon-link uk-margin-small-right"  
  uk-icon="icon: facebook;  ratio: 0.8">
</a>

<a rel="noopener noreferrer" 
  target="_blank"   
  class="uk-icon-link uk-margin-small-right"  
  uk-icon="icon: copy; ratio: 0.8"
  onclick="navigator.clipboard.writeText(window.location.href);
  this.insertAdjacentHTML('afterend', '<div class=tooltip>copiado</div>');
  setTimeout(() => { 
  document.querySelector('.tooltip').remove(); 
      }, 250);">
</a>

<a href="https://api.whatsapp.com/send?text=Mira este articulo {{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}" 
  rel="noopener noreferrer" 
  target="_blank"   
  class="uk-icon-link"                        
  uk-icon="icon: whatsapp;   ratio: 0.8">
</a>

