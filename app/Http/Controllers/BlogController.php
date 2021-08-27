<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Tag;
use App\Article;
use App\Image;
use App\User;
use App\Tipo;
use DB;
use Jenssegers\Date\Date;
use Illuminate\Pagination\LengthAwarePaginator;
use Cviebrock\EloquentSluggable\findBySlugOrFail;
use Illuminate\Support\Str;



class BlogController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(){
        
        $articles = Article::where('status', '=', 'publico')
                    ->where('category_id', '!=', 19)
                    ->where('tipo_id', '=', 1)
                    ->whereNull('deleted_at')
                    ->orderBy('updated_at', 'DESC')
                    ->limit(1)->get();
        $articles->each(function($articles){
            $articles->category;
            $articles->tags;
            $articles->images;
            $articles->user;
        });


        $lastgeneralNews = Article::where('status', '=', 'publico')
                    ->where('category_id', '!=', 19)
                    ->where('tipo_id', '=', 1)
                    ->where('updated_at','!=',$articles[0]->updated_at)
                    ->whereNull('deleted_at')
                    ->orderBy('updated_at', 'DESC')
                    ->limit(3)->get();
        $lastgeneralNews->each(function($lastgeneralNews){
            $lastgeneralNews->category;
            $lastgeneralNews->tags;
            $lastgeneralNews->images;
            $lastgeneralNews->user;
        });

        // dd($lastgeneralNews);

        $clicks = Article::where('category_id',19)
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

        $latest = Article::where('category_id','!=',19)
                ->where('status', '=', 'publico')
                ->where('tipo_id','=',2)
                ->whereNull('deleted_at')
                ->limit(4)->get();
        $latest->each(function($latest){
            $latest->category;
            $latest->tags;
            $latest->images;
            $latest->user;
        });
  
