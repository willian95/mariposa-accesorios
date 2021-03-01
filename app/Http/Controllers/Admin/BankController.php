<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\BankStoreRequest;
use App\Models\Bank;

class BankController extends Controller
{
    
    function store(BankStoreRequest $request){

        try{

            $bank = new Bank;
            $bank->bank_name = $request->bankName;
            $bank->account_number = $request->accountNumber;
            $bank->holder_dni = $request->holderDni;
            $bank->holder_name = $request->holderName;
            $bank->holder_phone = $request->holderPhone;
            $bank->type = $request->type;
            $bank->save();

            return response()->json(["success" => true, "msg" => "Banco registrado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Ocurrió un problema", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function update(BankStoreRequest $request){

        try{

            $bank = Bank::find($request->id);
            $bank->bank_name = $request->bankName;
            $bank->account_number = $request->accountNumber;
            $bank->holder_dni = $request->holderDni;
            $bank->holder_name = $request->holderName;
            $bank->holder_phone = $request->holderPhone;
            $bank->type = $request->type;
            $bank->update();

            return response()->json(["success" => true, "msg" => "Banco actualizado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Ocurrió un problema", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function delete(Request $request){

        try{

            $bank = Bank::find($request->id);
            $bank->delete();

            return response()->json(["success" => true, "msg" => "Banco eliminado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }

    function fetch($page = 1){

        try{

            $dataAmount = 20;
            $skip = ($page - 1) * $dataAmount;

            $banks = Bank::skip($skip)->take($dataAmount)->get();
            $banksCount = Bank::count();

            return response()->json(["success" => true, "banks" => $banks, "banksCount" => $banksCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }

    function all(){

        $banks = Bank::all();
        return response()->json(["banks" => $banks]);

    }

}
