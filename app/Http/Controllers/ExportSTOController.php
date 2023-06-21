<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportSTOController extends Controller
{
    public function index()
    {
       return view('excel-sto-export');
    }

    public function importExcelCSV(Request $request)
    {
        $validatedData = $request->validate([

           'file' => 'required',

        ]);

        Excel::import(new MasterItemCode,$request->file('file'));


        return redirect('excel-csv-file')->with('status', 'The file has been excel/csv imported to database in laravel 9');
    }

    public function exportExcelCSV($slug)
    {
        return Excel::download(new StoEntry, 'StoEntry.'.$slug);
    }
}
