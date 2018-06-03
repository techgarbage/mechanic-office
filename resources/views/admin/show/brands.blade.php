@extends('admin.master')
@section('title', 'Marcas')
@section('main-title')
    {{$brand->name}}
@endsection
@section('action-button')
    <a href="{{route('brands.edit', ['id' => $brand['id']])}}" class="btn btn-primary btn-sm">Editar</a>
@endsection
@section('main')
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif
    @if($brand->count()>0)
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Datos de {{$brand->name}}
            </div>
            <div class="card-body bg-white">
                <ul>
                    <li><b>Imagen:</b> </li>
                    <li><b>Nombre:</b> {{$brand->name}}</li>
                    <li><b>Fecha de creación:</b> {{$brand->created_at}}</li>
                    <li><b>Actualizado por última vez:</b> {{$brand->updated_at}}</li>
                </ul>
            </div>

        </div>
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Modelos pertenecientes a {{$brand->name}}
            </div>
            <div class="card-body bg-white">
                @if($brand->models->count()>0)
                    <ul>
                        @foreach($brand->models as $model)
                            <li><a href="{{route('models.show', ['id'=>$model['id']])}}">{{$model->name}}</a></li>
                        @endforeach
                    </ul>
                @else
                    <p>Sin modelos</p>
                @endif
            </div>
        </div>
    @else
        <p> Sorry, you don't see this content. </p>
    @endif
@endsection