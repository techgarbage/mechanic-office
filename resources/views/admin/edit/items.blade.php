@extends('admin.master')
@section('title', 'Editar Artículo')
@section('main-title', 'Editar Artículo')

@section('main')

    <form action="{{route('items.update', ['id' => $data['id']])}}" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="card-mb-4">
            <div class="card-header bg-white font-weight-bold">
                Datos del artículo
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="reference">Referencia</label>
                            <input class="form-control {{(strlen($errors->first('reference'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('reference'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}"  name="reference" id="reference" placeholder="Referencia" value="{{(strlen(old('reference')>0)) ? old('reference') : $data['reference']}}" required="" type="text">
                            <div class="invalid-feedback">
                                {{$errors->first('reference')}}
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="description">Descripción</label>
                            <input class="form-control {{(strlen($errors->first('description'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('description'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="description" id="description" placeholder="Descripción" value="{{(strlen(old('description')>0)) ? old('description') : $data['description']}}" required="" type="text">
                            <div class="invalid-feedback">
                                {{$errors->first('description')}}
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="price">Precio</label>
                            <input class="form-control {{(strlen($errors->first('price'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('price'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" name="price" id="price" placeholder="Precio" value="{{(strlen(old('price')>0)) ? old('price') : $data['price']}}" required="" type="number" step=".01" min="0">
                            <div class="invalid-feedback">
                                {{$errors->first('price')}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary" type="submit">Actualizar artículo</button>
            </div>
        </div>
    </form>
@endsection