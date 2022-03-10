<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;


class AnalyticsController extends Controller
{
    public function analyticsReport(){

        $reports = Report::orderBy('created_at', 'DESC')->simplePaginate(3);

        return view('admin.components.analytics', compact('reports'));
    }

    public function create(){
        return view('admin.analytics.create');
    }

    public function store(Request $request){

            if ($request->file('name')) {

                $file = $request->file('name');
                $random = Str::random(40);
                $fileName  = $random. $file->getClientOriginalName();
                $file->move(public_path('storage'.'/'.'GoogleAnalytics'.'/'),$fileName);

                $report = new Report();
                $report->name = $fileName;
                $report->title = $request->title;
                $report->date =  $request->date;
                $report->save();  
                     
            }

        flash('Se ha guardado el reporte ' . "<b>".$report->name."</b>" . ' de forma exitosa!!')->success()->important();
        return redirect()->route('analytics.report');
    }
}
