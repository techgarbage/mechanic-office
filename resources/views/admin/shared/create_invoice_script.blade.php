<script type="text/javascript">
    var ivapercent = $('#iva1');

    function roundNumber(number,decimals) {
        var newString;// The new rounded number
        decimals = Number(decimals);
        if (decimals < 1) {
            newString = (Math.round(number)).toString();
        } else {
            var numString = number.toString();
            if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
                numString += ".";// give it one at the end
            }
            var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
            var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
            var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
            if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
                if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
                    while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
                        if (d1 != ".") {
                            cutoff -= 1;
                            d1 = Number(numString.substring(cutoff,cutoff+1));
                        } else {
                            cutoff -= 1;
                        }
                    }
                }
                d1 += 1;
            }
            if (d1 == 10) {
                numString = numString.substring(0, numString.lastIndexOf("."));
                var roundedNum = Number(numString) + 1;
                newString = roundedNum.toString() + '.';
            } else {
                newString = numString.substring(0,cutoff) + d1.toString();
            }
        }
        if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
            newString += ".";
        }
        var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
        for(var i=0;i<decimals-decs;i++) newString += "0";
        //var newNumber = Number(newString);// make it a number if you like
        return newString; // Output the result to the form field (change for your purposes)
    }

    function updateTotal() {
        var subtotal = 0;
        $('.price').each(function(i){
            price = $(this).html().replace(" <small>EUR</small>","");
            if (!isNaN(price)) subtotal += Number(price);
        });
        subtotal = roundNumber(subtotal,2);
        var porcentaje = ivapercent.text()/100;
        var iva = roundNumber(subtotal*porcentaje,2);
        var total = roundNumber(subtotal*(porcentaje+1),2);



        $('#subtotal').html(subtotal+" <small>EUR</small>");
        $('#iva').html(iva+" <small>EUR</small>");
        $('#total').html(total+" <small>EUR</small>");
    }


    function updatePrice() {
        var row = $(this).parents('.item-row');
        console.log(row)
        var price = row.find('.cost').val().replace(" <small>EUR</small>", "") * row.find('.qty').val();
        price = roundNumber(price, 2);
        isNaN(price) ? row.find('.price').html("N/A") : row.find('.price').html(price+" <small>EUR</small>");

        updateTotal();
    }
    function updateAllPrices() {
        $(".cost").blur(updatePrice);
        $(".qty").blur(updatePrice);
        updateTotal();
    }
    /******************************************************************************************************************/
    var client = $('#client');
    var vehicle = $('#vehicle');
    /*function updateClient(data){
        unsetClient();
        unsetVehicles();
        $('#client').val(data['id']);
        $('#client').attr('value', data['id']);
        $('#searchClientButton').text('Cambiar cliente');
        $('#temp_owner').text(data['name']+' '+data['last_name']);
        $('#client_data').append('<p>'+data['dni']+',<br>'+data['name']+' '+data['last_name']+'</p>')

    }*/
    function getElementById( element, id, params ){
        var result = null;
        var scriptUrl;
        (id) ? scriptUrl = '/api/v1/'+element+'/'+id : scriptUrl='/api/v1/'+element+'?'+params;
        console.log(scriptUrl);
        $.ajax({
            url: scriptUrl,
            type: 'get',
            dataType: 'json',
            async: false,
            success: function(data) {
                result = data;
            }
        });
        return result;
    }
    function getClientById( id ) {
        return getElementById('clients', id);
    }
    function getVehicleById( id ) {
        return getElementById('vehicles', id);
    }
    function  getVehicleByClientId(client_id) {
        return getElementById('vehicles', false, 'client_id='+client_id);
    }
    function unsetElement(input, paragraph, temp_element){
        $(input).val('');
        $(paragraph).remove();
        $(temp_element).text('Ninguno seleccionado');
    }

    function unsetVehicles(){
        unsetElement(vehicle, '#vehicle_data p', '#temp_vehicle');
    }
    function setClient(id){
        unsetVehicles();
        client.val(id);
        client.attr('value', id);
    }
    function updateClient(){
        if(client.val()){
            var data = getClientById(client.val());
            $('#temp_owner').text(data['data']['name']+' '+data['data']['last_name']);
            $('#client_data>p').html(data['data']['dni']+',<br>'+data['data']['name']+' '+data['data']['last_name']);
        }
    }

    function clearVehiclesTable(){
        $('#vehicle_table td').each(function(){$(this).remove()});
    }

    function setVehiclesTable(){
        var vehicles = getVehicleByClientId(client.val());
        clearVehiclesTable();
        $.each(vehicles['data'], function(index, value){
            renderVehiclesTable(value);
        });

        $('.vehicle_select').on('click', function () {
            var row = [];
            $(this).parent().siblings('td').each(function(){
                row.push($(this).text())
            });

            setVehicle(row);
        })
    }

    function setVehicle(row){
        var data = {
            'id': row[0],
            'vehicle_registration': row[1],
            'brand': row[2],
            'model': row[3]
        };
        $('#vehicle').val(row[0])
        $('#vehicle').attr('value', row[0])
        updateVehicle();
    }

    function updateVehicle(){
        if(vehicle.val()!= undefined){
            var vehicle_all = getVehicleById(vehicle.val());
            var vehicle_data = vehicle_all['data'];
            var vehicle_meta = vehicle_all['meta'];
            if(vehicle_meta['data']!=undefined){
                console.log(vehicle_meta)
            $('#searchVehicleButton').text('Cambiar vehículo')
            $('#temp_vehicle').text(vehicle_data['vehicle_registration']+' ('+vehicle_meta['data']['brand_name']+' '+vehicle_meta['data']['model_name']+')')
            $('#vehicle_data p').each(function(){
                $(this).remove()
            });
            $('#vehicle_data').append('<p>'+vehicle_data['vehicle_registration']+',<br>'+vehicle_meta['data']['brand_name']+' '+vehicle_meta['data']['model_name']+'</p>')
            }
        }
    }
    function renderVehiclesTable(values){
        $('#vehicle_table').append('<tr>+' +
            '<td>'+values['data']['id']+'</td>'+
            '<td>'+values['data']['vehicle_registration']+'</td>'+
            '<td>'+values['meta']['data']['brand_name']+'</td>'+
            '<td>'+values['meta']['data']['model_name']+'</td>'+
            '<td><button type="button" class="btn btn-secondary btn-sm vehicle_select" data-dismiss="modal">Seleccionar vehículo</button></td>'+
            '</tr>')
    }
    function renderItemsTable(item_data){
        $('#main_table tbody').find('tr').eq(-3)
            .before(
                '<tr class="item-row">' +
                '<td class="text-center">' +
                '<input type="number" name="invoice_data[quantity][]" value="1" min="1" style="border: 0;" class="form-control text-center cost">' +
                '<div class="delete-wpr">' +
                '<div class="fa fa-fw fa-times-circle delete text-danger"><!--<a class="delete" href="javascript:;" title="Remove row">X</a>--></div>' +
                '</div>'+
                '</td>' +
                '<td class="text-center description">' +
                '<input type="text" name="invoice_data[description][]" value="'+item_data['description']+'" class="form-control text-center" style="border: 0;" readonly>' +
                '</td>' +
                '<td>' +
                '<input type="number" name="invoice_data[unit_price][]" value="'+item_data['price']+'" class="form-control pl-0 qty" style="border: 0;" readonly>' +
                '</td>' +
                '<td class="text-right">' +
                '<span class="price">'+item_data['price']+' <small>EUR</small></span>' +
                '</td>' +
                '</tr>'

            )
    }



    /* VAMOS A LA ACCIÓN */
    $(document).ready(function() {

        /* Bloqueamos la funcionalidad de Enter para hacer submit (para evitar que se envie el form sin quererlo) */
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });





        var table = $('#clients_table').DataTable( {
            "ajax": "{{ route('datatables.clients') }}?clients_with_vehicles",
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
                    defaultContent: '<button class="btn btn-secondary btn-sm" data-dismiss="modal" aria-label="Close" type="button">Seleccionar cliente</button>'
                }

            ]
        } );


        $('#clients_table').on( 'click', 'button', function () {
            var data = table.row( $(this).parents('tr') ).data();
            setClient(data['id']);
            updateClient();

            setVehiclesTable();

        } );



        /** Items **/
        var items_table = $('#items_table').DataTable( {
            "ajax": "{{ route('datatables.items') }}",
            "pageLength": 5,
            "columns": [
                {data: 'id', name: 'id', type: 'link'},
                {data: 'reference', name: 'reference'},
                {data: 'description', name: 'description'},
                {data: 'price', name: 'price'},
                {
                    data: null,
                    defaultContent: '<button class="btn btn-secondary btn-sm" type="button">Seleccionar artículo</button>'
                }
            ]
        } );



        $('#items_table').on( 'click', 'button', function () {
            var item_data = items_table.row( $(this).parents('tr') ).data();
            renderItemsTable(item_data);
            updateAllPrices();
            $(".delete").on('click',function(){
                $(this).parents('.item-row').remove();
                updateTotal();
            });
        } );


    } );
    /*Establecemos esto fuera de eventos por si el usuario obtiene errores, y se le recarga la página manteniendo los datos, que estos no pierdan la funcionalidad JS*/
    $(".delete").on('click',function(){
        $(this).parents('.item-row').remove();
        updateTotal();
    });
    updateAllPrices();
    updateClient();
    setVehiclesTable();
    updateVehicle();
</script>