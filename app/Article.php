<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\SoftDeletes;//guardar el registro eliminado

class Article extends Model
{

    use Sluggable;
    use SluggableScopeHelpers; //para poder utilizar el findBySlugOrFail en el controlador FrontController
    use SoftDeletes;

    public function sluggable(){
        return [
            'slug' => ['source' => 'title']
        ];
    }


    protected $table = "articles";

    protected $fillable = ['title','summary','excerpt', 'status','relevancia','author', 'content','tipo_id', 'user_id', 'category_id','subcategoria'];


    protected $date=['deleted_at'];

    public function category(){

        return $this->belongsTo('App\Category');
    }

    public function tipo(){

        return $this->belongsTo('App\Tipo');
    }

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function images(){

        return $this->hasMany('App\Image');
    }

    public function tags(){

        return $this->belongsToMany(Tag::class);
    }

        // Configuración de scope para el article title
        public function scopeSearch($query, $title)
    {
        return $query->where('title', 'LIKE', "%$title%");
    }


}
