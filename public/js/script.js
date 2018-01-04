
$(document).ready(function () {
    $('#numeroGuia').change(function (e) {
        e.preventDefault();
        $('#alertGuia').text('');
        var guia = $('#numeroGuia');
        if (validaFormatoGuia(guia) === true) {
            $.ajax({
                url: 'talonario',
                data: {guia: guia.val()},
                type: "get",
                //    dataType: "json",
                success: function (result) {
                    $('#alertGuia').show().text('Nuevo numero de boleta.');
                    $('#talonario').show().text(result.boleta);
                    $('#numeroGuia').val(result.guia);
                }
            });
        }
    });
    $('#codigoProductor').change(function (e) {
        e.preventDefault();
        var codigoProductor = $('#codigoProductor');

        if (validaFormatoProductor(codigoProductor) === true) {
            $.ajax({
                url: 'formatoProductor',
                data: {codigoProductor: codigoProductor.val()},
                type: "get",
                success: function (result) {

                    $('#numeroSubastaProductor').show().text(result.codigoSubasta);
                    $('#codigoProductor').val(result.codigoProductor);
                    $('#nombreProductor').text("Ivan Francisco Sequeira Mesen");
                    $('#codigoTransportista').focus();
                }
            });
        }
    });
    $('#codigoTransportista').change(function (e) {
        e.preventDefault();
        var codigoTransportista = $('#codigoTransportista');
        if (validaFormatoTransportista(codigoTransportista) === true) {
            $.ajax({
                url: 'formatoTransportista',
                data: {codigoTransportista: codigoTransportista.val()},
                type: "get",
                success: function (result) {
                    $('#numeroSub').show().text(result.codigoSubasta);
                    $('#codigoTransportista').val(result.codigoProductor);
                    $('#numeroAnimal').text(parseInt(result.numeroAnimal)+1);
                    $('#tipoSubasta').focus();
                   $('#nombreTransportista').text("Pedro Juan Robles Sibaja");  
                    //$('#numeroSubasta').text(result[0].subasta);
                }
            });
        }
    });
    $('#agregarFila').click(function (e) {
        e.preventDefault();
        insertaAnimal();
        $('#tablaAnimales').Tabledit({
            url: false,
            editButton: false,
            deleteButton: false,
            hideIdentifier: false,
            columns: {
                identifier: [0, 'animal'],
                editable: [[1, 'tipoSubasta'], [2, 'tipoSenasa'], [3, 'color']]
            }
        });
    });

    $('#tipoSubasta').change(function (e) {
        validaTipo($('#tipoSubasta'));
    });
    $('#color').change(function (e) {
        validaColor($('#color'));

    });

    $('#quitarFila').click(function (e) {
        //$('#tablaAnimales tr:last').remove();
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

function validaFormatoGuia(guia) {
    if (guia.val().length < 14 || guia.val().length > 14) {
        $('#talonario').hide();
        $('#alertGuia').show().text('Formato invalido.');
        guia.val('').focus();
        return false;
    }
    return true;
}
function validaFormatoProductor(codigoProductor) {

    var flag = true;

    if (guiaEmpty() === true) {
        codigoProductor.val('');
        flag = false;
    } else {
        if (codigoProductor.val().length < 22 || codigoProductor.val().length > 22) {
            $('#numeroSubastaProductor').hide();
            $('#numeroSubastaProductor').show().text('Error');
            codigoProductor.val('').focus();
            flag = false;
        }
    }
    return flag;
}
function validaFormatoTransportista(codigoTransportista) {

    var flag = true;
    if (guiaEmpty() === true) {
        codigoTransportista.val('');
        flag = false;
    } else {
        if (codigoTransportista.val().length < 18 || codigoTransportista.val().length > 18) {
            $('#numeroSub').hide();
            $('#numeroSub').show().text('Error.');
            codigoTransportista.val('').focus();
            flag = false;
        }
    }
    return flag;
}
function insertaAnimal() {


    if (($('#tipoSubasta').val() === '') || ($('#tipoSenasa').val() === ''))
    {
        alert("Debe digitar todos los codigos");
        $('#tipoSubasta').val('').focus();
    } else {

        var nuevaFila = "";
        // añadimos las columnas
        nuevaFila = "<tr><td style=width:100px; >" + (parseInt($('#numeroAnimal').text())) + "</td>"
                + "<td style=width:140px;>" + $('#tipoSubasta').val() + "</td>"
                + "<td style=width:140px;>" + $('#tipoSenasa').val() + "</td>"
                + "<td style=width:100px;>" + $('#color').val() + "</td></tr>";

        totalAnimales(parseInt($("#tipoSubasta").val()));
        $("#tablaAnimales").append(nuevaFila);
        $('#numeroAnimal').text("0" + (parseInt($('#numeroAnimal').text()) + 1));
        $('#tipoSenasa').val('');
        $('#color').val('');
        $('#tipoSubasta').val('').focus();
    }
}

function validaTipo(tipo) {
    if (tipo.val().length < 2) {
        alert('Formato Invalido');
        tipo.val('').focus();
    }
    if (parseInt(tipo.val()) < 1 || parseInt(tipo.val()) > 12) {
        alert('Codigo Invalido');
        tipo.val('').focus();
    }
}

function validaColor(color) {
    if (color.val().length < 2) {
        alert('Formato Invalido');
        color.val('').focus();
    }
    if (parseInt(color.val()) < 1 || parseInt(color.val()) > 9) {
        alert('Codigo Invalido');
        color.val('').focus();
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

function totalAnimales(numero) {
    //var toros =  parseInt($('#toros').text());        
    if (numero === 1) {
        $('#toros').text(parseInt($('#toros').text()) + 1);
    } else
    if (numero === 2) {
        $('#toretes').text(parseInt($('#toretes').text()) + 1);
    } else
    if (numero === 3) {
        $('#terneros').text(parseInt($('#terneros').text()) + 1);
    } else
    if (numero === 4) {
        $('#vacas').text(parseInt($('#vacas').text()) + 1);
    } else
    if (numero === 5) {
        $('#vaquillas').text(parseInt($('#vaquillas').text()) + 1);
    } else
    if (numero === 6) {
        $('#terneras').text(parseInt($('#terneras').text()) + 1);
    }
}



