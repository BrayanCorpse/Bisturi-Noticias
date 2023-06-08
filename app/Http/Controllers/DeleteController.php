<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $nameUser = Auth::user()->name; 
        if (file_exists(public_path('storage/'.$nameUser.'/'.$image->name))) {
            unlink(public_path('storage/'.$nameUser.'/'.$image->name));
        }
        $image->delete();
        return redirect()->back()->with('status', 'imagen eliminada');   
    }
}
