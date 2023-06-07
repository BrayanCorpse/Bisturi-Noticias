<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Tag;
use App\Models\Article;
use App\Models\Image;
use App\Models\User;
use App\Models\Tipo;
use App\Http\Requests\ArticleRequest;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Auth;

class RootController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function allArticles(Request $request){

        if(Auth::user()->type == 'root'){

            $articles = Article::select('id','title','category_id',
            'created_at','user_id','status','tipo_id','deleted_at')
            ->orderBy('created_at','DESC')
            ->withTrashed()
            ->simplePaginate(5);

            $articles->each(function($articles){
                $articles->category;
                $articles->user;
                $articles->images;
                $articles->tipo;
            });

            $articleCount = Article::select('id')
            ->withTrashed()
            ->get();     

            $count = count($articleCount);

            $distinctipos = Tipo::select('id','name')->get();

            $disUser = User::select('id','name')
                    ->where('type','!=', 'root')
                    ->get();

            return view('admin.articles.allArticles',compact('articles','count','distinctipos','disUser'));

        }
        else{
            Auth::logout();
            return redirect('/login');
        }
    }

    public function changeData(Request $request, $id){

        if(Auth::user()->type == 'root'){
    
            $article = Article::findOrFail($id);
            $article->tipo_id = $request->tipo_id;
            $article->user_id = $request->user_id;
            $article->save();

            return redirect()->route('articles.allArticles');
        }
        else{
            Auth::logout();
            return redirect('/login');
        }
    }

}
