<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Category;

class CategoryController extends Controller
{
    function all(){
        
        return response()->json(["categories" => Category::all()]);

    }

    function store(CategoryStoreRequest $request){

        try{

            $slug = str_replace(" ", "-", $request->name);
            $slug = str_replace("/", "-", $slug);

            if(Category::where("slug", $slug)->count() > 1){
                $slug = $slug."-".uniqid();
            }

            $category = new Category;
            $category->name = $request->name;
            $category->image = $request->image;
            $category->slug = $slug;
            $category->save();

            return response()->json(["success" => true, "msg" => "Categoría creada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }
        
    }

    function fetch($page = 1){

        try{

            $dataAmount = 20;
            $skip = ($page - 1) * $dataAmount;

            $categories = Category::skip($skip)->take($dataAmount)->get();
            $categoriesCount = Category::count();

            return response()->json(["success" => true, "categories" => $categories, "categoriesCount" => $categoriesCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }

    function update(CategoryUpdateRequest $request){


        try{

            if(Category::where('name', $request->name)->where('id', '<>', $request->id)->count() == 0){
                
                $category = Category::find($request->id);
                $category->name = $request->name;
                if(isset($request->image)){

                    $category->image = $request->image;

                }

                $category->update();

                return response()->json(["success" => true, "msg" => "Categoría actualizada"]);
            
            }else{

                return response()->json(["success" => false, "msg" => "Este nombre ya existe"]);

            }

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }
        
    }

    function delete(Request $request){

        try{

            $category = Category::find($request->id);
            $category->delete();

            return response()->json(["success" => true, "msg" => "Categoría eliminada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }
}
