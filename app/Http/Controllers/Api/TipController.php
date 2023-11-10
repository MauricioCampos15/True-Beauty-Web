<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tip;

class TipController extends Controller
{
    public function index()
    {
        $tips = Tip::all();
        return response()->json($tips);
    }
  
    public function store(Request $request)
    {
        $tip = Tip::create($request->all());
        return response()->json([
            'tip' => $tip,
            'mensaje' => "Tip creado correctamente"
        ]); 
    }
  
    public function update(Request $request, Tip $tip)
    {
        $tip->update($request->all());
        return response()->json([
            'tip' => $tip,
            'mensaje' => "Tip actualizado correctamente"
        ]);
     }
  
    public function destroy(Tip $tip)
    {
        $tip->delete();
        return response()->json([
            'mensaje' => "Tip eliminado correctamente"
        ],200);
    }
}
