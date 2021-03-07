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
                            <p class="mr-3 text-muted">Mueble Blanco</p>
                        </div>
                    </div> <!-- bottom-wrap.// -->
                </figure>

            </div> <!-- col.// -->
            @endforeach
        </div> <!-- row end.// -->
    </main> <!-- col.// -->
</div>
@stop