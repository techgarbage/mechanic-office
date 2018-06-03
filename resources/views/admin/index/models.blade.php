@extends('admin.master')
@section('title', 'Modelos')
@section('main-title', 'Todos los Modelos')
@section('action-button')
    <a href="{{route('models.create')}}" class="btn btn-primary btn-sm">Nuevo modelo</a>
    <form action="" method="GET" class="col-3 d-inline-block input-group float-right"><input type="search" name="search" class="form-control w-75 input-sm float-right" style="display: inline-block!important" placeholder="Búsqueda" value="{{(isset ($_GET['search'])) ?  $_GET['search'] : ''}}"></form>

@endsection
@section('main')
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif
    @if(session('destroyed'))
        <div class="alert alert-success" role="alert">{{session('destroyed')}}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
    @endif
    @if(count($models)>0)

        <table class="table table-hover table-bordered table-responsive-lg mt-3">
            <thead>
            <tr>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Última actualización</th>
                <th scope="col">Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($models as $item)
                <tr>
                    <td>{{$item->brand['name']}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td class=" actions" valign="middle" align="center">
                        <a href="{{route('models.show', ['id' => $item['id']])}}" class="btn btn-icon btn-pill btn-dark" data-toggle="tooltip" title="" data-original-title="Ver"><i class="fa fa-fw fa-eye"></i></a>
                        <a href="{{route('models.edit', ['id' => $item['id']])}}" class="btn btn-icon btn-pill btn-primary" data-toggle="tooltip" title="" data-original-title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                        <a class="btn btn-icon btn-pill btn-danger" href="{{route('models.destroy', ['id' => $item['id']])}}" data-toggle="tooltip" title="" data-original-title="Eliminar" onclick="event.preventDefault(); document.getElementById('destroy_{{$item['id']}}').submit();">
                            <i class="fa fa-fw fa-trash"></i>
                        </a>

                        <form id="destroy_{{$item['id']}}" action="{{route('models.destroy', ['id' => $item['id']])}}" method="POST" style="display: none;">
                            @csrf
                            {{method_field('DELETE')}}
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!!$models->render()!!}

    @else
        <p> Sorry, models' table is empty. </p>
    @endif
@endsection