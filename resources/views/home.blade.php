@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body justify-content-center d-flex">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        -{{$error}} <br>
                        @endforeach
                    </div>
                    @endif

                    <table class="table text-center  table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Catalogo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Departamentos</td>
                                <td><a href="/departments" class="btn btn-primary ">Ver</a></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Categorias</td>
                                <td><a href="/categories" class="btn btn-primary ">Ver</a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Unidades de medida</td>
                                <td><a href="/unities" class="btn btn-primary ">Ver</a></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Usuarios</td>
                                <td><a href="/users" class="btn btn-primary ">Ver</a></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection