<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.products.index')->only('index');
        $this->middleware('can:admin.products.create')->only('create', 'store');
        $this->middleware('can:admin.products.edit')->only('edit', 'update');
        $this->middleware('can:admin.products.destroy')->only('destroy');
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'precio' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $product = new Product($request->except('image'));
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/products_images');
            $product->image = 'products_images/' . basename($imagePath);
        }
    
        $product->save();

        return redirect()->route('admin.products.index')->with('info', 'Producto creado exitósamente');
    }

   
    public function show(Product $product)
    {
        return view('admin.products.show', compact('products'));
    }
    
    public function edit(Product $product)
    {
    return view('admin.products.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required',
        'precio' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/products_images');
        $product->image = 'products_images/' . basename($imagePath);
    }

    $product->update($request->except('image'));

    return redirect()->route('admin.products.index')->with('info', 'Producto actualizado exitosamente.');
}

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('info', 'Producto eliminado exitosamente.');
    }
}
