
$(document).ready(function () {
    $('#alert').hide();
    $('#numeroGuia').change(function (e) {
        e.preventDefault();
        var guia = $('#numeroGuia').val();
        var maxId =
        var url = 'route('getTalonario', ['tienda' => $tienda, 'ruta' => $ruta])';
        
        $.post(url,guia,function(talonario){//json del controlador
            $('#talonario').val(talonario.toString());
           // $('talonario').html(talonario.toString());
});
    });
});
//Set
$('#txt_name').val(bla);


 Route::get('/{tienda}/{ruta}', array('before' => 'validar_tienda', function($tienda, $ruta)
{...}

href="{{ Route ('/',['mitienda'],'/',['sesionproducto'])  }}"


href="{{ route('miruta', ['tienda' => $tienda, 'ruta' => $ruta]) }}"