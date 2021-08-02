<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Subcategory extends Model
{
    use Sluggable;
    use SluggableScopeHelpers; //para poder utilizar el findBySlugOrFail en el controlador FrontController

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $table = "subcategories"; //Indicando a que tabla o migración apunta.

    protected $fillable = ['name','category_id']; //esto indica que campos queremos que traiga de la DB.
    
    public function category(){

        return $this->belongsTo('App\Category');
    }

}
