<?php

namespace App\Http\Controllers;

use App\Imports\HoroscopesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HoroscopesImportController extends Controller
{
    public function show(){
        return view('admin.horoscopes.import');
    }

    public function store(Request $request){
        $file = $request->file('file');

        Excel::import(new HoroscopesImport, $file);

        return back()->withStatus('File importato correttamente');
    }
}
