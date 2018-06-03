@extends('admin.master')
@section('title', 'Nuevo Modelo')
@section('main-title', 'Nuevo Modelo')

@section('main')

    <form action="{{route('models.store')}}" method="POST">
        {{csrf_field()}}
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">Datos del modelo</div>

            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="brand_id">Marca</label>
                        <select class="form-control custom-select {{(strlen($errors->first('brand_id'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('brand_id'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="brand_id" id="brand_id">
                            <option value="" disabled selected>Seleccione una marca</option>
                            @foreach(App\Brand::all() as $value)
                                @if(old('brand_id') == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                @else
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            {{$errors->first('brand_id')}}
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="name">Modelo</label>
                        <input type="text" name="name" id="name" class="form-control {{(strlen($errors->first('name'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('name'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" value="{{old('name')}}">
                        <div class="invalid-feedback">
                            {{$errors->first('name')}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-white">
                <button class="btn btn-primary" type="submit">Añadir modelo</button>
            </div>
        </div>
    </form>
@endsection