<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Employee;

class EmployeesExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    
    public function view(): View
    {
        return view('excel')->with("datos",  Employee::all());
    }
}
