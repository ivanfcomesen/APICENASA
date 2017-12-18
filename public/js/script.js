
$(document).ready(function () {
    $('#alert').hide();
    $('#nombreProductor').hide();
    $('#numeroGuia').change(function (e) {
        e.preventDefault();
        $('#alert').text('');
        //    $('#talonario').val('');
        var guia = $('#numeroGuia').val();
        $.ajax({
            url: 'talonario',
            data: {guia: guia},
            type: "get",
            //    dataType: "json",
            success: function (result) {
                $('#alert').show().text('Nuevo numero de boleta asignado');
                $('#talonario').text("Boleta #" + result);
            }
        });
    });

    $('#btnCedProductor').click(function (e) {
        e.preventDefault();
        var cedula = $('#cedProductor').val();
        $.ajax({
            url: 'consultarCedulaProductor',
            data: {cedula: cedula},
            type: "get",
            success: function (result) {
                // $('#talonario').val(result);
                $('#nombreProductor').show().text(result[0].nombreProductor);
                $('#numeroSubasta').text('Subasta #' + result[0].subasta);
            }
        });
    });
    $('#btnCedTransporte').click(function (e) {
        e.preventDefault();
        var cedula = $('#cedTransporte').val();
        $.ajax({
            url: 'consultarCedulaTransportista',
            data: {cedula: cedula},
            type: "get",
            success: function (result) {
                // $('#talonario').val(result);
                $('#numeroSubastaTrnsp').text('Subasta #' + result[0].codigoTransportista);
            }
        });
    });
});