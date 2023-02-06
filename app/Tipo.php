<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = "tipos";

    protected $fillable = ['id','name'];

    public function articles(){

        return $this->hasMany('App\Article');
    }
}
