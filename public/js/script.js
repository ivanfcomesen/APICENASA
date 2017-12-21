
$(document).ready(function () {
    $('#alert').hide();
    $('#alertProductor').hide();
    $('#numeroGuia').change(function (e) {
        e.preventDefault();
        $('#alert').text('');
        //    $('#talonario').val('');
        var guia = $('#numeroGuia').val();
        if ($('#numeroGuia').val().length < 14 || $('#numeroGuia').val().length > 14) {
            $('#talonario').hide();
            $('#alert').show().text('Formato Invalido.');
            $('#numeroGuia').val('');
            $('#numeroGuia').focus();

        } else {
            $.ajax({
                url: 'talonario',
                data: {guia: guia},
                type: "get",
                //    dataType: "json",
                success: function (result) {
                    $('#alert').show().text('Nuevo numero de boleta.');
                    $('#talonario').show().text(result.boleta);
                    $('#numeroGuia').val(result.guia);
                }
            });
        }
    });
    $('#codigoProductor').change(function (e) {
        e.preventDefault();
        $('#alertProductor').hide();
        var codigoProductor = $('#codigoProductor').val();

        if (codigoProductor.length < 22 || codigoProductor.length > 22) {
            $('#numeroSubastaProductor').hide();
            $('#alertProductor').show().text('Formato Invalido.');
            $('#codigoProductor').val('');
            $('#codigoProductor').focus();
            // $('#talonario').text('');

        } else {
            $.ajax({
                url: 'formatoProductor',
                data: {codigoProductor: codigoProductor},
                type: "get",
                success: function (result) {
                    $('#alertProductor').hide();
                    $('#numeroSubastaProductor').show().text('000000004');
                    $('#codigoProductor').val(result);
                    $('#codigoTransportista').focus();
                }
            });
        }

    });

    $('#codigoTransportista').change(function (e) {
        e.preventDefault();
        $('#alertTransportista').text('');
        e.preventDefault();
        var codigoTransportista = $('#codigoTransportista').val();

        if (codigoTransportista.length < 18 || codigoTransportista.length > 18) {
            $('#numeroSub').hide();
            $('#alertTransportista').show().text('Formato Invalido.');
            $('#codigoTransportista').val('');
            $('#codigoTransportista').focus();
            // $('#talonario').text('');

        } else {
            $.ajax({
                url: 'formatoTransportista',
                data: {codigoTransportista: codigoTransportista},
                type: "get",
                success: function (result) {
                    $('#alertTransportista').hide();
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