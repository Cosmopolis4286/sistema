<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;

class ApiController extends Controller
{

      public  function employees(Request $request)
      {
            $info = json_decode($request->getContent());
            $data =   Employee::search($info->nome)->get();
            if (empty($data)) {
                  $data = "Não há correspondências";
            } else {
                  return response()->json($data);
            }
      }

      public  function login(Request $request)
      {
            $response = ['estatus' => '0', 'msg' => ''];
            $data = json_decode($request->getContent());
            $user = User::where('email', $data->email)->first();
            if ($user) {
                  $toke = $user->createToken("Token");
                  $response['estatus'] = 1;
                  $response['msg'] = $toke;
            } else {
                  $response['msg'] = "Usuario No Encontrado";
            }
            return response()->json($response);
      }
}
