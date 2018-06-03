@extends('admin.master')
@section('title', 'Nuevo Cliente')
@section('main-title', 'Nuevo Cliente')

@section('main')

    <form action="{{route('clients.store')}}" method="POST">
        {{csrf_field()}}
        <div class="card-mb-4">
            <div class="card-header bg-white font-weight-bold">
                Datos personales
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="dni">DNI</label>
                            <input class="form-control {{(strlen($errors->first('dni'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('dni'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}"  name="dni" id="dni" placeholder="DNI" value="{{old('dni')}}" required="" type="text">
                            <div class="invalid-feedback">
                                {{$errors->first('dni')}}
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="name">Nombre</label>
                            <input class="form-control {{(strlen($errors->first('name'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('name'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="name" id="name" placeholder="Nombre" value="{{old('name')}}" required="" type="text">
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="last_name">Apellidos</label>
                            <input class="form-control {{(strlen($errors->first('last_name'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('last_name'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="last_name" id="last_name" placeholder="Apellidos" value="{{old('last_name')}}" required="" type="text">
                            <div class="invalid-feedback">
                                {{$errors->first('last_name')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer03">Teléfono</label>
                            <input class="form-control {{(strlen($errors->first('phone'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('phone'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="phone" id="validationServer03" placeholder="Teléfono" value="{{old('phone')}}" required="" type="text">
                            <div class="invalid-feedback">
                                {{$errors->first('phone')}}
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer04">Dirección</label>
                            <input class="form-control {{(strlen($errors->first('address'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('address'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="address" id="validationServer04" placeholder="Dirección" value="{{old('address')}}" required="" type="text">
                            <div class="invalid-feedback">
                                {{$errors->first('address')}}
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationServerUsername">Ciudad</label>
                            <input class="form-control {{(strlen($errors->first('city'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('city'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="city" id="validationServerUsername" placeholder="Ciudad" value="{{old('city')}}" required="" type="text">
                            <div class="invalid-feedback">
                                {{$errors->first('city')}}
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationServer05">Código Postal</label>
                            <input class="form-control {{(strlen($errors->first('postal_code'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('postal_code'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="postal_code" id="validationServer05" placeholder="Código Postal" value="{{old('postal_code')}}" required="" type="text">
                            <div class="invalid-feedback">
                                {{$errors->first('postal_code')}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary" type="submit">Añadir cliente</button>
            </div>
        </div>
    </form>
@endsection