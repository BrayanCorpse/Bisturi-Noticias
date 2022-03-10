<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Pagination\LengthAwarePaginator;

use Cviebrock\EloquentSluggable\findBySlugOrFail;
// use Genert\BBCode\BBCode;

class FrontController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(4);
        $articles->each(function($articles){
            $articles->category;
            $articles->tags;
            $articles->images;
            $articles->user;
            // dd($articles->user);
        });

        return view('admin.template.main', compact('articles'));
        
    }

    public function searchCategory($name){
        $category = Category::searchCategory($name)->first();
        $articles = $category->articles()->paginate(4);
        $articles->each(function($articles){
            $articles->category;
            $articles->tags;
            $articles->images;
        });

        if (count($articles) == 0) {
            flash('No hay articulos con esta categoria: ' . '<b>' . $category->name .'</b>')->success();
        }
        return view('front.index', compact('articles'));

    }
    public function searchTag($name){


        $tag = Tag::searchTag($name)->first();
        $articles = $tag->articles()->paginate(4);

        if (count($articles) == 0) {
            flash('No hay articulos con este tags: ' . '<b>' . $tag->name .'</b>')->success();
        }

        $articles->each(function($articles){
            $articles->category;
            $articles->tags;
            $articles->images;
        });

        return view('front.index', compact('articles'));

    }

    public function showArticle($slug){

        $article = Article::findBySlugOrFail($slug);
        return view('front.posts.showArticle', compact('article'));

    }
}
