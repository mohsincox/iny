<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\UsersImport;

class UsersController extends Controller
{
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import() 
    {
        Excel::import(new UsersImport, public_path('files/users.xlsx'));
        
        return redirect('/')->with('success', 'All good!');

        // Importing uploaded files
        
        // Excel::import(new UsersImport, request()->file('your_file'));
    }
}
