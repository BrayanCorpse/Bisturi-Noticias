<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Category extends Model{

    use Sluggable;
    use SluggableScopeHelpers; //para poder utilizar el findBySlugOrFail en el controlador FrontController

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    protected $table = "categories"; //Indicando a que tabla o migración apunta.

    protected $fillable = ['name']; //esto indica que campos queremos que traiga de la DB.


    public function articles(){

        return $this->hasMany('App\Article');
    }

    public function categorys(){

        return $this->hasMany('App\Subcategory');
    }


// SCOPE
    public function scopeSearchCategory($query, $name){
        return $query->where('name', '=', $name);
    }
}
