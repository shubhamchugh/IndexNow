<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ChecklistImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportChecklistController extends Controller
{
    public function checklistImport(Request $request)
    {
        Excel::import(new ChecklistImport, $request->file('checklistscsv'));
        return redirect()->back()->with('message', 'File Import done');
    }

    public function importIndex()
    {
        return view('backend.import.index');
    }
}
