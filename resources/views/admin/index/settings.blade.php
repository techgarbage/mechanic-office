@extends('admin.master')
@section('title', 'Ajustes')
@section('main-title', 'Todos los Ajustes')

@section('main')
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif
    <form action="{{route('settings.update', ['id' => null])}}" method="POST" class="w-75 mt-5" style="margin: 0 auto;">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="col-5 mr-5 mb-2 d-inline-block font-weight-bold text-center">Clave</div>
        <div class="col-5 mr-5 mb-2 d-inline-block font-weight-bold text-center">Valor</div>
        @foreach($settings as $item)
            <div class="form-group">
                <input type="text" class="form-control col-5 d-inline-block mr-5" name="setting_name[{{$item->id}}]" value="{{$item->setting_name}}" readonly>
                <input type="text" class="form-control col-5 d-inline-block mr-5" name="setting_value[{{$item->id}}]" value="{{$item->setting_value}}">
            </div>
        @endforeach
        <h6><small>* Todos los cambios realizados aquí afectan globalmente a la configuración del sitio.</small></h6>
        <button type="submit" class="btn btn-danger btn-sm">Actualizar</button>
    </form>
@endsection