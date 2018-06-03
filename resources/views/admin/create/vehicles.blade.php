@extends('admin.master')
@section('title', 'Nuevo Vehículo')
@section('main-title', 'Nuevo Vehículo')

@section('main')


    <form action="{{route('vehicles.store')}}" method="POST">
        {{csrf_field()}}
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">Datos del vehículo</div>

            <div class="card-body">

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="vehicle_registration">Matrícula</label>
                            <input class="form-control {{(strlen($errors->first('vehicle_registration'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('vehicle_registration'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}"  name="vehicle_registration" id="vehicle_registration" placeholder="Matrícula" value="{{old('vehicle_registration')}}" required="" type="text">
                            <div class="invalid-feedback">
                                {{$errors->first('vehicle_registration')}}
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="brand">Marca</label>
                            <select class="form-control custom-select" name="brand" id="brand">
                                <option value="" disabled selected>Seleccione una marca</option>
                                @foreach(App\Brand::all() as $value)
                                    @if(App\Model::find(old('model'))['brand_id'] == $value->id)
                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                    @else
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{$errors->first('brand')}}
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="model">Modelo</label>
                            <select class="form-control custom-select" name="model" id="model">
                                @if(old('model'))
                                    <option value="{{old('model')}}">{{App\Model::find(old('model'))['name']}}</option>
                                @else
                                    <option value="" disabled selected>Selecciona una marca para cargar los modelos</option>
                                @endif
                            </select>
                            <div class="invalid-feedback">
                                {{$errors->first('model')}}
                            </div>
                        </div>
                        <input type="hidden" name="owner" id="owner" value="{{old('owner')}}">
                    </div>

            </div>
            <div class="card-footer bg-white pb-5">
                <!--<button class="btn btn-primary" type="submit">Añadir vehículo</button>-->
            </div>
        </div>
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">Datos del Cliente</div>
            <div class="card-body">
                El propietario actual es: <span id="current_owner">Ningún cliente seleccionado</span>
                <table class="table table-striped table-bordered w-100" id="task">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Código Postal</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Acción</th>
                    </tr>
                    </thead>


                </table>
                <script type="text/javascript">
                    $(document).ready(function() {
                        var table = $('#task').DataTable( {
                            "ajax": "{{ route('datatables.clients') }}",
                            "columns": [
                                {data: 'id', name: 'id', type: 'link'},
                                {data: 'dni', name: 'dni'},
                                {data: 'name', name: 'name'},
                                {data: 'last_name', name: 'last_name'},
                                {data: 'city', name: 'city'},
                                {data: 'address', name: 'address'},
                                {data: 'postal_code', name: 'postal_code'},
                                {data: 'phone', name: 'phone'},
                                {
                                    data: null,
                                    defaultContent: '<button class="btn btn-secondary btn-sm" type="button">Seleccionar propietario</button>'
                                }

                            ]
                        } );

                        $('#task').on( 'click', 'button', function () {
                            var data = table.row( $(this).parents('tr') ).data();
                            $('#owner').val(data['id'])
                            $('#owner').attr('value', data['id'])
                            $('#current_owner').text(data['name']+' '+data['last_name'])
                        } );

                    } );
                </script>
            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary" type="submit">Añadir vehículo</button>
            </div>
        </div>
    </form>
    <script>
        (function( $ ) {
            'use strict';
            $('#brand').change(function(){
                var url = "/api/v1/models/?";
                var option_value = $(this).val();
                var query = url+"brand_id="+option_value;
                $.get( query, function( data ) {
                    $('#model').children().remove();
                    $.each(data, function(index1, value1){
                        $('#model').append('<option value="'+value1['id']+'">'+value1['name']+'</option>')
                    });
                });
            });

        })( jQuery );
    </script>
@endsection