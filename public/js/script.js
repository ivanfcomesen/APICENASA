
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

                    $('#numeroSubastaProductor').show().text('000000004');
                    $('#codigoProductor').val(result);
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
                    $('#numeroSub').show().text('000000003');
                    $('#codigoTransportista').val(result.codigoProductor);
                    $('#numeroAnimal').text(result.numeroAnimal);
                    $('#tipoSubasta').focus();
                    //$('#numeroSubasta').text(result[0].subasta);
                }
            });
        }
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
    if (codigoProductor.length < 22 || codigoProductor.length > 22) {
        $('#numeroSubastaProductor').hide();
        $('#numeroSubastaProductor').show().text('Error');
        $('#codigoProductor').val('').focus();
        return false;
    }
    return true;
}
function validaFormatoTransportista(codigoTransportista) {
    if (codigoTransportista.length < 18 || codigoTransportista.length > 18) {
        $('#numeroSub').hide();
        $('#numeroSub').show().text('Error.');
        $('#codigoTransportista').val('').focus();
        return false;
    }
    return true;
}