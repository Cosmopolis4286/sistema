<?php

namespace App\Traits;

use App\Models\Type_sex;
use App\Models\Type_ident;

trait Datos_referenciales
{
    public function sexo()
    {
        return  Type_sex::all();
    }
    public function type_document()
    {
        return  Type_ident::all();
    }
    
}
