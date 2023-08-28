<?php

namespace App\Http\Controllers;

use App\Exports\CategoryExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExcelReportController extends Controller
{
    public function export() 
    {
        return Excel::download(new CategoryExport, 'category.xlsx');
    }
}
