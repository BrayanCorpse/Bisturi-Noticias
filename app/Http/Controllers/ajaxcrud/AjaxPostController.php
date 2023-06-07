<?php

namespace App\Http\Controllers\ajaxcrud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\json;

class AjaxPostController extends Controller
{
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $nameUser = Auth::user()->name;
        if (file_exists(public_path('storage/'.$nameUser.'/'.$image->name))) {
            unlink(public_path('storage/'.$nameUser.'/'.$image->name));
        }
        $image->delete();
        return response()->json('succes', 200);
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
