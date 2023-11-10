<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tip;

class TipController extends Controller
{
    public function __construct(){
    $this->middleware('can:admin.tips.index')->only('index');
    $this->middleware('can:admin.tips.create')->only('create', 'store');
    $this->middleware('can:admin.tips.edit')->only('edit', 'update');
    $this->middleware('can:admin.tips.destroy')->only('destroy');
    }
    
    public function index()
    {
   $tips = Tip::all();
       return view('admin.tips.index', compact('tips'));
    }

   public function create()
   {
    return view('admin.tips.create');
   }

  
   public function store(Request $request)
   {

       $request->validate([
           'name' => 'required',
           'description' => 'required',
           'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);
   
       $tip = new Tip($request->except('image'));
   
       if ($request->hasFile('image')) {
           $imagePath = $request->file('image')->store('public/tips_images');
           $tip->image = 'tips_images/' . basename($imagePath);
       }
   
       $tip->save();
       return redirect()->route('admin.tips.index')->with('info', 'Tip creado exitósamente');

   }

   public function edit(Tip $tip)
   {
    return view('admin.tips.edit', compact('tip'));
   }


   public function update(Request $request, Tip $tip)
   {
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    
    $tip->name = $request->input('name');
    $tip->description = $request->input('description');

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/tips_images');
        $tip->image = 'tips_images/' . basename($imagePath);
    }

    $tip->save();

    return redirect()->route('admin.tips.index')->with('info', 'Tip actualizado exitosamente.');
   }

   public function destroy(Tip $tip)
   {
       $tip->delete();
       return redirect()->route('admin.tips.index')->with('info', 'Producto eliminado exitosamente.');
   }
}
