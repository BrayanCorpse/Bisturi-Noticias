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
use App\Http\Requests\ArticleRequest;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexPublics(Request $request){

        // $start = microtime(true);

        $articles = Article::select('id','title','category_id',
            'created_at','user_id','status','tipo_id')
            ->where('user_id', '=', \Auth::user()->id)
            ->where('status', '=', 'publico')
            ->orderBy('created_at','DESC')
            ->whereNull('deleted_at')
            ->simplePaginate(5);

        $articles->each(function($articles){
            $articles->category;
            $articles->user;
            $articles->images;
            $articles->tipo;
        });
            
        $articleCount = Article::select('id')
                ->where('user_id', '=', \Auth::user()->id)
                ->where('status', '=', 'publico')
                ->whereNull('deleted_at')
                ->get();     
        
        $count = count($articleCount);

        $distinctipos = Tipo::select('id','name')->get();

        // $end = microtime(true);
        // $execution_time = ($end - $start);
        // echo("Tiempo de ejecución: " . $execution_time . " segundos");
        
        return view('admin.articles.indexPublics')
        ->with('articles',$articles)
        ->with('count',$count)
        ->with('distinctipos',$distinctipos);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        // $start = microtime(true);

        $articles = Article::select('id','title','category_id','created_at',
            'updated_at','user_id','status','tipo_id')
            ->where('user_id', '=', \Auth::user()->id)
            ->where('status', '=', 'borrador')
            ->orderBy('created_at','DESC')
            ->whereNull('deleted_at')
            ->simplePaginate(5);

        $articles->each(function($articles){
            $articles->category;
            $articles->user;
            $articles->images;
        });

        $articleCount = Article::select('id')
        ->where('user_id', '=', \Auth::user()->id)
        ->where('status', '=', 'borrador')
        ->whereNull('deleted_at')
        ->get();     

        $count = count($articleCount);

        // $end = microtime(true);
        // $execution_time = ($end - $start);
        // echo("Tiempo de ejecución: " . $execution_time . " segundos");

        return view('admin.articles.index')
        ->with('articles',$articles)
        ->with('count',$count);

    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexSoftDeletes(Request $request){

        // $start = microtime(true);

        $articles = Article::select('id','title','category_id',
            'deleted_at','user_id','status','tipo_id')
            ->where('user_id', '=', \Auth::user()->id)
            ->whereNotNull('deleted_at')
            ->orderBy('deleted_at','DESC')
            ->onlyTrashed()
            ->simplePaginate(5);
        
        $articles->each(function($articles){
            $articles->category;
            $articles->user;
            $articles->images;
        });

        $articleCount = Article::select('id')
                ->where('user_id', '=', \Auth::user()->id)
                ->whereNotNull('deleted_at')
                ->onlyTrashed()
                ->get();
        
        $count = count($articleCount);

        // $end = microtime(true);
        // $execution_time = ($end - $start);
        // echo("Tiempo de ejecución: " . $execution_time . " segundos");

        return view('admin.articles.indexSoftDeletes')
        ->with('articles',$articles)
        ->with('count',$count);

    }


    public function changeStatus($id){

        $article = Article::findOrFail($id);
        $article->status = 'publico';
        $article->save();

        return redirect()->route('articles.indexPublics');
    }

    public function changeSection(Request $request, $id){

        $article = Article::findOrFail($id);
        $article->tipo_id = $request->tipo_id;
        $article->save();

        return redirect()->route('articles.indexPublics');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')
            ->orderBy('name','desc')->get();

        $tags = DB::table('tags')
            ->orderBy('name', 'desc')->get();

        $subcategories = DB::table('subcategories')
            ->orderBy('id', 'desc')->get();

        $tipos = Tipo::all();

        return view('admin.articles.create', compact('categories', 'tags', 'subcategories','tipos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        // Manipulación de imagenes
            if ($request->file('image')) {

                $article = new Article($request->all());
                $article->user_id = \Auth::user()->id;
                $article->save();
                $article->tags()->sync($request->tags);
                foreach ($request->image as $key => $value) {

                    // dd($request->file('image'));
                    $nameUser = \Auth::user()->name;
                    // dd($nameUser);
                    $file = $request->file('image')[$key];
                    $random = Str::random(40);
                    $fileName  = $random. $file->getClientOriginalName();
                    $file->move(public_path('storage'.'/'.$nameUser.'/'),$fileName);
                    $name = $fileName;

                    // $name = 'blogimage' . time() . '.' . $file->getClientOriginalExtension();
                    // $name = 'blogimage' . $file->getClientOriginalName();
                    // $path = public_path() . '/images' . '/' . $nameUser;
                    // $file->move($path, $name);

                    $image = new Image();
                    $image->name=$name;
                    $image->article()->associate($article);
                    $image->save();
                }
            }

        flash('Se ha creado el articulo ' . "<b>".$article->title."</b>" . ' de forma exitosamente!!')->success()->important();
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);


        $categories = Category::orderBy('name', 'DESC')->pluck('name', 'id');

        $distinctcategory = Category::where('id','!=',$article->category->id)->get();

        // $my_tags = $article->tags[0]->id;
        $selectedTag=\DB::select("SELECT tg.`id`, tg.`name`
        FROM article_tag AS artg
        INNER JOIN tags AS tg ON tg.`id` = artg.`tag_id`
        INNER JOIN articles AS art ON art.`id` = artg.`article_id`
        WHERE artg.`article_id`  = ?",[$id]);

        $tags = Tag::where('id','!=',$article->tags[0]->id)->get();
        // dd($article->images);

        $subcategories = DB::table('subcategories')
        ->orderBy('id', 'ASC')->get();

        $tipos = Tipo::all();

        $distinctipos = Tipo::where('id','!=',$article->tipo_id)->get();

        return view('admin.articles.edit', compact('article','categories','distinctcategory','selectedTag' ,'tags', 'subcategories','tipos','distinctipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        if ($request->file('image')) {

            $article = Article::find($id);
            $article->fill($request->all());
            $article->save();
            $article->tags()->sync($request->tags);
            foreach ($request->image as $key => $value) {
                
                // dd($request->file('image'));
                $nameUser = \Auth::user()->name;
                // dd($nameUser);
                $file = $request->file('image')[$key];
                $random = Str::random(40);
                $fileName  = $random. $file->getClientOriginalName();
                $file->move(public_path('storage'.'/'.$nameUser.'/'),$fileName);
                $name = $fileName;

                $image = new Image();
                $image->name=$name;
                $image->article()->associate($article);
                $image->save();
            }

        }
        else{

            $article = Article::find($id);
            $article->fill($request->all());
            $article->save();
            $article->tags()->sync($request->tags);
        }


        $article->tags()->sync($request->tags);
        
        flash('Se ha editado el articulo ' . "<b>".$article->title."</b>" . ' de forma exitosamente!!')->success()->important();
        return redirect()->route('articles.index');
    }

    public function SoftDelete($id){

        $article = Article::find($id);
        $article->delete();

        if($article->status == 'publico'){
            flash('El articulo ' . '<b>' . $article->title  . '</b>' . ' ha sido mandado a la papelera de reciclaje')->important(); //uso de flash para mostrar mensaje.
            return redirect()->route('articles.indexPublics');
        }
        else{
            flash('El articulo ' . '<b>' . $article->title  . '</b>' . ' ha sido mandado a la papelera de reciclaje')->important(); //uso de flash para mostrar mensaje.
            return redirect()->route('articles.index');
        }

        
    }

    public function restore($id){

        $article = Article::withTrashed()->find($id);
        $article->restore();

        if($article->status == 'publico'){
            return redirect()->route('articles.indexPublics');
        }
        else{
            return redirect()->route('articles.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $article = Article::withTrashed()->find($id);
        
        $images=\DB::select("SELECT ima.`name` as 'name' 
        FROM images AS ima
        WHERE ima.`article_id` = ?",[$id]);

        foreach ($images as $image) {
            $nameUser = \Auth::user()->name;
            if (file_exists(public_path('storage/'.$nameUser.'/'.$image->name))) {
              unlink(public_path('storage/'.$nameUser.'/'.$image->name));
            }
          }

        $article->forceDelete();
               
        flash('El articulo ' . '<b>' . $article->title  . '</b>' . ' ha sido eliminado exitosamente')->important(); //uso de flash para mostrar mensaje.
        return redirect()->route('articles.indexSoftDeletes');
    }

}
