@extends('layouts.main')
@section('contenido')
    <title>Chocolate Shop</title>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <img src="../../chocolate.png" alt="Chocolateshop" style="height: 50px; width: auto; margin-right: 10px;">
                    <span>Edit product</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST"> <!-- envia por post -->
                            @method('PUT') <!-- el form no permite metodo put por eso se usa esta directiva-->
                            @csrf <!-- para enviar un form con Laravel añadir csrf. sirve para verificar la autenticidad de la info -->
                            <div class= "form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" value="{{ $product->description }}" name= "description"><br> <!--le pasamos el valor del product y accedemos a su descripcion -->
                            </div>
                            <div class= "form-group">
                                <label for="">Price</label><br>
                                <input type="number" class="form-control" value="{{ $product->price }}" name= "price"><br>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href= "{{ route('products.index') }} " class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            </div>

@endsection