<?php

// use App\Http\Middleware\auth;
use Illuminate\Http\Request; // clase que trae el request del form
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisterController;
// recordar laravel es case-sensitive

// Route::middleware('auth')->group(function () {

Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

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
        return view('products.edit', compact('product'));
    })->name('products.edit');

    Route::put('product/{id}', function (Request $request, $id) {
    $product = Product::findOrFail($id);
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->save();
    return redirect()->route('products.index')->with('info', 'Product updated successfully');
    })->name('products.update');

// });

    
// Auth::routes();

