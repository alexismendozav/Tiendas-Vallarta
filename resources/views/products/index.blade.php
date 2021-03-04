@extends('master')
@section('breadcrumb')
<nav>
    <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{route('product.show', 2)}}">Ferreteria</a></li>
        <li class="breadcrumb-item active" aria-current="page">Todos los productos</li>
    </ol>
</nav>
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    -{{$error}} <br>
    @endforeach
</div>
@endif
@stop
@section('content')
<div class="row">
    <main class="col-md-12">
        <header class="border-bottom mb-4 pb-3">
            <div class="form-inline">
                @guest
                @else
                <span class="mr-md-auto"> <a href="{{route('product.show')}}" class="btn btn-outline-primary"
                    data-toggle="tooltip" title="List view">Agregar Producto</a></span>
                @endguest
                <span class="mr-md-auto"></span>              
                <select class="mr-2 form-control">
                    <option>Agregados recientemente</option>
                    <option>Más Caro</option>
                    <option>Más Barato</option>
                </select>
                <div class="btn-group">
                    <a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title="List view">
                        <i class="fa fa-bars"></i></a>
                    <a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip" title="Grid view">
                        <i class="fa fa-th"></i></a>
                </div>
            </div>
        </header><!-- sect-heading -->

        <div class="row">
            @foreach($products as $product)
            <div class="col-md-2">
                <figure class="card card-product-grid">
                    <div class="img-wrap">
                        <img
                            src="{{($product -> img == "") ? 'https://ui-avatars.com/api/?name='.$product -> nombre.'&size=55' : asset($product->img)}}">
                        {{--   <a class=" btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a> --}}
                    </div> <!-- img-wrap.// -->
                    <figcaption class="info-wrap">
                        <div class="fix-height">
                            <a href="#" class="title">{{$product -> nombre}}</a>
                            <div class="price-wrap mt-2">
                                <span class="price">${{$product -> precio_menudeo}}</span>
                            </div> <!-- price-wrap.// -->
                            <div class="price-wrap mt-2">
                                <span class="">Código: {{$product -> codigo}}</span>
                            </div> <!-- price-wrap.// -->
                        </div>
                        {{--  <a href="#" class="btn btn-block btn-primary">Add to cart </a> --}}
                    </figcaption>
                    @guest
                    @else                   
                    <div class="btn-group btn-group-toggle">
                        <a href="{{route('product.edit', $product -> id)}}"
                            class="btn btn-warning btn-sm wtext">Actualizar</a>
                            <form action="{{route('product.destroy',$product)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Desea eiminar el producto ... ?')">
                            </form>
                    </div>                  
                    @endguest     
                </figure>

            </div> <!-- col.// -->
            @endforeach

        </div> <!-- row end.// -->
        <div class="d-flex  justify-content-end">
            {{$products-> links('vendor.pagination.bootstrap-4')}}
        </div>

    </main> <!-- col.// -->

</div>

@stop