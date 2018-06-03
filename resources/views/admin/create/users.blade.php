@extends('admin.master')
@section('title', 'Nuevo Usuario')
@section('main-title', 'Nuevo Usuario')

@section('main')

    <form action="{{route('users.store')}}" method="POST">
        {{csrf_field()}}
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
                        <input class="form-control {{(strlen($errors->first('name'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('name'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="name" id="name" placeholder="Nombre" value="{{old('name')}}" required="" type="text">
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
                        <input class="form-control {{(strlen($errors->first('email'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('email'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}"  name="email" id="email" placeholder="Email" value="{{old('email')}}" required="" type="text">
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
                        <input class="form-control {{(strlen($errors->first('password'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('password'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="password" id="password" placeholder="Contraseña" required="" value="{{old('password')}}">
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
                Roles del usuario
            </div>
            <div class="card-body">
                <div class="ml-4">
                    @foreach($roles as $role)
                        <div class="form-check">
                            <input type="checkbox" name="roles[{{$role->id}}]" id="{{$role->slug}}" class="form-check-input" @if(isset(old('roles')[$role->id]))  {{'checked'}} @endif>
                            <label for="{{$role->slug}}">{{$role->name}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary" type="submit">Añadir usuario</button>
            </div>
        </div>
    </form>
@endsection