 @extends('layouts.main')
@section('contenido')
<title>Chocolate Shop</title>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <img src="../chocolate.png" alt="Chocolateshop" style="height: 50px; width: auto; margin-right: 10px;">
                    <span>Create product</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST"> <!-- envia por post -->
                            @csrf <!-- para enviar un form con Laravel añadir @csrf. sirve para verificar la autenticidad de la info -->
                            <div class= "form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" name= "description"><br>
                            </div>
                            <div class= "form-group">
                                <label for="">Price</label><br>
                                <input type="number" class="form-control" name= "price"><br>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href= "{{ route('products.index') }}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            </div>


