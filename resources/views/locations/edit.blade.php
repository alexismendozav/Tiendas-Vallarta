@extends('layouts.app')
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
                <form action="{{ route('locations.update',$location)}}" method="POST">
                    <div class="form-row">
                        <div class="col-sm-4">
                            <input type="text" name="name" class="form-control" placeholder="Locación"
                                value="{{$location->name}}">
                        </div>

                        <div class="col-sm-3">
                            <select id="status" class="form-control" name="status">
                                <option @if($location -> status == 1) selected @endif value="1">Disponible</option>
                                <option @if($location -> status == 0) selected @endif value="0">No Disponible</option>
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