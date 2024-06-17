<?php

use Illuminate\Http\Request; // clase que trae el request del form
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('product', function () {
    $products = Product::all();
    return view('products.index',  compact('products'));
})->name('products.index');

Route::get('products/create', function () {
    return view('products.create');
})->name('products.create');

Route::post('products', function (Request $request) {
    $newProduct = new Product;
    $newProduct->description = $request->input('description');
    $newProduct->price = $request->input('price');
    $newProduct->save();

    return redirect()->route('products.index')->with('info', 'Product created succesfully');
})->name('products.store');

Route::delete('product/{id}', function ($id) {
    $products = Product::findOrFail($id);
    $products->delete();
    return redirect()->route('products.index')->with('info', 'Product deleted succesfully');
})->name('products.delete');

Route::get('product/{id}/edit', function ($id) {
    
     $products = Product::findOrFail($id); //invocamos el producto
     
    // return redirect()->route('products.index')->with('info', 'Product edited succesfully');
    return view('products.edit', compact('products'));
})->name('products.edit');
