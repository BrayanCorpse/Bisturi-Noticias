<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\User;

class ImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $images = Image::paginate(12);


        $images->each(function($images){
            $images->article;
            // $images->article->;
            $images->userImage = User::find($images->article->user_id)->name;

            // dd($images->userImage);


            // $article->user_id = \Auth::user()->id;
        });

        // dd($images);
        return view('admin.images.index', compact('images'));

    }

}
