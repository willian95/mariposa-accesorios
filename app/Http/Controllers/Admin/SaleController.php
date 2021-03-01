<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductPurchase;
use App\Models\Purchase;

class SaleController extends Controller
{
    function index(){

        return view("admin.sales.index");

    }

    function fetch($page = 1){

        try{

            $dataAmount = 20;
            $skip = ($page - 1) * $dataAmount;

            $shoppings = Purchase::with(['productPurchases.productFormat' => function ($q) {
                $q->withTrashed();
                $q->with(['product' => function ($k) {
                    $k->withTrashed();
                }]);
                $q->with(['color' => function ($k) {
                    $k->withTrashed();
                }]);
            }])
            ->orderBy('id', 'desc')->skip($skip)->take($dataAmount)->get();

            $shoppingsCount =Purchase::with(['productPurchases.productFormat' => function ($q) {
                $q->withTrashed();
                $q->with(['product' => function ($k) {
                    $k->withTrashed();
                }]);
                $q->with(['color' => function ($k) {
                    $k->withTrashed();
                }]);
            }])->orderBy('id', 'desc')->count();

            return response()->json(["success" => true, "shoppings" => $shoppings, "shoppingsCount" => $shoppingsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function sendTracking(Request $request){

        try{

            $products = ProductPurchase::where("payment_id", $request->paymentId)->with("productFormatSize", "productFormatSize.product", "productFormatSize.size")->has("productFormatSize")->get();

            $payment = Payment::where("id", $request->paymentId)->first();
            $payment->tracking = $request->tracking;
            $payment->update();

            $user = null;
            if($request->user == 'auth'){
                $user = User::where("email", $request->email)->first();
            }else{
                $user = GuestUser::where("email", $request->email)->first();
            }

            $to_name = $user->name;
            $to_email = $user->email;
            $data = ["user" => $user, "products" => $products, "tracking" => $request->tracking, "payment" => $payment];

            \Mail::send("emails.tracking", $data, function($message) use ($to_name, $to_email) {

                $message->to($to_email, $to_name)->subject("Order Shipped. Track your order!");
                $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

            });

            return response()->json(["success" => true, "Notificación enviada al cliente"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function approve(Request $request){

        try{

            $purchase = Purchase::find($request->id);
            $purchase->status = "approved";
            $purchase->update();

            $this->sendEmail($purchase->id, "Compra aprobada", "tenemos el agrado de anunciarte que tu compra fue aprobada");

            return response()->json(["success" => true, "msg" => "Venta actualizada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function reject(Request $request){

        try{

            $purchase = Purchase::find($request->id);
            $purchase->status = "rejected";
            $purchase->update();

            $this->sendEmail($purchase->id, "Compra rechazada", "lamentamos comunicarte que tu compra fue rechazada. Para más información comunicate con nosotros");

            return response()->json(["success" => true, "msg" => "Venta actualizada"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function sendEmail($purchaseId, $title, $message){

        $purchase = Purchase::find($purchaseId);
        $products = ProductPurchase::where("purchase_id", $purchaseId)->with("productFormat")->get();
        $dolarToday = $products[0]["dolar_today_price"];
        $total = 0;
        
        foreach($products as $product){

            $total = $total + ($product->price * $product->amount);

        }

        $to_name = $purchase->buyer_name;
        $to_email = $purchase->buyer_email;

        $data = ["purchase" => $purchase, "total" => $total, "dolarToday" => $dolarToday, "products" => $products, "title" => $title, "body" => $message];

        \Mail::send("emails.purchaseConfirmation", $data, function($message) use ($to_name, $to_email) {
    
            $message->to($to_email, $to_name)->subject("¡Confirmación de compra!");
            $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

        });

    }

    function excelExport(){
        return Excel::download(new SalesExport, 'ventas.xlsx');
    }

    function csvExport(){
        return Excel::download(new SalesExport, 'ventas.csv');
    }
}
