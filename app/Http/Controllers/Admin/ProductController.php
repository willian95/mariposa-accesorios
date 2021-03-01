<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\ProductFormat;
use App\Models\ProductSecondaryImage;

class ProductController extends Controller
{
    
    function store(ProductStoreRequest $request){

        foreach($request->productFormatSizes as $test){

            if($test["color"] == null || $test["price"] == null || $test["stock"] == null){
                //return response()->json($test["format"]["name"]);
                return response()->json(["success" => false, "msg" => "Debe completar todos los campos de las presentaciones"]);
            }

        }

        try{

            $slug = str_replace(" ","-", $request->name);
            $slug = str_replace("/", "-", $slug);

            if(Product::where("slug", $slug)->count() > 0){
                $slug = $slug."-".uniqid();
            }

            $product = new Product;
            $product->name = $request->name;
            $product->category_id = $request->category;
            $product->description = $request->description;
            $product->image = $request->image;
            $product->hover_image = $request->imageHover;
            $product->slug = $slug;
            $product->is_highlighted = $request->isHighlighted;
            $product->save();

            foreach($request->workImages as $workImage){

                $image = new ProductSecondaryImage;
                $image->product_id = $product->id;
                $image->image = $workImage['finalName'];
                $image->save();

            }

            foreach($request->productFormatSizes as $productFormatSize){

                $slug = $product->slug."-".$productFormatSize["color"]["name"];

                if(ProductFormat::where("slug", $slug)->count() > 0){
                    $slug = $slug."-".uniqid();
                }

                $productFormatSizeModel = new ProductFormat;
                $productFormatSizeModel->product_id = $product->id;
                $productFormatSizeModel->color_id = $productFormatSize["color"]["id"];
                $productFormatSizeModel->slug = $slug;
                $productFormatSizeModel->stock = $productFormatSize["stock"];
                $productFormatSizeModel->price = $productFormatSize["price"];
                $productFormatSizeModel->save();

            }

            return response()->json(["success" => true, "msg" => "Producto creado"]);

        }catch(\Exception $e){
            return response()->json(["success" => true, "false" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function fetch($page){

        try{

            $dataAmount = 20;
            $skip = ($page - 1) * $dataAmount;

            $query = Product::with(['category' => function ($q) {
                $q->withTrashed();
            }])->with(['productFormats' => function ($q) {
                $q->withTrashed();
            }])->with(['productFormats.color' => function ($q) {
                $q->withTrashed();
            }]);
           
            $products = $query->skip($skip)->take($dataAmount)->get();
            $productsCount = $query->count();

            return response()->json(["success" => true, "products" => $products, "productsCount" => $productsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => true, "false" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function edit($id){

        $product = Product::with(['category' => function ($q) {
            $q->withTrashed();
        }])->with(['productFormats' => function ($q) {
            $q->withTrashed();
        }])->with(['productFormats.color' => function ($q) {
            $q->withTrashed();
        }])->with('secondaryImages')->where("id", $id)->first();

        return view("admin.products.edit", ["product" => $product]);

    }

    function update(ProductUpdateRequest $request){

        foreach($request->productFormatSizes as $test){

            if($test["price"] == null || $test["color"] == null || $test["stock"] == null){
                //return response()->json($test["format"]["name"]);
                return response()->json(["success" => false, "msg" => "Debe completar todos los campos de las presentaciones"]);
            }

        }

        try{

            $product = Product::find($request->id);
            $product->name = $request->name;
            $product->category_id = $request->category;
            $product->description = $request->description;
            $product->is_highlighted = $request->isHighlighted;
            if($request->get("image") != null){
                $product->image =  $request->image;
            }

            if($request->get("imageHover") != null){
                $product->hover_image = $request->imageHover;
            }
            
            $product->update();

            $productTypeArray = [];
            $productTypes = ProductFormat::where("product_id", $product->id)->get();
            foreach($productTypes as $productType){
                array_push($productTypeArray, $productType->id);
            }

            $requestArray = [];
            foreach($request->productFormatSizes as $productTypeSizeRequest){
                if(array_key_exists("id", $productTypeSizeRequest)){
                    array_push($requestArray, $productTypeSizeRequest["id"]);
                }
            }

            $deleteProductTypes = array_diff($productTypeArray, $requestArray);
            
            foreach($deleteProductTypes as $productDelete){
                ProductFormat::where("id", $productDelete)->delete();
            }

            foreach($request->productFormatSizes as $productTypeSize){
                
                if(array_key_exists("id", $productTypeSize)){

                    if(ProductFormat::where("id", $productTypeSize["id"])->count() > 0){
                        $productType = ProductFormat::find($productTypeSize["id"]);
                        $productType->product_id = $product->id;
                        $productType->color_id = $productTypeSize["color"]["id"];;
                        $productType->price = $productTypeSize["price"];
                        $productType->stock = $productTypeSize["stock"];
                        $productType->update();
                    }

                }else{
                   
                    $slug = $product->slug."-".$productTypeSize["color"]["name"];

                    if(ProductFormat::where("slug", $slug)->count() > 0){
                        $slug = $slug."-".uniqid();
                    }

                    $productType = new ProductFormat;
                    $productType->product_id = $product->id;
                    $productType->color_id =  $productTypeSize["color"]["id"];
                    $productType->price = $productTypeSize["price"];
                    $productType->slug = $slug;
                    $productType->stock = $productTypeSize["stock"];
                    $productType->save();
                }
                

            }

            $WorkImagesArray = [];
            $workImages = ProductSecondaryImage::where("product_id", $product->id)->get();
            foreach($workImages as $productSecondaryImage){
                array_push($WorkImagesArray, $productSecondaryImage->id);
            }

            $requestArray = [];
            foreach($request->workImages as $image){
                if(array_key_exists("id", $image)){
                    array_push($requestArray, $image["id"]);
                }
            }

            $deleteWorkImages = array_diff($WorkImagesArray, $requestArray);
            
            foreach($deleteWorkImages as $imageDelete){
                ProductSecondaryImage::where("id", $imageDelete)->delete();
            }

            foreach($request->workImages as $workImage){
                if(isset($workImage["finalName"])){
                    
                    $image = new ProductSecondaryImage;
                    $image->product_id = $product->id;
                    $image->image = $workImage['finalName'];
                    $image->file_type = $workImage["type"];
                    $image->save();
                }

            }
       
            return response()->json(["success" => true, "msg" => "Producto actualizado"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function delete(Request $request){

        try{

            $product = Product::find($request->id);
            $this->deleteSecondaryImages($request->id);
            $this->deleteFormat($request->id);
            $product->delete();

            return response()->json(["success" => true, "msg" => "Producto eliminado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function deleteSecondaryImages($id){

        foreach(ProductSecondaryImage::where("product_id", $id)->get() as $image){
            $image->delete();
        }

    }

    function deleteFormat($id){

        foreach(ProductFormat::where("product_id", $id)->get() as $format){
            $format->delete();
        }

    }

    function show($slug){

        $product = Product::where("slug", $slug)->with("category", "productFormats", "productFormats.color", "secondaryImages")->first();

        return view("product-detail", ["product" => $product]);

    }

}
