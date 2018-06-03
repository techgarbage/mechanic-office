@extends('master')
@section('title', 'Zona de Clientes | Mechanic-Office')
@php($id = Auth::id())
@php($user = Auth::user())
@php($client = App\Client::where('dni', '=', $user->email)->get()->first())

@section('main')
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn animated" data-wow-duration="1000ms" data-wow-delay="0.3s" style="visibility: visible;-webkit-animation-duration: 1000ms; -moz-animation-duration: 1000ms; animation-duration: 1000ms;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">Tus Facturas</h2>
                <hr class="lines wow zoomIn animated" data-wow-delay="0.3s" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                <p class="section-subtitle wow fadeIn animated" data-wow-duration="1000ms" data-wow-delay="0.3s" style="visibility: visible;-webkit-animation-duration: 1000ms; -moz-animation-duration: 1000ms; animation-duration: 1000ms;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">Bienvenido {{$client->name}}  {{$client->last_name}}:<br> A continuación te mostramos un listado de tus facturas.</p>
                <hr class="lines wow zoomIn animated animated mb-5" data-wow-delay="0.3s" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
            @foreach($client->vehicles as $vehicle)
                <h3 class="display-4 text-center" style="font-size: 20px!important; color: #333;">Facturas de {{$vehicle->vehicle_registration}} ({{$vehicle->model->brand->name}}  {{$vehicle->model->name}})</h3>
                @if($vehicle->invoices->isEmpty())
                    <p style="color:#333;">No hay facturas para este vehículo.</p>
                @else
                    <ul>
                        @foreach($vehicle->invoices as $invoice)
                            <li class="text-center"><a href="{{route('dashboard.show', ['id' => $invoice['id']])}}">Factura #{{$invoice->invoice_number}} ( {{$invoice->vehicle_kilometers}} km )</a></li>
                        @endforeach
                    </ul>
                @endif
                    <hr class="lines wow zoomIn animated animated mb-5" data-wow-delay="0.3s" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                @endforeach
            </div>





        </div>
        <a class="btn btn-primary m-auto" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Cerrar Sesión') }}
        </a>
    </section>



    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

@endsection