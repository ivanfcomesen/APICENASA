
$(document).ready(function () {
    $('#numeroGuia').keypress(function (e) {
        if (e.which === 13) {
            e.preventDefault();
            $('#alertGuia').text('');
            var guia = $('#numeroGuia');
            $.ajax({
                url: 'guiaExiste',
                data: {guia: guia.val()},
                type: "get",
                //    dataType: "json",
                success: function (result) {
                    if (result === 'Formato Invalido!') {
                        $('#alertGuia').show().text('Formato invalido.');
                        guia.val('').focus();
                    } else {
                        //  $('#alertGuia').show().text('Nueva Guia.');
                        alert('Nueva Guia Creada.');
                        $('#numeroGuia').val(result.guia);
                        $('#codigoProductor').focus();
                    }
                }
            });
        }
    });
    $('#codigoProductor').keypress(function (e) {
        if (e.which == 13) {
            var codigoProductor = $('#codigoProductor');
            $.ajax({
                url: 'formatoProductor',
                data: {codigoProductor: codigoProductor.val()},
                type: "get",
                success: function (result) {
                    if (result === 'Formato Invalido!') {
                        $('#numeroSubastaProductor').hide();
                        $('#numeroSubastaProductor').show().text('Error');
                        codigoProductor.val('').focus();
                    } else {
                        $('#numeroSubastaProductor').show().text(result.codigoSubasta);
                        $('#codigoProductor').val(result.codigoProductor);
                        $('#nombreProductor').text("Ivan Francisco Sequeira Mesen");
                        $('#fincaProductor').val("123456");
                        $('#codStblProductor').val("123-123456");
                        $('#cedulaProductor').val("0123456789");
                        $('#codigoTransportista').focus();
                    }
                }
            });
        }
        // }
    });
    $('#codigoTransportista').keypress(function (e) {
        if (e.which == 13) {
            var codigoTransportista = $('#codigoTransportista');
            $.ajax({
                url: 'formatoTransportista',
                data: {codigoTransportista: codigoTransportista.val()},
                type: "get",
                success: function (result) {
                    if (result === 'Formato Invalido!') {
                        $('#numeroSub').hide();
                        $('#numeroSub').show().text('Error.');
                        codigoTransportista.val('').focus();
                    } else {
                        $('#numeroSub').show().text(result.codigoSubasta);
                        $('#codigoTransportista').val(result.codigoProductor);
                        $('#numeroAnimal').text("0" + (parseInt(result.numeroAnimal) + 1));
                        $('#tipoSubasta').focus();
                        $('#nombreTransportista').text("Pedro Juan Robles Sibaja");
                        $('#placaTransportista').val("123-123456");
                        $('#cedulaTransportista').val("0123456789");
                    }
                }
            });
        }
    });
    $('#agregarFila').click(function (e) {
        e.preventDefault();
        var codigoColor = $('#color').val();
        var codigoAnimal = $('#tipoSubasta').val();
        var condicion = "NO";
        var numeroAnimal = $('#numeroAnimal').text();
        
        if($('#ckCondicion').is(':checked')){
            condicion ="SI";
        }
        $.ajax({
            url: 'registroAnimal',
            data: {codigoColor: codigoColor, codigoAnimal: codigoAnimal, condicion: condicion, numeroAnimal: numeroAnimal},
            type: "get",
            success: function (result) {
                if (result === 'Codigo de Animal no existe') {
                    alert('Codigo de Animal no existe');
                } else
                if (result === 'Codigo de color no existe') {
                    alert('Codigo de color no existe');
                } else {
                    //   totalAnimales(parseInt($("#tipoSubasta").val()));
                    $("#tablaAnimales").append(result);
                    $('#numeroAnimal').text("0" + (parseInt($('#numeroAnimal').text()) + 1));
                    $('#color').val('');
                    $('#tipoSubasta').val('').focus();
                }
            }
        });
    });
    $('#quitarFila').click(function (e) {
        removeTableRow($('#tablaAnimales'));
    });
});
function guiaEmpty() {
    var flag = false;
    var guia = $('#numeroGuia');
    if (guia.val() === '') {
        alert('Debe digitar una guia');
        guia.focus();
        flag = true;
    }
    return flag;
}
function totalAnimales(numero) {
    if (numero === 1) {
        $('#toros').text(parseInt($('#toros').text()) + 1);
    }
}
function removeTableRow(jQtable) {
    jQtable.each(function () {
        if ($('tbody', this).length > 0) {
            $('tbody tr:last', this).remove();
            $('#numeroAnimal').text("0" + (parseInt($('#numeroAnimal').text()) - 1));
        } else {
            $('tr:last', this).remove();
        }
    });
}
        /*   $('#tablaAnimales').Tabledit({
         url: false,
         editButton: false,
         deleteButton: false,
         hideIdentifier: false,
         columns: {
         identifier: [0, 'animal'],
         editable: [[3, 'color']]
         }
         });*/



