@extends('admin.master')
@section('title', 'Actualizar Factura')
@section('main-title', 'Actualizar Factura')

@section('main')
    <style>
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number] {
            -moz-appearance:textfield;
        }
        .delete-wpr { position: relative; }
        .delete {
            display: block;
            position: absolute;
            padding: 0px 3px;
            top: -25px;
            left: -22px;

            cursor: hand;
            cursor: pointer;
        }
        .delete:hover{

        }
    </style>
    @php( $iva = $data['iva'] )
    <form action="{{route('invoices.update', ['id' => $data['id']])}}" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="card">
            <div class="card-body">
                <div class="row py-5">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-md">
                                <h1 class="text-uppercase">Factura</h1>
                            </div>
                            <div class="col-md text-md-right">
                                <img src="{{\App\Setting::getValueByName('logo')[0]['setting_value']}}" class="img-fluid" width="150px">
                                <p class="mt-2 mb-0">
                                    {{\App\Setting::getValueByName('address')[0]['setting_value']}}<br>
                                    {{\App\Setting::getValueByName('city')[0]['setting_value']}}
                                </p>
                            </div>
                        </div>

                        <hr class="my-5">

                        <div class="row">
                            <div class="col-md text-md-left">
                                <h5 class="text-uppercase">Cliente</h5>
                                <div id="client_data">
                                    <p></p>
                                </div>
                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#searchClient" id="searchClientButton">Cambiar Cliente</button>
                                <div class="text-danger">
                                    {{$errors->first('client')}}
                                </div>
                            </div>
                            <div class="col-md text-md-center">
                                <h5 class="text-uppercase">Vehículo</h5>
                                <div id="vehicle_data">
                                    <p></p>
                                </div>
                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#searchVehicle" id="searchVehicleButton">Cambiar Vehículo</button>
                                <div class="text-danger">
                                    {{$errors->first('vehicle')}}
                                </div>
                            </div>
                            <div class="col-md text-md-right">
                                <h5 class="text-uppercase">Kilómetros del Vehículo</h5>
                                <input type="number" style="border:0px;" name="vehicle_kilometers" min="0" class="form-control text-right {{(strlen($errors->first('vehicle_kilometers'))>0) ? 'is-invalid' : ''}} {{(strlen($errors->first('vehicle_kilometers'))==0 && sizeof($errors)>0) ? 'is-valid' : ''}}" value="{{(old('vehicle_kilometers')) ? old('vehicle_kilometers') : $data['vehicle_kilometers']}}">
                                <div class="invalid-feedback">
                                    {{$errors->first('vehicle_kilometers')}}
                                </div>
                            </div>
                        </div>

                        <hr class="my-5">
                        <table class="table table-borderless mb-0 table-responsive-lg" id="main_table">
                            <thead>
                            <tr class="border-bottom text-uppercase">
                                <th scope="col" width="10%" class="text-center">Unidades</th>
                                <th scope="col" width="63%" class="text-center">Descripción</th>
                                <th scope="col" class="text-left" width="12%">Precio Unitario</th>
                                <th scope="col" class="text-right" width="15%">Precio Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(old('invoice_data'))
                                <?php $invoice_data= (array) old('invoice_data')?>
                                @for($i=0; $i<sizeof($invoice_data['quantity']); $i++)
                                    <tr class="item-row">
                                        <td class="text-center">
                                            <input type="number" name="invoice_data[quantity][]" value="{{$invoice_data['quantity'][$i]}}" min="1" style="border: 0;" class="form-control text-center cost">
                                            <div class="delete-wpr">
                                                <div class="fa fa-fw fa-times-circle delete text-danger"></div>
                                            </div>
                                        </td>
                                        <td class="text-center description">
                                            <input type="text" name="invoice_data[description][]" value="{{$invoice_data['description'][$i]}}" class="form-control text-center" style="border: 0;" readonly="">
                                        </td>
                                        <td>
                                            <input type="number" name="invoice_data[unit_price][]" value="{{$invoice_data['unit_price'][$i]}}" class="form-control pl-0 qty" style="border: 0;" readonly="">
                                        </td>
                                        <td class="text-right"><span class="price"><?php echo ((double)$invoice_data['quantity'][$i])*((double) $invoice_data['unit_price'][$i]); ?> <small>EUR</small></span></td>
                                    </tr>
                                @endfor
                            @else
                                @php($invoice_data = $data->invoices_data->toArray())
                                @for($i=0; $i<sizeof($invoice_data); $i++)
                                    <tr class="item-row">
                                        <td class="text-center">
                                            <input type="number" name="invoice_data[quantity][]" value="{{$invoice_data[$i]['quantity']}}" min="1" style="border: 0;" class="form-control text-center cost">
                                            <div class="delete-wpr">
                                                <div class="fa fa-fw fa-times-circle delete text-danger"></div>
                                            </div>
                                        </td>
                                        <td class="text-center description">
                                            <input type="text" name="invoice_data[description][]" value="{{$invoice_data[$i]['description']}}" class="form-control text-center" style="border: 0;" readonly="">
                                        </td>
                                        <td>
                                            <input type="number" name="invoice_data[unit_price][]" value="{{$invoice_data[$i]['unit_price']}}" class="form-control pl-0 qty" style="border: 0;" readonly="">
                                        </td>
                                        <td class="text-right"><span class="price"><?php echo ((double)$invoice_data[$i]['quantity'])*((double) $invoice_data[$i]['unit_price']); ?> <small>EUR</small></span></td>
                                    </tr>
                                @endfor
                            @endif
                            <tr class="bg-light font-weight-bold">
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#searchItem" id="searchItemButton">Añadir artículo</button>
                                </td>
                                <td></td>
                                <td class="text-uppercase">Subtotal</td>
                                <td class="text-right" id="subtotal"></td>
                            </tr>
                            <tr class="bg-light font-weight-bold">
                                <td></td>
                                <td></td>
                                <td class="text-uppercase">Impuestos (<span id="iva1">{{$iva}}</span>%)</td>
                                <td class="text-right" id="iva"></td>
                            </tr>
                            <tr class="bg-light font-weight-bold">
                                <td></td>
                                <td></td>
                                <td class="text-uppercase">Total</td>
                                <td class="text-right" id="total"></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-danger text-center">
                            {{$errors->first('invoice_data')}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary" type="submit">Actualizar factura</button>
            </div>
        </div>
        @include('admin.edit.modals.invoices')
        <input type="hidden" id="client" name="client" value="{{(old('client')) ? old('client') : $data->vehicle->client['id']}}">
        <input type="hidden" id="vehicle" name="vehicle" value="{{(old('vehicle')) ? old('vehicle') : $data->vehicle['id']}}">
    </form>
    @include('admin.shared.create_invoice_script')
@endsection