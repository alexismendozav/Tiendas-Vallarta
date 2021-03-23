@extends('master')
@section('content')
<div class="row">
    <main class="col-md-12">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <figure class="card card-product-grid card-me">
                    <a hrref="#" class="img-wrap">
                        <img
                            src="{{($product -> img == "") ? 'https://ui-avatars.com/api/?name='.$product -> nombre.'&size=55' : asset($product->img)}}">
                        {{--   <a class=" btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a> --}}
                    </a> <!-- img-wrap.// -->
                    <figcaption class="info-wrap">
                        <p>
                            <a href="#" class="title">{{$product->nombre}}</a>
                        </p>
                        <span class="tag">{{$product->codigo}}</span>
                        <span class="tag">{{$product->unity->nombre}}</span>
                        <span class="tag">{!!$product->get_disponibility!!}</span>
                    </figcaption>
                    <div class="bottom-wrap d-flex align-items-center">
                        <div class="mr-3"> <span class="price h6 ml-3">${{$product->precio_menudeo}}</span> </div>
                        <!-- price.// -->
                        <div class="ml-auto form-inline">
                            <p class="mr-3 text-muted">{{$product->location->name}}</p>
                        </div>
                    </div> <!-- bottom-wrap.// -->
                    @guest
                    @else
                    <div class="row justify-content-center mb-lg-2">
                        <a href="{{route('product.edit', $product -> id)}}"
                            class="btn btn-warning btn-sm wtext marginr">Actualizar</a>
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
    </main> <!-- col.// -->
</div>
@stop