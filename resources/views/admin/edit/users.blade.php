@extends('admin.master')
@section('title', 'Editar Usuario')
@section('main-title', 'Editar Usuario')

@section('main')

    <form action="{{route('users.update', ['id' => $data['id']])}}" method="POST" autocomplete="false">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="card-mb-4">
            <div class="card-header bg-white font-weight-bold">
                Datos del usuario
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-1 col-form-label">
                        <label for="name">Nombre</label>
                    </div>
                    <div class="col-11">
                        <input class="form-control {{(strlen($errors->first('name'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('name'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="name" id="name" placeholder="Nombre" value="{{(strlen(old('name')>0)) ? old('name') : $data['name']}}" required="" type="text">
                        <div class="invalid-feedback">
                            {{$errors->first('name')}}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-1 col-form-label">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-11">
                        <input class="form-control {{(strlen($errors->first('email'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('email'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}"  name="email" id="email" placeholder="Email" value="{{(strlen(old('email')>0)) ? old('email') : $data['email']}}" required="" type="text">
                        <div class="invalid-feedback">
                            {{$errors->first('email')}}
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-1 col-form-label">
                        <label for="password">Contraseña</label>
                    </div>
                    <div class="col-11">
                        <input class="form-control {{(strlen($errors->first('password'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('password'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="password" id="password" placeholder="Contraseña" type="password" autocomplete="new-password">
                        <div class="invalid-feedback">
                            {{$errors->first('password')}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white pb-5">
            </div>
        </div>
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Roles del Usuario
            </div>
            <div class="card-body">
                <div class="ml-4">
                    @php ($role_user = $data->getRoles())
                    @foreach($roles as $role)
                        <div class="form-check">
                            <input type="checkbox" name="roles[{{$role->id}}]" id="{{$role->slug}}" class="form-check-input" @if(isset(old('roles')[$role->id]))  {{'checked'}} @endif @if( old('roles') == null && in_array($role->slug, $role_user)) {{'checked'}} @endif >
                            <label for="{{$role->slug}}">{{$role->name}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary" type="submit">Actualizar usuario</button>
            </div>
        </div>
    </form>
@endsection