@extends('admin.master')
@section('title', 'Nuevo Role')
@section('main-title', 'Nuevo Role')

@section('main')

    <form action="{{route('roles.store')}}" method="POST">
        {{csrf_field()}}
        <div class="card-mb-4">
            <div class="card-header bg-white font-weight-bold">
                Datos del role
            </div>
            <div class="card-body">
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
            </div>
            <div class="card-footer bg-white pb-5">
            </div>
        </div>



        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Permisos del role
            </div>
            <div class="card-body">
                <div class="ml-4">
                    @foreach($permissions as $permission)
                        <div class="form-check">
                            <input type="checkbox" name="permissions[{{$permission->id}}]" id="{{$permission->slug}}" class="form-check-input" @if(isset(old('permissions')[$permission->id]))  {{'checked'}} @endif>
                            <label for="{{$permission->slug}}">{{$permission->name}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary" type="submit">Añadir role</button>
            </div>
        </div>
    </form>
@endsection