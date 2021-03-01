<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\Category;

class SearchController extends Controller
{
    function index($query){
        return view("search", ["query" => $query]);
    }


    function search(Request $request){

        try{

            $dataAmount = 20;
            $skip = ($request->page-1) * $dataAmount;

            $words = $this->splitWords($request);

            $products = Product::where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('description', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->orWhere(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->orWhereHas("productFormats.color", function($query) use($words){

                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->where('name', "like", "%".$words[$i]."%");
                    }
                }

            })->skip($skip)->take($dataAmount)->with("productFormats", "productFormats.color")->get();

            $productsCount = Product::where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('description', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->orWhere(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->orWhereHas("productFormats.color", function($query) use($words){
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                } 
            })->count();

            return response()->json(["success" => true, "products" => $products, "productsCount" => $productsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function splitWords($request){

        $words = explode(' ',strtolower($request->search)); // coloco cada palabra en un espacio del array
        $wordsToDelete = array('de', "y", "la");

        $words = array_values(array_diff($words,$wordsToDelete)); // Elimino todas las coincidencias de las wordsToDelete

        return $words;
    }




}
