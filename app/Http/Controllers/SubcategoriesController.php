<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
use DB;
class SubcategoriesController extends Controller
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
    public function index()
    {
        $subcategories = Subcategory::orderBy('id', 'ASC')->simplePaginate(5);
        
        $subcategories->each(function($subcategories){
            $subcategories->category;
        });

        // dd($subcategories);
        return view('admin.subcategories.index', compact('subcategories'));
        // ritapires
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('id','!=',19)->get();
        return view('admin.subcategories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $subcategory = new Subcategory($request->all());
        $subcategory->save();

        flash('La subcategoria ' . "<b>".$subcategory->name."</b>" . ' se ha registrado exitosamente!!')->success()->important();
        return redirect()->route('subcategories.index');
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

        $subcategory = Subcategory::find($id);
        $categories =DB::table('categories')
                        ->where('id','!=',19)
                        ->where('id','!=',$subcategory->category_id)
                        ->get();
        $subcategory->each(function($subcategory){
            $subcategory->category;
        });
        return view('admin.subcategories.edit', compact('subcategory','categories'));
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
        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->save();

        flash('La subcategoria ' . "<b>" . $subcategory->name . "</b>" . ' ha sido editada exitosamente')->important(); //uso de flash para mostrar mensaje.
        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();

        flash('La subcategoría ' ."<b>" . $subcategory->name . "</b>" . ' ha sido eliminada exitosamente')->important(); //uso de flash para mostrar mensaje.
        return redirect()->route('subcategories.index');
    }
}
