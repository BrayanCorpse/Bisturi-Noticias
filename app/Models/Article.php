<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\SoftDeletes;//guardar el registro eliminado

class Article extends Model
{

    use Sluggable;
    use SluggableScopeHelpers; //para poder utilizar el findBySlugOrFail en el controlador FrontController
    use SoftDeletes;

    public function sluggable(): array{
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = "articles";

    protected $fillable = ['title','summary','excerpt', 'status','author', 'content','tipo_id', 'user_id', 'category_id'];


    protected $date=['deleted_at'];

    public function category(){

        return $this->belongsTo('App\Models\Category');
    }

    public function tipo(){

        return $this->belongsTo('App\Models\Tipo');
    }

    public function user(){

        return $this->belongsTo('App\Models\User');
    }

    public function images(){

        return $this->hasMany('App\Models\Image');
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
