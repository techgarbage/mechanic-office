@extends('admin.master')
@section('main-title', 'Escritorio')
@section('main')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <div class="row mb-4">
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-primary text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-shopping-cart"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Artículos</p>
                    <h3 class="font-weight-bold mb-0">{{\App\Item::where('created_at', '>=', date('Y-m-d', time() - (365*24*60*60)))->count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-success text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-file-alt"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Facturas</p>
                    <h3 class="font-weight-bold mb-0">{{\App\Invoice::where('created_at', '>=', date('Y-m-d', time() - (365*24*60*60)))->count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-danger text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-car"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Vehículos</p>
                    <h3 class="font-weight-bold mb-0">{{\App\Vehicle::where('created_at', '>=', date('Y-m-d', time() - (365*24*60*60)))->count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-info text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-users"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Clientes</p>
                    <h3 class="font-weight-bold mb-0">{{\App\Client::where('created_at', '>=', date('Y-m-d', time() - (365*24*60*60)))->count()}}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white font-weight-bold">
                    Ingresos
                </div>
                <div class="card-body">
                    <div id="ingresos" style="height: 250px;"></div>
                </div>
            </div>
        </div>
    <script>
        $.get('/admin/ingresos', function(data){
            new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'ingresos',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: data,
                // The name of the data record attribute that contains x-values.
                xkey: 'year',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Ingresos']
            });
        })

    </script>
@endsection