        return view('front.sections.home', compact('articles','clicks','latest','lastgeneralNews'));
        
    }

    public function opinion(){

        $articles = Article::where('category_id',15)
                ->where('status', '=', 'publico')
                ->where('tipo_id', '=', 1)
                ->whereNull('deleted_at')
                ->orderBy('updated_at', 'DESC')
                ->limit(1)->get();
        $articles->each(function($articles){
            $articles->category;
            $articles->tags;
            $articles->images;
            $articles->user;
        });

        $update = Article::where('category_id',15)
                ->where('tipo_id','=',1)
                ->orderBy('updated_at', 'DESC')->limit(1)->get();

        $update = $update[0]->updated_at;

        $categories = Article::where('category_id',15)
                ->where('status', '=', 'publico')
                ->where('tipo_id', '!=',2)
                ->where('updated_at', '!=', $update)
                ->whereNull('deleted_at')
                ->orderBy('updated_at', 'DESC')
                ->limit(2)->get();
        $categories->each(function($categories){
            $categories->category;
            $categories->tags;
            $categories->images;
            $categories->user;
        });

        // $lastnew = Article::where('category_id',15)
        //         ->where('tipo_id','=',2)
        //         ->orderBy('updated_at', 'DESC')->limit(1)->get();

        // $last = $lastnew[0]->updated_at;

        $latest = Article::where('category_id',15)
                ->where('status', '=', 'publico')
                ->where('tipo_id','=',2)
                ->whereNull('deleted_at')
                ->paginate(6);
        $latest->each(function($latest){
            $latest->category;
            $latest->tags;
            $latest->images;
            $latest->user;
        });
        
        return view('front.sections.opinion')
        ->with('articles',$articles)
        ->with('categories',$categories)
        ->with('latest',$latest);
    }

    public function culturayEspectaculos(){

        $articles = Article::where('category_id',16)
                ->where('status', '=', 'publico')
                ->where('tipo_id', '=', 1)
                ->whereNull('deleted_at')
                ->orderBy('updated_at', 'DESC')
                ->limit(1)->get();
        $articles->each(function($articles){
            $articles->category;
            $articles->tags;
            $articles->images;
            $articles->user;
        });

        $update = Article::where('category_id',16)
                ->where('tipo_id','=',1)
                ->orderBy('updated_at', 'DESC')->limit(1)->get();

        $update = $update[0]->updated_at;

        $categories = Article::where('category_id',16)
                ->where('status', '=', 'publico')
                ->where('tipo_id', '!=',2)
                ->where('updated_at', '!=', $update)
                ->whereNull('deleted_at')
                ->orderBy('updated_at', 'DESC')
                ->limit(2)->get();
        $categories->each(function($categories){
            $categories->category;
            $categories->tags;
            $categories->images;
            $categories->user;
        });

        // $lastnew = Article::where('category_id',15)
        //         ->where('tipo_id','=',2)
        //         ->orderBy('updated_at', 'DESC')->limit(1)->get();

        // $last = $lastnew[0]->updated_at;

        $latest = Article::where('category_id',16)
                ->where('status', '=', 'publico')
                ->where('tipo_id','=',2)
                ->whereNull('deleted_at')
                ->paginate(6);
        $latest->each(function($latest){
            $latest->category;
            $latest->tags;
            $latest->images;
            $latest->user;
        });
        
        return view('front.sections.culturayEspectaculos')
        ->with('articles',$articles)
        ->with('categories',$categories)
        ->with('latest',$latest);
    }

    public function salud(){

        $articles = Article::where('category_id',17)
                ->where('status', '=', 'publico')
                ->where('tipo_id', '=', 1)
                ->whereNull('deleted_at')
                ->orderBy('updated_at', 'DESC')
                ->limit(1)->get();
        $articles->each(function($articles){
            $articles->category;
            $articles->tags;
            $articles->images;
            $articles->user;
        });

        $update = Article::where('category_id',17)
                ->where('tipo_id','=',1)
                ->orderBy('updated_at', 'DESC')->limit(1)->get();

        $update = $update[0]->updated_at;


        $categories = Article::where('category_id',17)
                ->where('status', '=', 'publico')
                ->where('tipo_id', '!=',2)
                ->where('updated_at', '!=', $update)
                ->whereNull('deleted_at')
                ->orderBy('updated_at', 'DESC')
                ->limit(2)->get();
        $categories->each(function($categories){
            $categories->category;
            $categories->tags;
            $categories->images;
            $categories->user;
        });

        // $lastnew = Article::where('category_id',15)
        //         ->where('tipo_id','=',2)
        //         ->orderBy('updated_at', 'DESC')->limit(1)->get();

        // $last = $lastnew[0]->updated_at;

        $latest = Article::where('category_id',17)
                ->where('status', '=', 'publico')
                ->where('tipo_id','=',2)
                ->whereNull('deleted_at')
                ->paginate(6);
        $latest->each(function($latest){
            $latest->category;
            $latest->tags;
            $latest->images;
            $latest->user;
        });
        
        return view('front.sections.salud')
        ->with('articles',$articles)
        ->with('categories',$categories)
        ->with('latest',$latest);
    }

    public function deportes(){

        $articles = Article::where('category_id',18)
                ->where('status', '=', 'publico')
                ->where('tipo_id', '=', 1)
                ->whereNull('deleted_at')
                ->orderBy('updated_at', 'DESC')
                ->limit(1)->get();
        $articles->each(function($articles){
            $articles->category;
            $articles->tags;
            $articles->images;
            $articles->user;
        });

        $update = Article::where('category_id',18)
                ->where('tipo_id','=',1)
                ->orderBy('updated_at', 'DESC')->limit(1)->get();

        $update = $update[0]->updated_at;


        $categories = Article::where('category_id',18)
                ->where('status', '=', 'publico')
                ->where('tipo_id', '!=',2)
                ->where('updated_at', '!=', $update)
                ->whereNull('deleted_at')
                ->orderBy('updated_at', 'DESC')
                ->limit(2)->get();
        $categories->each(function($categories){
            $categories->category;
            $categories->tags;
            $categories->images;
            $categories->user;
        });
  
        // $lastnew = Article::where('category_id',15)
        //         ->where('tipo_id','=',2)
        //         ->orderBy('updated_at', 'DESC')->limit(1)->get();

        // $last = $lastnew[0]->updated_at;

        $latest = Article::where('category_id',18)
                ->where('status', '=', 'publico')
                ->where('tipo_id','=',2)
                ->whereNull('deleted_at')
                ->paginate(6);
        $latest->each(function($latest){
            $latest->category;
            $latest->tags;
            $latest->images;
            $latest->user;
        });
        
        return view('front.sections.deportes')
        ->with('articles',$articles)
        ->with('categories',$categories)
        ->with('latest',$latest);
    }

    public function showArticle($category,$slug){

        $article = Article::findBySlugOrFail($slug);
        $article->category;
        $article->user;
        $article->images;

        $generals = Article::where('status', '=', 'publico')
                ->where('category_id','!=','19')
                ->where('tipo_id','=',1)
                ->whereNull('deleted_at')
                ->orderBy('updated_at', 'ASC')
                ->limit(3)->get();
        $generals->each(function($generals){
            $generals->category;
            $generals->tags;
            $generals->images;
            $generals->user;
        });
        
        // dd($article);

        return view('front.posts.showArticle', compact('article','generals'));

    }
    
}
