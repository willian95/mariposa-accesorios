<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\ProductPurchase;
use App\Models\DolarToday;
use Event;
use App\Events\SendPurchaseMail;

class PurchaseController extends Controller
{
    
    function store(Request $request){

        try{

            $total = $this->getTotal($request->products);

            $purchase = new Purchase;
            $purchase->total = $total;
            $purchase->bank_id = $request->bank_id;
            $purchase->buyer_name = $request->buyerName;
            $purchase->buyer_lastname = $request->buyerLastname;
            $purchase->buyer_phone = $request->buyerPhone;
            $purchase->buyer_email = $request->buyerEmail;
            $purchase->buyer_address = $request->buyerAddress;
            $purchase->bank_reference = $request->bankReference;
            $purchase->order_id = uniqid();
            $purchase->save();

            $this->storeProductPurchase($request->products, $purchase->id);
            $this->sendEmail($purchase->id);
            //Event::dispatch(new SendPurchaseMail($purchase->id));

            return response()->json(["success" => true, "msg" => "Compra realizada, un administrador se contactará con usted para la confirmación del pago"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Ocurrió un problema", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function getTotal($products){
        $total = 0;
        foreach($products as $product){

            $total = $total + $product["format"]["price"] * $product["amount"];

        }

        return $total;

    }

    function storeProductPurchase($products, $purchaseId){

        foreach($products as $product){

            $productPurchase = new ProductPurchase;
            $productPurchase->purchase_id = $purchaseId;
            $productPurchase->product_format_id = $product["format"]["id"];
            $productPurchase->amount = $product["amount"];
            $productPurchase->price = $product["format"]["price"];
            $productPurchase->save();

        }

    }

    function sendEmail($purchaseId){

        $purchase = Purchase::find($purchaseId);
        $products = ProductPurchase::where("purchase_id", $purchaseId)->with("productFormat")->get();
        $dolarToday = DolarToday::first()->price;
        $total = 0;
        
        foreach($products as $product){

            $total = $total + ($product->price * $product->amount);

        }

        $to_name = $purchase->buyer_name;
        $to_email = $purchase->buyer_email;

        $data = ["purchase" => $purchase, "total" => $total, "dolarToday" => $dolarToday, "products" => $products];

        \Mail::send("emails.purchase", $data, function($message) use ($to_name, $to_email) {
    
            $message->to($to_email, $to_name)->subject("¡Compra realizada!");
            $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

        });

    }

    

}
