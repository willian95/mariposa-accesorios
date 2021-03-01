<?php

namespace App\Listeners;

use App\Events\SendPurchaseMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Purchase;
use App\Models\ProductPurchase;
use App\Models\DolarToday;


class SendPurchaseEmailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendPurchaseMail  $event
     * @return void
     */
    public function handle(SendPurchaseMail $event)
    {

        $purchase = Purchase::find($event->purchaseId);
        $products = ProductPurchase::where("purchase_id", $event->purchaseId)->with("productFormat")->get();
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
