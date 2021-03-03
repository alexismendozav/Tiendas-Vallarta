@extends('master')
@section('breadcrumb')
<nav>
    <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{route('unities')}}">Unidades de medida</a></li>
        <li class="breadcrumb-item active" aria-current="page">Todas las categorias</li>
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
                @if (Session::has('info'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hecho</strong> {{ Session::get('info')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{ route('unities.store')}}" method="POST" >
                    <div class="form-row d-flex justify-content-center">
                        <div class="col-sm-4">
                            <input type="text" name="nombre" class="form-control" placeholder="Unidad de medida"
                                value="{{old('nombre')}}">
                        </div>
                        <div class="col-sm-4">
                            <select id="inputAvailability" class="form-control pointer" name="status">
                                <option value="1" selected>Disponible</option>
                                <option value="0">No Disponible</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            @csrf
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </div>
                </form>
            </div>

            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Unidad de medida</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unities as $unity)
                    <tr>
                        <th>{{ $unity -> id}}</th>
                        <td>{{ $unity -> nombre}}</td>
                        @if ($unity->status == 1)
                        <td><p class="green">Activo</p></td>
                        @else
                        <td><p class="red">Inactivo</p></td>
                        @endif
                        <td>
                            <div class="row d-flex justify-content-center">
                                <a href="{{route('unities.edit',$unity -> id)}}"
                                    class="btn btn-warning btn-sm marginr ">Editar</a>
                                <form action="{{route('unities.destroy',$unity)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Desea eiminar ... ?')">
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop