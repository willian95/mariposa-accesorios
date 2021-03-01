<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    
    function login(AdminLoginRequest $request){

        try{

            if(User::where("email", $request->email)->where("role_id", 1)->count() > 0){

                if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {

                    $url = redirect()->intended()->getTargetUrl();
                    return response()->json(["success" => true, "msg" => "Usuario autenticado", "role_id" => Auth::user()->role_id, "url" => $url]);
    
                }
                    
                return response()->json(["success" => false, "msg" => "Contraseña inválida"]);

            }

            return response()->json(["success" => false, "msg" => "Usuario no encontrado"]);

        }catch(\Exception $e){  

            return response()->json(["success" => false, "msg" => "Hubo un problema", "err" => $e->getMessage, "ln" => $e->getLine()]);

        }

    }



}
