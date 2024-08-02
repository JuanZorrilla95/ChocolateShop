@extends('layouts.main') <!--extiende la clase padre de layout, propio de laravel -->
@section('contenido')

<title>Chocolate Shop</title>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center" >
                        <img src="chocolate.png" alt="Chocolateshop" style="height: 50px; width: auto; margin-right: 10px;">
                        <span>Find your best product</span>
                        <a href="{{ route('products.create') }}" class="btn btn-success btn-sm">New product</a> <!--enrutador laravel -->
                    </div>
                    <div class="card-body"> <!--directivas de laravel el if y endif -->
                        @if(session('info'))
                        <div class="alert alert-success">
                            {{ session('info') }}
                        </div>
                        @endif
                        <table class="table table-hover table-sm"><br>
                            <thead>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($product as $product)
                                <tr>
                                    <td>
                                        {{ $product->description }}
                                    </td>
                                    <td>
                                    ${{ $product->price }} ARS
                                    </td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning ">Edit</a>
                                        <a href="javascript: document.getElementById('delete-{{ $product->id }}').submit()" class="btn btn-danger">Delete</a> <!--lo llamamos por js -->
                                        <form id="delete-{{ $product->id }}" action="{{ route('products.delete', $product->id) }}" method="POST" > <!-- especificar el method debajo para que laravel entienda que es por DELETE -->
                                            
                                            @method('delete')
                                            @csrf
                                            
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <span>Bienvenido {{ auth()->user()->name }}</span>
                        <a href="javascript: document.getElementById('logout').submit()" class="btn btn-danger btn-sm">Cerrar sesión</a> 
                        <form action="{{ route('logout') }}" id="logout" style="display:none" method="POST">
                            @csrf
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div><br>
    
    
@endsection