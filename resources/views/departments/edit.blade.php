@extends('master')
@section('breadcrumb')
<nav>
    <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{route('departments')}}">Departamentos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar departamento</li>
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
                <form action="{{ route('departments.update',$department->id)}}" method="POST">
                    <div class="form-row d-flex justify-content-center">
                        <div class="col-sm-4">
                            <input type="text" name="nombre" class="form-control" placeholder="Categoria"
                                value="{{$department->nombre}}">
                        </div>

                        <div class="col-sm-3">
                            <select id="inputAvailability" class="form-control" name="status">
                                <option @if($department -> status == 1) selected @endif value="1">Disponible</option>
                                <option @if($department -> status == 0) selected @endif value="0">No Disponible</option>
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