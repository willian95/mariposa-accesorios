<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductFormat;

class CartController extends Controller
{
    function fetchProducts(Request $request){

        $products = [];

        foreach($request->rawProducts as $rawproduct){

            $productFormat = ProductFormat::where("id", $rawproduct["product_format_id"])->with("product")->first();
            $products[] = [

                "product" => $productFormat->product,
                "format" => $productFormat,
                "amount" => $rawproduct["amount"]

            ];

        }

        return response()->json(["products" => $products]);

    }
}
