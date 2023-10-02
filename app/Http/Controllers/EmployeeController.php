<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Traits\Datos_referenciales;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\AddressEmp;
use App\Models\ParentesEmp;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    use Datos_referenciales;
    public function index()
    {
        return view("welcome")
            ->with("datos", $this->all())
            ->with("sex", $this->sexo())
            ->with("document", $this->type_document())
            ->with("document_edit", $this->type_document());
    }

    public   function all()
    {
        return Employee::all();
    }

    public  function Employee($id)
    {
        return  Employee::find($id);
    }

    public function delete(Request $request)
    {
        $Employee = Employee::find($request->id);;
        $Employee->delete();

        Session::flash('message', 'O registro foi deletado');
        return redirect('/');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'num_ident' => 'unique:Employees',
            ]
        );

        $files = $request->file("photo");
        if (empty($files)) {
            $nombre = "84099.png";
        } else {
            $nombre = date("Y-m-d hms") . '.' . $files->getClientOriginalExtension();
            $files->move('img/perfiles/', $nombre);
        }

        Employee::create([
            'full_name' => $request->full_name,
            'id_sex' => $request->id_sex,
            'birthdate' => $request->birthdate,
            'id_type' => $request->id_type,
            'num_ident' => $request->num_ident,
            'photo' => $nombre,
        ]);

        $emp = Employee::orderByDesc('id')->first();
        AddressEmp::create([
            'id_emp' => $emp->id,
            'state' => $request->state,
            'city' => $request->city,
            'neighborhood' => $request->neighborhood,
            'street' => $request->street,
            'num_hab' => $request->num_hab,
        ]);
        ParentesEmp::create([
            'id_emp' => $emp->id,
            'mother_name' => $request->mother_name,
            'father_name' => $request->father_name
        ]);
        Session::flash('message', 'Cadastro concluído com sucesso');
        return redirect('/');
    }

    public  function update(Request $request)
    {
        $this->validate(
            $request,
            ['num_ident' => Rule::unique('Employees')->ignore($request->id_emp)]
        );

        $files = $request->file("photo");
        if (empty($files)) {
            $nombre = $request->photo_edit_old;
        } else {
            $nombre = date("Y-m-d hms") . '.' . $files->getClientOriginalExtension();
            $files->move('img/perfiles/', $nombre);
        }

        $Employee =  Employee::find($request->id_emp);
        $Employee->full_name = $request->full_name_edit;
        $Employee->birthdate = $request->birthdate_edit;
        $Employee->id_type = $request->id_type_edit;
        $Employee->id_sex = $request->id_sex_edit;
        $Employee->num_ident = $request->num_ident_edit;
        $Employee->photo = $nombre;
        $Employee->save();

        $AddressEmp =  AddressEmp::where('id_emp', $request->id_emp)->first();
        $AddressEmp->state = $request->state_edit;
        $AddressEmp->city = $request->city_edit;
        $AddressEmp->neighborhood = $request->neighborhood_edit;
        $AddressEmp->street = $request->street_edit;
        $AddressEmp->num_hab = $request->num_hab_edit;
        $AddressEmp->save();

        $ParentesEmp = ParentesEmp::where('id_emp', $request->id_emp)->first();
        $ParentesEmp->mother_name = $request->mother_name_edit;
        $ParentesEmp->father_name = $request->father_name_edit;
        $ParentesEmp->save();

        Session::flash('message', 'Atualização concluída com sucesso');
        return redirect('/');
    }
}
