@extends('admin.master')
@section('title', 'Editar Marca')
@section('main-title', 'Editar Marca')

@section('main')

    <form action="{{route('brands.update', ['id' => $data['id']])}}" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">Datos de la marca</div>

            <div class="card-body">

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="name">Nombre</label>
                        <input class="form-control {{(strlen($errors->first('name'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('name'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}"  name="name" id="name" placeholder="Nombre" value="{{(strlen(old('name')>0)) ? old('name') : $data['name']}}" required="" type="text">
                        <div class="invalid-feedback">
                            {{$errors->first('name')}}
                        </div>
                    </div>

                </div>

            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary" type="submit">Actualizar marca</button>
            </div>
        </div>
    </form>
@endsection