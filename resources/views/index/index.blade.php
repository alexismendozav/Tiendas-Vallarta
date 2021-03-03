@extends('master')
@section('content')
<!-- ============================ BANNERS PRINCIPALES ================================= -->
<div class="row">
  <div class="col-md-3 mtop">
    <div class="card bg-dark">
      <img src="../images/banners/bannerp.jpg" class="card-img opacity">
      <div class="card-img-overlay text-white">
        <h5 class="card-title">Abarrotes</h5>
        <p class="card-text">Mostrar todos los productos de abarrotería</p>
        <a href="#" class="btn btn-light">Mostrar</a>
      </div>
    </div> 
  </div> <!-- col.// -->
  <div class="col-md-3  mtop">
    <div class="card bg-dark">
      <img src="../images/banners/bannerp.jpg" class="card-img opacity">
      <div class="card-img-overlay text-white">
        <h5 class="card-title">Ferreteria</h5>
        <p class="card-text">Mostrar todos los productos de ferreteria</p>
        <a href="{{route('products.index', 2)}}" class="btn btn-light">Mostrar</a>
      </div>
    </div>
  </div> <!-- col.// -->
  <div class="col-md-3  mtop">
    <div class="card bg-dark">
      <img src="../images/banners/bannerp.jpg" class="card-img opacity">
      <div class="card-img-overlay text-white">
        <h5 class="card-title">Zapateria</h5>
        <p class="card-text">Mostrar todos los zapatos en existencia</p>
        <a href="#" class="btn btn-light">Mostrar</a>
      </div>
    </div>
  </div> <!-- col.// -->
  <div class="col-md-3 mtop">
    <div class="card bg-dark">
      <img src="../images/banners/bannerp.jpg" class="card-img opacity">
      <div class="card-img-overlay text-white">
        <h5 class="card-title">Categorias</h5>
        <p class="card-text">En este apartado puedes ver las categorias existentes en los diferentes departamentos</p>
        <a href="{{route('categories')}}" class="btn btn-light">Mostrar</a>
      </div>
    </div>
  </div> <!-- col.// -->
  <div class="col-md-3 mtop">
    <div class="card bg-dark">
      <img src="../images/banners/bannerp.jpg" class="card-img opacity">
      <div class="card-img-overlay text-white">
        <h5 class="card-title">Departamentos</h5>
        <p class="card-text">En este apartado puedes ver los departamentos en exitencia</p>
        <a href="{{route('departments')}}" class="btn btn-light">Mostrar</a>
      </div>
    </div>
  </div> <!-- col.// -->
  <div class="col-md-3 mtop">
    <div class="card bg-dark">
      <img src="../images/banners/bannerp.jpg" class="card-img opacity">
      <div class="card-img-overlay text-white">
        <h5 class="card-title">Usuarios</h5>
        <p class="card-text">Ver usuarios existentes</p>
        <a href="#" class="btn btn-light">Mostrar</a>
      </div>
    </div>
  </div> <!-- col.// -->
  <div class="col-md-3 mtop">
    <div class="card bg-dark">
      <img src="../images/banners/bannerp.jpg" class="card-img opacity">
      <div class="card-img-overlay text-white">
        <h5 class="card-title">Medidas</h5>
        <p class="card-text">En este apartado puedes ver las unidades de medida para los diferentes productos</p>
        <a href="{{route('unities')}}" class="btn btn-light">Mostrar</a>
      </div>
    </div>
  </div> <!-- col.// -->
</div> <!-- row.// -->
@stop