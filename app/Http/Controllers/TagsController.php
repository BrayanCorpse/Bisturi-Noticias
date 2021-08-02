<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests\TagRequest;


class TagsController extends Controller
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
    public function index(Request $request)
    {

        $tag = Tag::search($request->name)->orderBy('id', 'ASC')->simplePaginate(5);
        return view('admin.tags.index', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $tag = new Tag($request->all());
        $tag->save();

        // flash('El tag ' . "<b>".$tag->name."</b>" . ' se ha creado exitosamente!!')->success()->important();
        // return redirect()->route('tags.index');

        $message = "la etiqueta ".$tag->name." se ha creado exitosamente!!";
        echo json_encode(compact('message'));
    }

    public function search(Request $request){
        $term = $request->term ?: '';
        $tags = Tag::where('name', 'like', $term.'%')->pluck('name', 'id');
        $valid_tags = [];
        foreach ($tags as $id => $tag) {
            $valid_tags[] = ['id' => $id, 'text' => $tag];
        }
        // return \Response::json($valid_tags);

        return response()->json($valid_tags, 200);
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
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();

        flash('El Tag ' . '<b>' . $tag->name . '</b>' . ' a sido editado exitosamente')->important(); //uso de flash para mostrar mensaje.
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        flash('El Tag ' . '<b>' . $tag->name  . '</b>' . ' ha sido eliminado exitosamente')->important(); //uso de flash para mostrar mensaje.
        return redirect()->route('tags.index');
    }
}
