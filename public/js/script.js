
$(document).ready(function () {
    $('#alert').hide();
    $('#nombreProductor').hide();
    $('#numeroGuia').change(function (e) {
        e.preventDefault();
        $('#alert').text('');
        //    $('#talonario').val('');
        var guia = $('#numeroGuia').val();
        if ($('#numeroGuia').val().length < 14) {
            alert('Formato Invalido');
        }
        $.ajax({
            url: 'talonario',
            data: {guia: guia},
            type: "get",
            //    dataType: "json",
            success: function (result) {
                $('#alert').show().text('Nuevo numero de boleta.');
                $('#talonario').text(result.boleta);
                $('#numeroGuia').val(result.guia);
            }
        });
    });
    $('#codigoProductor').change(function (e) {
        e.preventDefault();
        $('#alert').text('');
        e.preventDefault();
        var codigoProductor = $('#codigoProductor').val();
        if ($('#codigoProductor').val().length < 22) {
            alert('Formato Invalido');
        }
        $.ajax({
            url: 'formatoProductor',
            data: {codigoProductor: codigoProductor},
            type: "get",
            success: function (result) {
                $('#codigoProductor').val(result);
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