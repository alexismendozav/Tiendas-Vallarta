@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Agregar Producto') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        -{{$error}} <br>
                        @endforeach
                    </div>
                    @endif

                    <form action={{route('product.store')}} method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputCode">Código</label>
                                <input class="form-control" id="inputCode" name="code" placeholder="Código"
                                    value="{{old('code')}}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputQuantity">Cantidad</label>
                                <input type="number" class="form-control" id="inputQuantity" name="quantity"
                                    placeholder="Cantidad" value="{{old('quantity')}}" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputUnit">Unidad de Medida</label>
                                <select id="inputUnit" class="form-control" name="unit" value="{{old('unit')}}">
                                    @foreach ($unities as $unit)
                                    <option value="{{$unit->id}}">{{$unit -> nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName">Nombre</label>
                                <input class="form-control" id="inputName" name="name" placeholder="Nombre del producto"
                                    value="{{old('name')}}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputPurchasedPrice">Precio Adquirido</label>
                                <input type="number" step="0.10" class="form-control" id="inputCode"
                                    name="purchasedprice" placeholder="Precio Adquirido"
                                    value="{{old('purchasedprice')}}" required>
                            </div>
                            <div class=" form-group col-md-2">
                                <label for="inputWholesalePrice">Precio Mayoreo</label>
                                <input type="number" step="0.10" class="form-control" id="inputWholesalePrice"
                                    name="wholesaleprice" placeholder="Precio Mayoreo"
                                    value="{{old('wholesaleprice')}}">
                            </div>
                            <div class=" form-group col-md-2">
                                <label for="inputRetailPrice">Precio Menudeo</label>
                                <input type="number" step="0.10" class="form-control" id="inputRetailPrice"
                                    name="retailprice" placeholder="Precio Menudeo" value="{{old('retailprice')}}"
                                    required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputDepartment">Departamento</label>
                                <select id="inputDepartment" class="form-control" name="department"
                                    value="{{old('department')}}">
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department -> nombre}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCategory">Categoría</label>
                                <select id="inputCategory" class="form-control" name="category"
                                    value="{{old('category')}}">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category -> nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputAvailability">Disponibilidad</label>
                                <select id="inputAvailability" class="form-control" name="status"
                                    value="{{old('status')}}">
                                    <option value="1">Disponible</option>
                                    <option value="0">No Disponible</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="location">Ubicación</label>
                                <select id="location" class="form-control" name="location"
                                    value="{{old('location')}}">
                                    @foreach ($locations as $location)
                                    <option value="{{$location->id}}">{{$location -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-group justify-content-center">
                            <div class="card marginr" style="width: 18rem;">
                                <div class="img-wrap">
                                    <img src="https://ui-avatars.com/api/?name=1&size=255" class="card-img-top"
                                        alt="..." id="image1">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Imagen 1</h5>
                                    <input accept="image/*" type="file" name="image1" id="image1"
                                        value="{{old('image1')}}" class="form-control-file file1" required>
                                    <a class=" wtext pointer btn btn-danger mtop btn-sm" id="delete_img1">Borrar
                                        Imagen</a>
                                </div>
                            </div>

                            <div class="card marginr" style="width: 18rem;">
                                <div class="img-wrap">
                                    <img src="https://ui-avatars.com/api/?name=2&size=255" class="card-img-top"
                                        alt="..." id="image2">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Imagen 2</h5>
                                    <input accept="image/*" type="file" name="image2" id="image2"
                                        value="{{old('image2')}}" class="form-control-file file2">
                                    <a class=" wtext pointer btn btn-danger mtop btn-sm" id="delete_img2">Borrar
                                        Imagen</a>
                                </div>
                            </div>

                            <div class="card" style="width: 18rem;">
                                <div class="img-wrap">
                                    <img src="https://ui-avatars.com/api/?name=3&size=255" class="card-img-top"
                                        alt="..." id="image3">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Imagen 3</h5>
                                    <input accept="image/*" type="file" name="image3" id="image3"
                                        value="{{old('image3')}}" class="form-control-file file3">
                                    <a class=" wtext pointer btn btn-danger mtop btn-sm" id="delete_img3">Borrar
                                        Imagen</a>
                                </div>
                            </div>

                        </div>
                       
                </div>
                <div class="card-footer text-muted justify-content-end d-flex">
                    @csrf
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop