<?php

use Illuminate\Http\Request; // clase que trae el request del form
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('product', function () {
    $product = Product::all();
    return view('products.index', compact('product'));
})->name('products.index');

Route::get('products/create', function () {
    return view('products.create');
})->name('products.create');

Route::post('product', function (Request $request) {
    $newProduct = new Product;
    $newProduct->description = $request->input('description');
    $newProduct->price = $request->input('price');
    $newProduct->save();

    return redirect()->route('products.index')->with('info', 'Product created succesfully');
})->name('products.store');

Route::delete('product/{id}', function ($id) {
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('products.index')->with('info', 'Product deleted succesfully');
})->name('products.delete');

Route::get('product/{id}/edit', function ($id) {
    $product = Product::findOrFail($id);
    $product->update();
    return redirect()->route('products.index')->with('info', 'Product edited succesfully');
    
})->name('products.edit');