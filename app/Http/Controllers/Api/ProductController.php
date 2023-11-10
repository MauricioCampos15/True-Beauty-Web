<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
        //nicol
    }
    
    public function store(Request $request)
{
    $product = Product::create($request->all());
    return response()->json([
        'producto' => $product,
        'mensaje' => "Producto creado correctamente"
    ]);
}

    public function show(Product $product)
    {
        return response()->json([
            'respuesta'=>true,
            'producto'=>$product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return response()->json([
            'producto' => $product,
            'mensaje' => "Producto actualizado correctamente"
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'respuesta'=> true,
            'mensaje' => "Producto eliminado correctamente"
        ],200);
    }


}
