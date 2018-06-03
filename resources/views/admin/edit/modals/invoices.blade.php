<!-- Modal Clients -->
<div class="modal fade" id="searchClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document"  style="max-width: 1050px!important">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Buscador de Clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">El cliente actualmente seleccionado es:
                    <span id="temp_owner">

                    </span>
                </p>
                <table class="table table-striped table-bordered w-80" id="clients_table">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                <!--<button type="button" class="btn btn-primary" id="apply_owner">Aplicar</button>-->
            </div>
        </div>
    </div>
</div>
<!-- End Modal Clients -->


<!-- Modal Vehicles -->
<div class="modal fade" id="searchVehicle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document"  style="max-width: 1050px!important">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Selector de Vehiculos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-md-center">El vehículo actualmente seleccionado es: <span id="temp_vehicle">

                    </span></p>
                <table class="table table-striped table-bordered w-80" id="vehicle_table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Matrícula</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Acción</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                <!--<button type="button" class="btn btn-primary" id="apply_owner">Aplicar</button>-->
            </div>
        </div>
    </div>
</div>
<!-- End Modal Vehicles -->


<!-- Modal Items -->
<div class="modal fade" id="searchItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document"  style="max-width: 800px!important">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Buscador de Artículos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">El cliente actualmente seleccionado es: <span id="temp_owner">Ninguno seleccionado</span></p>
                <table class="table table-striped table-bordered" id="items_table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Acción</th>
                    </tr>
                    </thead>


                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                <!--<button type="button" class="btn btn-primary" id="apply_owner">Añadir</button>-->
            </div>
        </div>
    </div>
</div>
<!-- End Modal Items -->