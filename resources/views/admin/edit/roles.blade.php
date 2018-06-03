@extends('admin.master')
@section('title', 'Editar Role')
@section('main-title', 'Editar Role')

@section('main')

    <form action="{{route('roles.update', ['id' => $data['id']])}}" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="card-mb-4">
            <div class="card-header bg-white font-weight-bold">
                Datos del role
            </div>
            <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nombre</label>
                            <input class="form-control {{(strlen($errors->first('name'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('name'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="name" id="name" placeholder="Nombre" value="{{(strlen(old('name')>0)) ? old('name') : $data['name']}}" required="" type="text">
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug">Slug</label>
                            <input class="form-control {{(strlen($errors->first('slug'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('slug'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}"  name="slug" id="slug" placeholder="Slug" value="{{(strlen(old('slug')>0)) ? old('slug') : $data['slug']}}" required="" type="text">
                            <div class="invalid-feedback">
                                {{$errors->first('slug')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="description">Descripción</label>
                            <textarea class="form-control {{(strlen($errors->first('description'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('description'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="description" id="description" placeholder="Descripción" required="" rows="3">{{(strlen(old('description')>0)) ? old('description') : $data['description']}}</textarea>
                            <div class="invalid-feedback">
                                {{$errors->first('description')}}
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-footer bg-white pt-5">
            </div>
        </div>
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Permisos del role
            </div>
            <div class="card-body">
                <div class="ml-4">
                    @php ($role_permissions = $data->getPermissions())
                    @foreach($permissions as $permission)
                        <div class="form-check">
                            <input type="checkbox" name="permissions[{{$permission->id}}]" id="{{$permission->slug}}" class="form-check-input" @if(isset(old('permissions')[$permission->id]))  {{'checked'}} @endif @if( old('permissions') == null && in_array($permission->slug, $role_permissions)) {{'checked'}} @endif >
                            <label for="{{$permission->slug}}">{{$permission->name}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary" type="submit">Actualizar role</button>
            </div>
        </div>
    </form>
@endsection