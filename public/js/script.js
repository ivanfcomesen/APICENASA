
$(document).ready(function () {
    $('#numeroGuia').keypress(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            $('#alertGuia').text('');
            var guia = $('#numeroGuia');
            //   if (validaFormatoGuia(guia) === true) {
            $.ajax({
                url: 'talonario',
                data: {guia: guia.val()},
                type: "get",
                //    dataType: "json",
                success: function (result) {

                    if (result === 'Formato Invalido!') {
                        $('#talonario').hide();
                        $('#alertGuia').show().text('Formato invalido.');
                        guia.val('').focus();
                    } else {
                        $('#alertGuia').show().text('Nuevo numero de boleta.');
                        $('#talonario').show().text(result.boleta);
                        $('#numeroGuia').val(result.guia);
                        $('#codigoProductor').focus();
                    }
                }
            });
        }
        //   }
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
            //    if (validaFormatoTransportista(codigoTransportista) === true) {
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
                    //$('#numeroSubasta').text(result[0].subasta);
                }
            });
        }
        //  }
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
                editable: [[3, 'color']]
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

function insertaAnimal() {

    if (($('#tipoSubasta').val() === '') || ($('#tipoSenasa').text() === ''))
    {
        alert("Debe digitar todos los codigos");
        $('#tipoSubasta').val('').focus();
    } else {

        var tipoSena = tiposSenasa(parseInt($('#tipoSubasta').val()));
        var nuevaFila = "";
        // añadimos las columnas
        nuevaFila = "<tr><td style=width:100px; >" + (parseInt($('#numeroAnimal').text())) + "</td>"
                + "<td style=width:140px;>" + $('#tipoSubasta').val() + "</td>"
                + "<td style=width:140px;>" + tipoSena + "</td>"
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
    var tipoSena = tiposSenasa(parseInt(tipo.val()));

    if (parseInt(tipo.val()) < 1 || parseInt(tipo.val()) > 12) {
        alert('Codigo Invalido');
        tipo.val('').focus();
    }
    $('#tipoSenasa').text(tipoSena);
}
function validaColor(color) {

    if (parseInt(color.val()) < 1 || parseInt(color.val()) > 9) {
        alert('Codigo Invalido');
        color.val('').focus();
    }
}
function totalAnimales(numero) {

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
function tiposSenasa(numero) {
    var tipo = 'indefinido';
    if (numero === 1) {
        tipo = "Toro";
    } else
    if (numero === 2) {
        tipo = "Novillo";
    } else
    if (numero === 3) {
        tipo = "Ternera";
    } else
    if (numero === 4) {
        tipo = "Vaca";
    } else
    if (numero === 5) {
        tipo = "Novilla";
    } else
    if (numero === 6) {
        tipo = "Ternero";
    }
    return tipo;
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



