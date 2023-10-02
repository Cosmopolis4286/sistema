<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type_sex;
use App\Models\Type_ident;
use App\Models\AddressEmp;
use App\Models\ParentesEmp;
use Laravel\Scout\Searchable;
class Employee extends Model
{
      use HasFactory;
      use Searchable;
      protected $fillable = [
            'full_name', 'id_sex', 'birthdate', 'id_type', 'num_ident', 'photo'
      ];

      public function Type_sex()
      {
            return $this->hasOne(Type_sex::class, "id", "id_sex");
      }
      public function Type_ident()
      {
            return $this->hasOne(Type_ident::class, "id", "id_type");
      }
      public function AddressEmp()
      {
            return $this->hasOne(AddressEmp::class, "id_emp", "id");
      }
      public function ParentesEmp()
      {
            return $this->hasOne(ParentesEmp::class, "id_emp", "id");
      }
      public function toSearchableArray(): array
      {
         
   
          return ['full_name'=>$this->full_name];
      }

}
