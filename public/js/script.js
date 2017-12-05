
$(document).ready(function () {
    $('#alert').hide();
    $('#numeroGuia').change(function (e) {
        e.preventDefault();
        $('#alert').text('');
        //    $('#talonario').val('');
        var guia = $('#numeroGuia').val();
        $.ajax({
            url: 'talonario',
            data: {guia: guia},
            type: "get",
            // url: "/APICENASA/public/talonario/" + guia,                       
            //    dataType: "json",
            success: function (result) {
                $('#alert').show().text('La guia no existe nuevo numero de boleta asignado');
                $('#talonario').val(result);
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
                 $('#alert').show().text(result);
            }
        });

    });

});