@extends('admin.master')
@section('title', 'Facturas')
@section('main-title')
    Factura #{{$invoice->invoice_number}} - {{$invoice->vehicle['vehicle_registration']}} ({{$invoice->vehicle->model->brand['name']}} {{$invoice->vehicle->model['name']}})
@endsection
@section('action-button')
    <a href="{{route('invoices.edit', ['id' => $invoice['id']])}}" class="btn btn-primary btn-sm">Editar</a>
@endsection

@section('main')
    <style>
        @media print{
            .navbar, .sidebar, button, h2, a, .card-footer {
                display: none!important;
            }
        }
        @page {   margin: 0mm; }

    </style>
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif
    @if($invoice->count()>0)
        @php($iva = /*\App\Setting::getValueByName('iva')->toArray()[0]['setting_value']*/ $invoice->iva)

        <div class="card">
            <div class="card-body" id="print-zone">
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
                            <div class="col-md">
                                <h5 class="text-uppercase">Fecha</h5>
                                <p class="mb-0">{{$invoice->created_at->format('d-m-Y')}}</p>
                            </div>
                            <div class="col-md text-md-center">
                                <h5 class="text-uppercase">Factura No.</h5>
                                <p class="mb-0">{{$invoice->id}}</p>
                            </div>
                            <div class="col-md text-md-center">
                                <h5 class="text-uppercase">Cliente</h5>
                                <p class="mb-0">
                                    {{$invoice->vehicle->client['dni']}},<br>{{$invoice->vehicle->client['name']}} {{$invoice->vehicle->client['last_name']}}
                                </p>
                            </div>
                            <div class="col-md text-md-right">
                                <h5 class="text-uppercase">Vehículo</h5>
                                <p class="mb-0">
                                    {{$invoice->vehicle['vehicle_registration']}},<br>{{$invoice->vehicle->model->brand['name']}} {{$invoice->vehicle->model['name']}}  ({{$invoice->vehicle_kilometers}} km)
                                </p>
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
                                @php($subtotal = 0)
                                @php($invoice_data = $invoice->invoices_data)
                                @foreach($invoice_data as $row)

                                    <tr class="item-row">
                                        <td class="text-center">{{$row['quantity']}}</td>
                                        <td class="text-center description">{{$row['description']}}</td>
                                        <td>{{$row['unit_price']}}</td>
                                        <td class="text-right">{{((double)$row['quantity'])*((double) $row['unit_price']) }} <small>EUR</small></td>
                                    </tr>
                                    @php($subtotal+=((double)$row['quantity'])*((double) $row['unit_price']))

                                @endforeach
                            <tr class="bg-light font-weight-bold">
                                <td></td>
                                <td></td>
                                <td class="text-uppercase">Subtotal</td>
                                <td class="text-right" id="subtotal">{{$subtotal}} <small class="font-weight-bold">EUR</small></td>
                            </tr>
                            <tr class="bg-light font-weight-bold">
                                <td></td>
                                <td></td>
                                <td class="text-uppercase">Impuestos ({{$iva}}%)</td>
                                <td class="text-right" id="iva">{{round($subtotal*($iva/100), 2)}} <small class="font-weight-bold">EUR</small></td>
                            </tr>
                            <tr class="bg-light font-weight-bold">
                                <td></td>
                                <td></td>
                                <td class="text-uppercase">Total</td>
                                <td class="text-right" id="total">{{round($subtotal*(($iva/100)+1),2)}} <small class="font-weight-bold">EUR</small></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-primary" type="button" id="print"  onclick="print()"><i class="fas fa-print"></i> Imprimir</button>
            </div>
        </div>
    @else
        <p> Sorry, you don't see this content. </p>
    @endif
@endsection