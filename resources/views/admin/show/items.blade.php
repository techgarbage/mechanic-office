@extends('admin.master')
@section('title', 'Artículos')
@section('main-title')
    Artículo #{{$item->reference}}
@endsection
@section('action-button')
    <a href="{{route('items.edit', ['id' => $item['id']])}}" class="btn btn-primary btn-sm">Editar</a>
@endsection
@section('main')
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif
    @if($item->count()>0)
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Datos del artículo
            </div>
            <div class="card-body bg-white">
                <ul>
                    <li><b>Referencia:</b> {{$item->reference}}</li>
                    <li><b>Descripción:</b> {{$item->description}}</li>
                    <li><b>Precio unitario:</b> {{$item->price}}</li>
                    <li><b>Fecha de creación:</b> {{$item->created_at}}</li>
                    <li><b>Actualizado por última vez:</b> {{$item->updated_at}}</li>
                </ul>
            </div>

        </div>
    @else
        <p> Sorry, you don't see this content. </p>
    @endif
@endsection