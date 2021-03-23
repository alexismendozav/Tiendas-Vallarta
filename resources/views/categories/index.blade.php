@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-header "><h5>{{ __('Categorías') }}</h5></div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        @foreach ($errors->all() as $error)
                        -{{$error}} <br>
                        @endforeach
                    </div>
                    @endif
                    @if (Session::has('info'))
                    <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                        <strong> {{ Session::get('info')}} </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <form action="{{ route('categories.store')}}" method="POST">
                        <div class="form-row d-flex justify-content-center">
                            <div class="col-sm-4">
                                <input type="text" name="nombre" class="form-control" placeholder="Categoria"
                                    value="{{old('nombre')}}">
                            </div>
                            <div class="col-sm-3">
                                <select id="inputDepartment" class="form-control pointer" name="department">
                                    <option value="">Seleccione el departamento...</option>
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department -> nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select id="inputAvailability" class="form-control pointer" name="status">
                                    <option value="1" selected>Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                @csrf
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Categoría</th>
                                <th>Departamento</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <th>{{ $category->id}}</th>
                                <td>{{ $category->nombre}}</td>
                                <td>{{ $category->department->nombre }}</td>
                                <td>{!! $category->get_disponibility!!}</td>
                                <td>
                                    <div class="row justify-content-center d-flex">
                                        <a href="{{route('categories.edit',$category -> id)}}"
                                            class="btn btn-warning btn-sm marginr ">Editar</a>
                                        <form action="{{route('categories.destroy',$category)}}" method="POST">
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
    </div>
</div>
@endsection


