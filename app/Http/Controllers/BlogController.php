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
use Illuminate\Support\Facades\DB;
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
                    ->where('tipo_id', '=', 4)
                    ->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')
                    ->limit(1)->get();
        $articles->each(function($articles){
            $articles->category;
            $articles->tags;
            $articles->images;
            $articles->user;
        });

        $lastNewPhoto = Article::where('status', '=', 'publico')
                    ->where('tipo_id', '=', 5)
                    ->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')
                    ->limit(1)->get();
            $lastNewPhoto->each(function($lastNewPhoto){
            $lastNewPhoto->category;
            $lastNewPhoto->tags;
            $lastNewPhoto->images;
            $lastNewPhoto->user;
            });



        $lastNewText = Article::where('status', '=', 'publico')
                    ->where('tipo_id', '=', 6)
                    ->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')
                    ->limit(1)->get();
        $lastNewText->each(function($lastNewText){
            $lastNewText->category;
            $lastNewText->tags;
            $lastNewText->images;
            $lastNewText->user;
        });

       
        // dd($lastgeneralNews);

        $clicks = Article::where('tipo_id',7)
                ->where('status', '=', 'publico')
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->limit(1)->get();
        $clicks->each(function($clicks){
            $clicks->category;
            $clicks->tags;
            $clicks->images;
            $clicks->user;
        });

        return view('front.sections.home', compact('articles','clicks','lastNewText','lastNewPhoto'));
        
    }

    public function informacionGeneral(){

        $articles = Article::where('category_id',21)
                ->where('status', '=', 'publico')
                ->whereNotIn('tipo_id', [2, 3, 7])
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->limit(1)->get();
        $articles->each(function($articles){
            $articles->category;
            $articles->tags;
            $articles->images;
            $articles->user;
        });

        $categories = Article::where('category_id',21)
                ->where('status', '=', 'publico')
                ->whereNotIn('tipo_id', [2, 3, 7])
                ->where('created_at', '!=', $articles[0]->created_at)
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->paginate(2);
        // dd($categories);
        $categories->each(function($categories){
            $categories->category;
            $categories->tags;
            $categories->images;
            $categories->user;
        });

        // dd($categories);

        return view('front.sections.informacionGeneral')
        ->with('articles',$articles)
        ->with('categories',$categories);
    }

    public function opinion(){

        $latest = Article::where('category_id',15)
                ->where('status', '=', 'publico')
                ->where('tipo_id','=',2)
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->paginate(8);
        $latest->each(function($latest){
            $latest->category;
            $latest->tags;
            $latest->images;
            $latest->user;
        });
        
        return view('front.sections.opinion')->with('latest',$latest);
    }

    public function telonyEspectaculos(){

        $articles = Article::where('category_id',16)
                ->where('status', '=', 'publico')
                ->whereNotIn('tipo_id', [2, 3, 7])
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->limit(1)->get();
        $articles->each(function($articles){
            $articles->category;
            $articles->tags;
            $articles->images;
            $articles->user;
        });

        $categories = Article::where('category_id',16)
                ->where('status', '=', 'publico')
                ->whereNotIn('tipo_id', [2, 3, 7])
                ->where('created_at', '!=', $articles[0]->created_at)
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->paginate(2);
        $categories->each(function($categories){
            $categories->category;
            $categories->tags;
            $categories->images;
            $categories->user;
        });

        return view('front.sections.telonyEspectaculos')
        ->with('articles',$articles)
        ->with('categories',$categories);
    }

    public function emergencias(){

        $articles = Article::where('category_id',20)
                ->where('status', '=', 'publico')
                ->whereNotIn('tipo_id', [2, 3, 7])
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->limit(1)->get();
        $articles->each(function($articles){
            $articles->category;
            $articles->tags;
            $articles->images;
            $articles->user;
        });

        $categories = Article::where('category_id',20)
                ->where('status', '=', 'publico')
                ->whereNotIn('tipo_id', [2, 3, 7])
                ->where('created_at', '!=', $articles[0]->created_at)
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->paginate(2);
        $categories->each(function($categories){
            $categories->category;
            $categories->tags;
            $categories->images;
            $categories->user;
        });

        
        return view('front.sections.emergencias')
        ->with('articles',$articles)
        ->with('categories',$categories);
    }


    public function salud(){

        $articles = Article::where('category_id',17)
                ->where('status', '=', 'publico')
                ->whereNotIn('tipo_id', [2, 3, 7])
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->limit(1)->get();
        $articles->each(function($articles){
            $articles->category;
            $articles->tags;
            $articles->images;
            $articles->user;
        });

        $categories = Article::where('category_id',17)
                ->where('status', '=', 'publico')
                ->whereNotIn('tipo_id', [2, 3, 7])
                ->where('created_at', '!=', $articles[0]->created_at)
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->paginate(2);
        $categories->each(function($categories){
            $categories->category;
            $categories->tags;
            $categories->images;
            $categories->user;
        });

        return view('front.sections.salud')
        ->with('articles',$articles)
        ->with('categories',$categories);
    }

    public function deportes(){

        $articles = Article::where('category_id',18)
                ->where('status', '=', 'publico')
                ->whereNotIn('tipo_id', [2, 3, 7])
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->limit(1)->get();
        $articles->each(function($articles){
            $articles->category;
            $articles->tags;
            $articles->images;
            $articles->user;
        });

        $categories = Article::where('category_id',18)
                ->where('status', '=', 'publico')
                ->whereNotIn('tipo_id', [2, 3, 7])
                ->where('created_at', '!=', $articles[0]->created_at)
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->paginate(2);
        $categories->each(function($categories){
            $categories->category;
            $categories->tags;
            $categories->images;
            $categories->user;
        });
        
        return view('front.sections.deportes')
        ->with('articles',$articles)
        ->with('categories',$categories);
    }

    public function clicks(){

        $clicks = Article::where('status', '=', 'publico')
                    ->where('tipo_id', '=',7)
                    ->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(6);

        $clicks->each(function($clicks){
                $clicks->category;
                $clicks->tags;
                $clicks->images;
                $clicks->user;
            });

        return view('front.posts.clicks', compact('clicks'));
                        
    }

    public function showArticle($category,$slug){

        $article = Article::findBySlugOrFail($slug);
        $article->each(function($article){
            $article->category;
            $article->tags;
            $article->images;
            $article->user;
        });

        // dd($article->images[0]->name);

        $generals = Article::where('status', '=', 'publico')
                ->whereNotIn('tipo_id', [2, 3, 7])
                ->where('created_at', '!=', $article->created_at)
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->limit(7)->get();
        $generals->each(function($generals){
            $generals->category;
            $generals->tags;
            $generals->images;
            $generals->user;
        });
        

        return view('front.posts.showArticle', compact('article','generals'));

    }

    public function getTime(){
        list($usec, $sec) = explode(" ", microtime());
        return (float) $usec + (float) $sec;
    }

    public function showTagPosts($tagName,$tagId){

        $articles = DB::table('article_tag')
            ->join('articles', 'articles.id', '=', 'article_tag.article_id')
            ->join('categories', 'categories.id', '=', 'articles.category_id')
            ->join('users', 'users.id', '=', 'articles.user_id')
            ->select('articles.*', 'categories.name As cname',  'categories.slug As catslug', 'users.name AS uname','article_tag.article_id')
            ->where('article_tag.tag_id', '=', $tagId)
            ->where('status', '=', 'publico')
            ->whereNotIn('tipo_id', [2, 3, 7])
            ->whereNull('deleted_at')
           
            ->get();    

        $images = DB::table('images')
            ->select('images.name AS imgname', 'images.article_id AS artid') 
            ->get();  


        $tags = DB::select("SELECT tg.`id`, tg.`name`, artg.`article_id`
            FROM article_tag AS artg
            INNER JOIN articles AS art ON art.`id` = artg.`article_id`
            INNER JOIN tags AS tg ON tg.`id` = artg.`tag_id`");
        

        return view('front.posts.tagPosts', compact('articles','tags','images','tagName'));
        
    }
    
}
