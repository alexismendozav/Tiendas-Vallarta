@extends('master')
@section('breadcrumb')
<nav>
    <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{route('users')}}"></a>Usuarios</li>
        <li class="breadcrumb-item active" aria-current="page">Todos los usuarios</li>
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
                     {{ Session::get('info')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-target="alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{ route('users.store')}}" method="POST" >
                    <div class="form-row d-flex justify-content-center">
                        <div class="col-sm-3">
                            <input type="text" name="name" class="form-control" placeholder="Nombre"
                                value="{{old('name')}}">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="email" class="form-control" placeholder="Email"
                                value="{{old('email')}}">
                        </div>
                        <div class="col-sm-3">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña"
                                value="{{old('password')}}">
                        </div>
                        <div class="col-auto">
                            @csrf
                            <button type="submit" class="btn btn-primary">Crear usuario</button>
                        </div>
                    </div>
                </form>
            </div>

            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id}}</th>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email}}</td>
                        <td>
                            <div class="row d-flex justify-content-center">
                                <a href="{{route('users.edit',$user->id)}}"
                                    class="btn btn-warning btn-sm marginr ">Editar</a>
                                <form action="{{route('users.destroy',$user)}}" method="POST">
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