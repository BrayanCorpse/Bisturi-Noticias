<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->simplePaginate(5);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        // $request->validate([
        //     'name' => 'required|max:5',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'type' => 'required'
        // ]); //quitamos esto ya que utilizamos la validación personalizada.


        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        //uso de laracasts
        flash('Se ha registrado ' . "<b>".$user->name."</b>" . ' de forma exitosa!!')->success()->important();

        return  redirect()->route('users.index');


       // return back()->with('mensaje', 'Usuario creado correctamente.'); //para redirigir a la misma vista.
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
        // dd($id);
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->save();

        flash('El Usuario ' . "<b>" . $user->name . "</b>" . ' ha sido editado exitosamente')->important(); //uso de flash para mostrar mensaje.
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        flash('El Usuario ' . "<b>" . $user->name . "</b>" . ' ha sido eliminado exitosamente')->important(); //uso de flash para mostrar mensaje.
        return redirect()->route('users.index');

    }
}
