@extends('master')
@section('breadcrumb')
<nav>
    <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{route('unities')}}">Unidades de medida</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar unidad</li>
    </ol>
</nav>
@stop
@section('content')
   <div class="row">
    <div class="col-sm-10 mx-auto">
        <div class="card border-0 shadow">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    -{{$error}} <br>
                    @endforeach
                </div>
                @endif
                <form action="{{ route('unities.update',$unit->id)}}" method="POST">
                    <div class="form-row">
                        <div class="col-sm-4">
                            <input type="text" name="nombre" class="form-control" placeholder="Unidad de medida"
                                value="{{$unit->nombre}}">
                        </div>

                        <div class="col-sm-3">
                            <select id="inputAvailability" class="form-control" name="status">
                                <option @if($unit -> status == 1) selected @endif value="1">Disponible</option>
                                <option @if($unit -> status == 0) selected @endif value="0">No Disponible</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            @method('PUT')
                            @csrf
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
   </div>
@stop