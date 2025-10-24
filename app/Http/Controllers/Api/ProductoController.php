<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function editarStock(Request $request)
    {
        try {
            foreach ($request->listado as $key => $item) {
                $producto = Product::where('id_sistema',$item['id_sistema'])->get();
                $producto[0]->update([
                    'stock' => $producto[0]->stock - $item['cantidad']
                ]);
            }
            return response()->json(['status' => true, 'msg' => 'Se edito con exito']); 
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }
    }

    public function addProduct(Request $request)
    {
        try {
            foreach ($request->listaprod as $item) {
                $marca = Brand::where('id_sistema',$item["grupo"])->first();
                $categoria = Taxonomy::where('id_sistema',$item["linea"])->first();
                $producto = Product::where('name', $item["descripcion"])->get();

                if ($item["tipo"] == 'E') {
                    $productoe = Product::where('id_sistema',$item["codigo"])->first();
                    if ($productoe) {
                        Product::destroy($productoe->id);
                    }                    
                }
                else {                                    
                    if ($marca) {
                        if ($categoria) {  
                            if ($item["tipo"] == 'R') {
                                if ($producto->count() == 0) {
                                    Product::create([
                                    'id_sistema' => $item["codigo"],
                                    'taxonomy_id' => $categoria->id,
                                    'brand_id' => $marca->id,
                                    'name' => $item["descripcion"],
                                    'price' => $item["precio_venta"],
                                    'unidad_medida' => $item["presentacion"],
                                    'stock' =>$item["stock"],
                                    'slug' => Str::slug($item["descripcion"])                        
                                    ]); 
                                }
                            }  
                            if ($item["tipo"] == 'M') {
                                $productom = Product::where('id_sistema',$item["codigo"])->first();
                                Product::where('id', $productom->id)->update([
                                'id_sistema' => $item["codigo"],
                                'taxonomy_id' => $categoria->id,
                                'brand_id' => $marca->id,
                                'name' => $item["descripcion"],
                                'price' => $item["precio_venta"],
                                'unidad_medida' => $item["presentacion"],
                                'stock' =>$item["stock"],
                                'slug' => Str::slug($item["descripcion"])  
                                ]);
                            }                          
                                                                   
                        }
                        else {
                            $category = Taxonomy::create([
                                'name' => $item["linea_name"],
                                'id_sistema' => $item["linea"]
                            ]);                             
                            if ($item["tipo"] == 'R') {
                                if ($producto->count() == 0) {
                                    Product::create([
                                    'id_sistema' => $item["codigo"],
                                    'taxonomy_id' => $category->id,
                                    'brand_id' => $marca->id,
                                    'name' => $item["descripcion"],
                                    'price' => $item["precio_venta"],
                                    'unidad_medida' => $item["presentacion"],
                                    'stock' =>$item["stock"],
                                    'slug' => Str::slug($item["descripcion"])                        
                                    ]); 
                                }
                            }
                            if ($item["tipo"] == 'M') {
                                $productom = Product::where('id_sistema',$item["codigo"])->first();
                                Product::where('id', $productom->id)->update([
                                'id_sistema' => $item["codigo"],
                                'taxonomy_id' => $category->id,
                                'brand_id' => $marca->id,
                                'name' => $item["descripcion"],
                                'price' => $item["precio_venta"],
                                'unidad_medida' => $item["presentacion"],
                                'stock' =>$item["stock"],
                                'slug' => Str::slug($item["descripcion"])  
                                ]);
                            }                                                   
                        }
                    }  
                    else {
                        $brand = Brand::create([
                            'name' => $item["grupo_name"],
                            'id_sistema' => $item["grupo"]
                        ]); 

                        if ($categoria) {                            
                            if ($item["tipo"] == 'R') {
                                if ($producto->count() == 0) {
                                    Product::create([
                                    'id_sistema' => $item["codigo"],
                                    'taxonomy_id' => $categoria->id,
                                    'brand_id' => $brand->id,
                                    'name' => $item["descripcion"],
                                    'price' => $item["precio_venta"],
                                    'unidad_medida' => $item["presentacion"],
                                    'stock' =>$item["stock"],
                                    'slug' => Str::slug($item["descripcion"])                        
                                    ]); 
                                }
                            }
                            if ($item["tipo"] == 'M') {
                                $productom = Product::where('id_sistema',$item["codigo"])->first();
                                Product::where('id', $productom->id)->update([
                                'id_sistema' => $item["codigo"],
                                'taxonomy_id' => $categoria->id,
                                'brand_id' => $brand->id,
                                'name' => $item["descripcion"],
                                'price' => $item["precio_venta"],
                                'unidad_medida' => $item["presentacion"],
                                'stock' =>$item["stock"],
                                'slug' => Str::slug($item["descripcion"])  
                                ]);
                            }
                                                    
                        }
                        else {
                            $category1 = Taxonomy::create([
                                'name' => $item["linea_name"],
                                'id_sistema' => $item["linea"]
                            ]); 

                            if ($item["tipo"] == 'R') {
                                if ($producto->count() == 0) {
                                    Product::create([
                                    'id_sistema' => $item["codigo"],
                                    'taxonomy_id' => $category1->id,
                                    'brand_id' => $brand->id,
                                    'name' => $item["descripcion"],
                                    'price' => $item["precio_venta"],
                                    'unidad_medida' => $item["presentacion"],
                                    'stock' =>$item["stock"],
                                    'slug' => Str::slug($item["descripcion"])                        
                                    ]); 
                                }
                            }
                            if ($item["tipo"] == 'M') {
                                $productom = Product::where('id_sistema',$item["codigo"])->first();
                                Product::where('id', $productom->id)->update([
                                'id_sistema' => $item["codigo"],
                                'taxonomy_id' => $category1->id,
                                'brand_id' => $brand->id,
                                'name' => $item["descripcion"],
                                'price' => $item["precio_venta"],
                                'unidad_medida' => $item["presentacion"],
                                'stock' =>$item["stock"],
                                'slug' => Str::slug($item["descripcion"]) 
                                ]);
                            }
                        }
                    }
                }
            } 

            return response()->json(['status' => true, 'msg' => 'El producto se agregó con exito']); 

        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }
    }

    public function addBrand(Request $request)
    {
        try {
            
            Brand::create([
                'name' => $request["descripcion"],
                'id_sistema' => $request["codigo"]
            ]); 

            return response()->json(['status' => true, 'msg' => 'La marca se agregó con exito']); 

        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }
    }

    public function addCategory(Request $request)
    {
        try {
            
            Taxonomy::create([
                'name' => $request["descripcion"],
                'id_sistema' => $request["codigo"]
            ]); 

            return response()->json(['status' => true, 'msg' => 'La categoría se agregó con exito']); 

        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }
    }

    public function listProducts()
    {
        $products = Product::with(['brand', 'taxonomy']) 
                           ->where('stock', '>', 0) 
                           ->get();

        // return response()->json($products);
        return ProductResource::collection($products);
    }
}
