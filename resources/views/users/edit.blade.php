@extends('master')
@section('breadcrumb')
<nav>
    <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{route('users')}}">Usuarios</a></li>
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
                <form action="{{ route('users.update',$user->id)}}" method="POST">
                    <div class="form-row">
                        <div class="col-sm-3">
                            <input type="text" name="name" class="form-control" placeholder="Usuario"
                                value="{{$user->name}}">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="email" class="form-control" placeholder="Email"
                                value="{{$user->email}}">
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