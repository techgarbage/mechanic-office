@extends('admin.master')
@section('title', 'Nuevo Permiso')
@section('main-title', 'Nuevo Permiso')

@section('main')

    <form action="{{route('permissions.store')}}" method="POST">
        {{csrf_field()}}
        <div class="card-mb-4">
            <div class="card-header bg-white font-weight-bold">
                Datos del permiso
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nombre</label>
                            <input class="form-control {{(strlen($errors->first('name'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('name'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="name" id="name" placeholder="Nombre" value="{{old('name')}}" required="" type="text">
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug">Slug</label>
                            <input class="form-control {{(strlen($errors->first('slug'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('slug'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}"  name="slug" id="slug" placeholder="Slug" value="{{old('slug')}}" required="" type="text">
                            <div class="invalid-feedback">
                                {{$errors->first('slug')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="description">Descripción</label>
                            <textarea class="form-control {{(strlen($errors->first('description'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('description'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="description" id="description" placeholder="Descripción" required="" rows="3">{{old('description')}}</textarea>
                            <div class="invalid-feedback">
                                {{$errors->first('description')}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary" type="submit">Añadir permiso</button>
            </div>
        </div>
    </form>
@endsection