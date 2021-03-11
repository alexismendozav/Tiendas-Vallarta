@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Editando Producto: '. $product->nombre) }}</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        -{{$error}} <br>
                        @endforeach
                    </div>
                    @endif
                    <form action={{route('product.update', $product->id)}} method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputCode">Código</label>
                                <input class="form-control" id="inputCode" name="code" placeholder="Código"
                                    value="{{$product -> codigo}}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputQuantity">Cantidad</label>
                                <input type="number" class="form-control" id="inputQuantity" name="quantity" placeholder="Cantidad"
                                    value="{{ $product -> cantidad}}" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputUnit">Unidad de Medida</label>
                                <select id="inputUnit" class="form-control" name="unit">
                                    @foreach ($unities as $unit)
                                    <option @if($unit ->id == $product -> unidad_medida) selected @endif
                                        value="{{$unit->id}}">{{$unit -> nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName">Nombre</label>
                                <input class="form-control" id="inputName" name="name" placeholder="Nombre del producto"
                                    value="{{ $product -> nombre}}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputPurchasedPrice">Precio Adquirido</label>
                                <input type="number" step="0.10" class="form-control" id="inputCode" name="purchasedprice"
                                    placeholder="Precio Adquirido" value="{{ $product -> precio_adquirido}}" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputWholesalePrice">Precio Mayoreo</label>
                                <input type="number" step="0.10" class="form-control" id="inputWholesalePrice" name="wholesaleprice"
                                    placeholder="Precio Mayoreo" value="{{ $product -> precio_mayoreo}}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputRetailPrice">Precio Menudeo</label>
                                <input type="number" step="0.10" class="form-control" id="inputRetailPrice" name="retailprice"
                                    placeholder="Precio Menudeo" value="{{ $product -> precio_menudeo}}" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputDepartment">Departamento</label>
                                <select id="inputDepartment" class="form-control" name="department">
                                    @foreach ($departments as $department)
                                    <option @if($department -> id == $product -> departamento) selected @endif
                                        value="{{$department->id}}">{{$department -> nombre}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCategory">Categoría</label>
                                <select id="inputCategory" class="form-control" name="category">
                                    @foreach ($categories as $category)
                                    <option @if($category -> id == $product -> categoria) selected @endif
                                        value="{{$category->id}}">{{$category -> nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
    
                            <div class="form-group col-md-4">
                                <label for="inputAvailability">Disponibilidad</label>
                                <select id="inputAvailability" class="form-control" name="status">
                                    <option @if($product -> status == 1) selected @endif value="1">Disponible</option>
                                    <option @if($product -> status == 0) selected @endif value="0">No Disponible</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="location">Ubicación</label>
                                <select id="location" class="form-control" name="location"
                                    value="{{old('location')}}">
                                    @foreach ($locations as $location)
                                    <option @if($location -> id == $product -> locacion) selected @endif value="{{$location->id}}">{{$location -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-group justify-content-center">
                            <div class="card marginr" style="width: 18rem;">
                                <div class="img-wrap">
                                    <img src="{{($product -> img == "" ? 'https://ui-avatars.com/api/?name=1&size=255': asset($product -> img))}}"
                                        class="card-img-top" id="image1">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Imagen 1</h5>
                                    <input accept="image/*" type="file" name="image1" id="image1" value="{{old('image1')}}"
                                        class="form-control-file file1" >
                                    <a class=" wtext pointer btn btn-danger mtop btn-sm" id="delete_img1">Borrar Imagen</a>
                                </div>
                            </div>
    
                            <div class="card marginr" style="width: 18rem;">
                                <div class="img-wrap">
    
                                    <img src="{{($product -> img2 == "" ? 'https://ui-avatars.com/api/?name=2&size=255': asset($product -> img2))}}"
                                        class="card-img-top" id="image2">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Imagen 2</h5>
                                    <input accept="image/*" type="file" name="image2" id="image2" value="{{old('image2')}}"
                                        class="form-control-file file2">
                                    <a class=" wtext pointer btn btn-danger mtop btn-sm" id="delete_img2">Borrar Imagen</a>
                                </div>
                            </div>
    
                            <div class="card" style="width: 18rem;">
                                <div class="img-wrap">
                                    <img src="{{($product -> img3 == "" ? 'https://ui-avatars.com/api/?name=3&size=255': asset($product -> img3))}}"
                                        class="card-img-top" id="image3">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Imagen 3</h5>
                                    <input accept="image/*" type="file" name="image3" id="image3" value="{{old('image3')}}"
                                        class="form-control-file file3">
                                    <a class=" wtext pointer btn btn-danger mtop btn-sm" id="delete_img3">Borrar Imagen</a>
                                </div>
                            </div>
    
                        </div>
                       
            </div>
            <div class="card-footer text-muted justify-content-end d-flex">
                @method('PUT')
                @csrf
                <button type="submit" class="btn btn-primary ">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop














