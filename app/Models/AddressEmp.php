<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class AddressEmp extends Model
{
      use HasFactory;
      protected $table = 'address_emp';
      protected $fillable = [
            'state', 'city', 'neighborhood', 'street', 'num_hab', 'id_emp'
      ];
}
