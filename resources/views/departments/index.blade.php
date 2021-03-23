@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-header"><h5>{{ __('Departamentos') }}</h5></div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        @foreach ($errors->all() as $error)
                        - {{$error}} <br>
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

                    <form action="{{ route('departments.store')}}" method="POST">
                        <div class="form-row d-flex justify-content-center">
                            <div class="col-sm-5">
                                <input type="text" name="nombre" class="form-control" placeholder="Departamento"
                                    value="{{old('nombre')}}">
                            </div>
                            <div class="col-sm-5">
                                <select id="inputStatus" class="form-control pointer" name="status">
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
                    <br>
                    <table class="table mx-auto text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Departamento</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                            <tr>
                                <th>{{ $department -> id}}</th>
                                <td>{{ $department -> nombre}}</td>
                                <td>
                                    <p>{!!$department -> get_disponibility!!}</p>
                                </td>

                                <td>
                                    <div class="row d-flex justify-content-center">
                                        <a href="{{route('departments.edit',$department -> id)}}"
                                            class="btn btn-warning btn-sm marginr ">Editar</a>
                                        <form action="{{route('departments.destroy',$department)}}" method="POST">
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