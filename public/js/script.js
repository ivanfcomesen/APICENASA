
$(document).ready(function () {
    $('#numeroGuia').change(function (e) {
        e.preventDefault();
        $('#alertGuia').text('');
        var guia = $('#numeroGuia').val();
        if (validaFormatoGuia(guia) === true) {
            $.ajax({
                url: 'talonario',
                data: {guia: guia},
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
        var codigoProductor = $('#codigoProductor').val();

        if (validaFormatoProductor(codigoProductor) === true) {
            $.ajax({
                url: 'formatoProductor',
                data: {codigoProductor: codigoProductor},
                type: "get",
                success: function (result) {

                    $('#numeroSubastaProductor').show().text(result.codigoSubasta);
                    $('#codigoProductor').val(result.codigoProductor);
                    $('#codigoTransportista').focus();
                }
            });
        }
    });
    $('#codigoTransportista').change(function (e) {
        e.preventDefault();
        var codigoTransportista = $('#codigoTransportista').val();
        if (validaFormatoTransportista(codigoTransportista) === true) {
            $.ajax({
                url: 'formatoTransportista',
                data: {codigoTransportista: codigoTransportista},
                type: "get",
                success: function (result) {
                    $('#numeroSub').show().text(result.codigoSubasta);
                    $('#codigoTransportista').val(result.codigoProductor);
                    $('#numeroAnimal').text(result.numeroAnimal);
                    $('#tipoSubasta').focus();
                    //$('#numeroSubasta').text(result[0].subasta);
                }
            });
        }
    });
    $('#agregarFila').click(function (e) {
        e.preventDefault();
        insertaAnimal();
    });

    $('#tipoSubasta').change(function (e) {
        validaTipo($('#tipoSubasta').val());
    });
    $('#color').change(function (e) {
        validaColor($('#color').val());
    });
});

function validaFormatoGuia(guia) {
    if (guia.length < 14 || guia.length > 14) {
        $('#talonario').hide();
        $('#alertGuia').show().text('Formato invalido.');
        $('#numeroGuia').val('').focus();
        return false;
    }
    return true;
}
function validaFormatoProductor(codigoProductor) {

    if (guiaEmpty() === true) {
        $('#codigoProductor').val('');
        $('#numeroGuia').focus();
        return false;
    } else {
        if (codigoProductor.length < 22 || codigoProductor.length > 22) {
            $('#numeroSubastaProductor').hide();
            $('#numeroSubastaProductor').show().text('Error');
            $('#codigoProductor').val('').focus();
            return false;

        } else
            return true;
    }
}
function validaFormatoTransportista(codigoTransportista) {

    if (guiaEmpty() === true) {
        $('#codigoTransportista').val('');
        $('#numeroGuia').focus();
        return false;
    } else {
        if (codigoTransportista.length < 18 || codigoTransportista.length > 18) {
            $('#numeroSub').hide();
            $('#numeroSub').show().text('Error.');
            $('#codigoTransportista').val('').focus();
            return false;
        } else
            return true;
    }
}

function insertaAnimal() {

    if ((($('#tipoSubasta').val() === '')) || ($('#tipoSenasa').val() === '')
            || ($('#tipoSenasa').val() === ''))
    {
        alert("Debe digitar todos los codigos");
        $('#tipoSubasta').val('').focus();

    } else {
        $numeroAnimal = parseInt($('#numeroAnimal').text());
        $tipoSubasta = $('#tipoSubasta').val();
        $tipoSenasa = $('#tipoSenasa').val();
        $color = $('#color').val();
        var nuevaFila = "";
        // añadimos las columnas
        nuevaFila = "<tr><td>" + ($numeroAnimal + 1) + "</td>"
                + "<td>" + $tipoSubasta + "</td>"
                + "<td>" + $tipoSenasa + "</td>"
                + "<td>" + $color;
        +"</td></tr>";

        $("#tablaAnimales").append(nuevaFila);
        $('#numeroAnimal').text("0" + ($numeroAnimal + 1));
        $('#tipoSubasta').val('');
        $('#tipoSenasa').val('');
        $('#color').val('');
    }
}
function guiaEmpty() {
    if ($('#numeroGuia').val() === '') {
        alert('Debe digitar una guia');
        $('#numeroGuia').focus();
        return true;
    }
    return false;
}

function validaTipo(campo) {

    if (campo.length < 2) {
        alert('Formato Invalido');
        $('#tipoSubasta').val('').focus();
    }

    if (parseInt(campo) < 1 || parseInt(campo) > 12) {
        alert('Codigo Invalido');
        $('#tipoSubasta').val('').focus();
    }
}

function validaColor(campo) {

    if (campo.length < 2) {
        alert('Codigo Invalido');
        $('#color').val('').focus();
    }

    if (parseInt(campo) < 1 || parseInt(campo) > 9) {
        alert('Formato Invalido');
        $('#color').val('').focus();
    }
}

function addFila() {
    // Obtenemos el numero de filas (td) que tiene la primera columna
    // (tr) del id "tabla"
    var tds = $("#tablaAnimales tr:first td").length;
    // Obtenemos el total de columnas (tr) del id "tabla"
    var trs = $("#tablaAnimales tr").length;
    var nuevaFila = "<tr>";
    for (var i = 0; i < tds; i++) {
        // añadimos las columnas
        nuevaFila += "<td>columna " + (i + 1) + " Añadida</td>";
    }
    // Añadimos uno al total, ya que cuando cargamos los valores para la
    // columna, todavia no esta añadida  
    nuevaFila += "</tr>";
    $("#tablaAnimales").append(nuevaFila);
}
