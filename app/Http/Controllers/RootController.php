<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Tipo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


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

            $disUser = User::select('id','name')->get();

            return view('admin.articles.allArticles',compact('articles','count','distinctipos','disUser'));

        }
        else{
            Auth::logout();
            return redirect('/login');
        }
    }

    public function changeData(Request $request, $id){

        if(Auth::user()->type == 'root'){

            $oldUser = $request->oldUser;
            $imageName = $request->image;

            foreach($imageName as $image){

                $newUser = User::find($request->user_id);

                $file = public_path('storage/'.$oldUser.'/'.$image);
                $destination = public_path('storage/'.$newUser->name.'/'.$image);
                File::move($file, $destination);

                $article = Article::findOrFail($id);
                $article->tipo_id = $request->tipo_id;
                $article->user_id = $request->user_id;
                $article->save();


            }
                flash('Cambios realizados de forma exitosa!!')->success()->important();
                return redirect()->route('articles.allArticles');
        }
        else{
            Auth::logout();
            return redirect('/login');
        }
    }

}
