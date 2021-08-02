<?php

namespace App\Http\Controllers\ajaxcrud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Article;
use App\Category;
use App\Tag;
use Redirect,Response;
use Illuminate\Support\Facades\Storage;


class AjaxPostController extends Controller
{
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();
        $nameUser = \Auth::user()->name;
        $photoPath = 'public/'.$nameUser.'/'.$image->name;
        Storage::delete($photoPath);
        return response()->json([
            'message' => 'Articulo Eliminado'
        ]); 
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function clicks(){

        $clicks = Article::where('category_id',14)
                ->where('status', '=', 'publico')
                ->whereNull('deleted_at')
                ->orderBy('updated_at', 'DESC')
                ->limit(1)->get();
                
        $clicks->each(function($clicks){
            $clicks->category;
            $clicks->tags;
            $clicks->images;
            $clicks->user;
        });

        // dd($request);
        
        return response()->json($clicks, 200);

    }
}
