<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ClientCategoryController extends Controller
{
    
    function productsByCategory($slug){

        $category = Category::where("slug", $slug)->first();
        return view("categories", ["category" => $category]);

    }

    function fetchProductsByCategory($categoryId, $page){

        try{

            $dataAmount = 20;
            $skip = ($page - 1) * $dataAmount;

            $products = Product::with('category')->skip($skip)->take($dataAmount)->with('productFormats')->with('productFormats.color')->where("category_id", $categoryId)->get();
            $productsCount = Product::with('category')->with('productFormats')->with('productFormats.color')->where("category_id", $categoryId)->count();

            return response()->json(["success" => true, "products" => $products, "productsCount" => $productsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => true, "false" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

}
