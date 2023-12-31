<?php

namespace App\Http\Controllers;

use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new EmployeesExport, "funcionários.xlsx");
    }
}
