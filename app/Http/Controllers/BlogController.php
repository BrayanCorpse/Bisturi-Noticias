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
        
        $articles = Article::select('id','title','summary','category_id','user_id',
            'created_at','slug','author','excerpt')
                ->where('status', '=', 'publico')
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

        $lastNewPhoto = Article::select('id','title','summary','author',
        'category_id','user_id','created_at','slug')
                ->where('status', '=', 'publico')
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

        $lastNewText = Article::select('id','title','summary','excerpt','author',
        'category_id','user_id','created_at','slug')
                ->where('status', '=', 'publico')
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

        $clicks = Article::select('id','title','summary','excerpt','author','category_id',
        'user_id','created_at','slug')
                ->where('tipo_id',7)
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

    public function categories($categorySlug){
 
        if( DB::table('categories')->where('slug', $categorySlug)->doesntExist() ){
            return response()->view('front.errors.404', [], 404);
        }
        elseif( $categorySlug == 'opinion' ){
            return $this->opinion();
        }
        elseif( $categorySlug == 'clicks'){
            return $this->clicks();
        }
        else{
            return $this->sections($categorySlug);
        }

    }

    public function sections($categorySlug){

        // $start = microtime(true);

        $categoryId = DB::table('categories')
            ->select('id')
            ->where('slug', $categorySlug)
            ->get();

        $catId = $categoryId->implode('id'); 
            
        $articles = Article::select('id','title','summary','category_id',
        'user_id','created_at','slug','author','excerpt')
                ->where('category_id',$catId)
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

        $categories = Article::select('id','title','summary',
        'category_id','user_id','slug','author')
                ->where('category_id',$catId)
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

            // $end = microtime(true);
            // $execution_time = ($end - $start);
    
            // dd("Tiempo de ejecución: " . $execution_time . " segundos");
            return view('front.sections.'.$categorySlug, compact('articles','categories'));

    }

    public function opinion(){

        $latest = Article::select('id','title','summary','subcategoria','category_id','user_id',
            'created_at','slug')
                ->where('category_id',15)
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

        return view('front.sections.opinion')
        ->with('latest',$latest);
    }

    public function clicks(){

        $clicks = Article::select('id','title','excerpt','category_id','user_id','created_at')
                ->where('status', '=', 'publico')
                ->where('tipo_id', '=',7)
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->paginate(6);

        $clicks->each(function($clicks){
                $clicks->category;
                $clicks->images;
                $clicks->user;
            });

        return view('front.posts.clicks', compact('clicks'));
                        
    }

    public function showArticle($category, $slug){

        if( DB::table('categories')->where('slug', $category)->doesntExist() ){
            return response()->view('front.errors.404', [], 404);
        }
        elseif(DB::table('articles')->where('slug', $slug)->doesntExist()){
            return response()->view('front.errors.404', [], 404);
        }
        elseif(DB::table('artcategory')->where('slug',$slug)->where('catslug',$category)->doesntExist()){
            return response()->view('front.errors.404', [], 404);
        }
        else{
            // Capturamos el tiempo de inicio
            // $start = microtime(true);

            // findBySlugOrFail($slug);
            $article = Article::select('id','title','summary','content','category_id',
            'user_id','created_at','slug','author','subcategoria','excerpt')
                    ->where('slug', $slug)
                    ->get();
            $article->each(function($article){
                $article->category;
                $article->tags;
                $article->user;
            });

            $generals = Article::select('id','title','slug','category_id','user_id')
                    ->where('status', '=', 'publico')
                    ->whereNotIn('tipo_id', [2, 3, 7])
                    ->where('created_at', '!=', $article[0]->created_at)
                    ->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')
                    ->limit(7)->get();
            $generals->each(function($generals){
                $generals->category;
                $generals->tags;
                $generals->images;
                $generals->user;
            });

            
            // $end = microtime(true);
            // $execution_time = ($end - $start);

            // echo "Tiempo de ejecución: " . $execution_time . " segundos";

            return view('front.posts.showArticle', compact('article','generals'));
        }    

    }
    
    public function showTagPosts($tagName,$tagId){

        if(DB::table('tags')->where('name', $tagName)->where('id',$tagId)->doesntExist()){
            return response()->view('front.errors.404', [], 404);;
        }
        else{
            // // Capturamos el tiempo de inicio
            // $start = microtime(true);

            $articles = DB::table('article_tag')
            ->join('articles', 'articles.id', '=', 'article_tag.article_id')
            ->join('categories', 'categories.id', '=', 'articles.category_id')
            ->join('users', 'users.id', '=', 'articles.user_id')
            ->select('articles.*', 'categories.name As cname',  'categories.slug As catslug', 'users.name AS uname','users.id As userId','article_tag.article_id')
            ->where('article_tag.tag_id', '=', $tagId)
            ->where('status', '=', 'publico')
            ->whereNotIn('tipo_id', [2, 3, 7])
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'DESC')
            ->paginate(6);   

            $images = DB::table('images')
                ->select('images.name AS imgname', 'images.article_id AS artid') 
                ->get();  


            $tags = DB::select("SELECT tg.`id`, tg.`name`, artg.`article_id`
                FROM article_tag AS artg
                INNER JOIN articles AS art ON art.`id` = artg.`article_id`
                INNER JOIN tags AS tg ON tg.`id` = artg.`tag_id`");

            // $end = microtime(true);
            // $execution_time = ($end - $start);

            // dd("Tiempo de ejecución: " . $execution_time . " segundos");
        

            return view('front.posts.tagPosts', compact('articles','tags','images','tagName'));

        }       
    }

    public function showAuthorPosts($userName){

        $userName = Str::title(str_replace('-', ' ', $userName));

        if( DB::table('users')->where('name', $userName)->doesntExist() ){
            return response()->view('front.errors.404', [], 404);
        }
        else{
           
            $user = DB::table('users')
                ->select('users.id', 'users.name') 
                ->where('users.name', '=', $userName)
                ->get();  
    
            $articles = Article::select('id','title','slug','category_id','user_id','created_at')
                        ->where('user_id',$user[0]->id)
                        ->where('status', '=', 'publico')
                        ->whereNotIn('tipo_id', [2, 3, 7])
                        ->whereNull('deleted_at')
                        ->orderBy('created_at', 'DESC')
                        ->paginate(6);
                
            $articles->each(function($articles){
                $articles->category;
                $articles->tags;
                $articles->images;
                $articles->user;
            });
    
            return view('front.posts.authorPosts', compact('articles', 'userName'));
        }  

    }
    
}
