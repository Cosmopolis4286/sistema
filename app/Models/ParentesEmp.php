<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class ParentesEmp extends Model
{
      use HasFactory;
      protected $table = 'parentes_emp';
      protected $fillable = [
            'mother_name', 'father_name', 'id_emp'
      ];
}
