@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Loaciones') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
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
                    <form action="{{ route('locations.store')}}" method="POST">
                        <div class="form-row d-flex justify-content-center">
                            <div class="col-sm-4">
                                <input type="text" name="name" class="form-control" placeholder="Locación"
                                    value="{{old('name')}}">
                            </div>
                            <div class="col-sm-4">
                                <select id="status" class="form-control pointer" name="status">
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
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Locación</th>
                            <th>Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $location)
                        <tr>
                            <th>{{ $location -> id}}</th>
                            <td>{{ $location -> name}}</td>
                            @if ($location->status == 1)
                            <td>
                                <p class=" text-success ">Activo</p>
                            </td>
                            @else
                            <td>
                                <p class="text-danger">Inactivo</p>
                            </td>
                            @endif
                            <td>
                                <div class="row d-flex justify-content-center">
                                    <a href="{{route('locations.edit',$location -> id)}}"
                                        class="btn btn-warning btn-sm marginr ">Editar</a>
                                    <form action="{{route('locations.destroy',$location)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="Eliminar" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Desea eiminar la locación ... ?')">
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