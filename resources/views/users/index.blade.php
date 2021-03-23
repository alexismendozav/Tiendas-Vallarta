@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-header">
                    <h5>{{ __('Usuarios') }}</h5>
                </div>

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

                    <form action="{{ route('users.store')}}" method="POST">
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

                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th class="text-center">Acciones</th>
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
    </div>
</div>
@endsection