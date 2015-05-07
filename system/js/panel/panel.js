/**
 * Desarrollado por: Judelvis Antonio Rivas Perdomo
 * Fecha Creacion: 09 de Noviembre de 2014
 */

$(function() {
	cmbSerie();
	cmbTipo();
    $("#fecha").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $.datepicker.regional['es'] = {
        closeText : 'Cerrar',
        prevText : '&#x3c;Ant',
        nextText : 'Sig&#x3e;',
        currentText : 'Hoy',
        monthNames : [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre',
            'Diciembre' ],
        monthNamesShort : [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul',
            'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
        dayNames : [ 'Domingo', 'Lunes', 'Martes', 'Mi&eacute;rcoles',
            'Jueves', 'Viernes', 'S&aacute;bado' ],
        dayNamesShort : [ 'Dom', 'Lun', 'Mar', 'Mi&eacute;', 'Juv', 'Vie',
            'S&aacute;b' ],
        dayNamesMin : [ 'Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'S&aacute;' ],
        weekHeader : 'Sm',
        dateFormat : 'dd/mm/yy',
        firstDay : 1,
        isRTL : false,
        showMonthAfterYear : false,
        yearSuffix : ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $("#fecha").datepicker("option", "dateFormat", "yy-mm-dd");
});

function cmbSerie() {
	//alert(sUrlP);
	$.ajax({
		url : sUrlP + 'cmbSerie',
		dataType : 'JSON',
		success : function(json) {
			$.each(json, function(item, valor) {
				$("#serie").append(new Option(item+' | '+valor, item, false, true));
			});
			$("#serie").append(new Option('Seleccione Serie', 0, false, true));
		}
	});
}

function cmbTipo() {
    $.ajax({
        url : sUrlP + 'cmbTipo',
        dataType : 'JSON',
        success : function(json) {//alert(json);
            $.each(json, function(item, valor) {
                $("#categoria").append(new Option(valor, item, false, true));
            });
            $("#categoria").append(new Option('Seleccione Categoria', 0, false, true));
        }
    });
}

function registrar() {
	//alert(1);
	var archivoImagen = document.getElementById("imagen");
	var imagen = archivoImagen.files[0];
	var cadena = new FormData();

	cadena.append('imagen', imagen);
	cadena.append('oidser', $('#serie').val());
    cadena.append('oidcat', $('#categoria').val());
    cadena.append('titulo', $('#titulo').val());
    cadena.append('detalle', $('#detalle').val());
    cadena.append('titulo_i', $('#titulo_i').val());
    cadena.append('detalle_i', $('#detalle_i').val());
    cadena.append('fecha', $('#fecha').val());
    cadena.append('enlace', $('#enlace').val());
	
	if($('#serie').val() == 0){
		
		alert('Debe elegir una serie');
		
		return false;
	}
	$('#notificationModal').modal('show');
	//$("#carga_busqueda").dialog('open');
	$.ajax({
		url : sUrlP + "registrarGaleria",
		type : 'POST',
		data : cadena,
		contentType : false,
		processData : false,
		cache : false,
		success : function(msj) {
			$('#notificationModal').modal('hide');
			$("#modal_mensaje").html(msj);
			$("#msj_alertas").modal('show');
			//alert(msj);
			consultar();
			limpiar();
		}
	});

}

function consultar(){//alert(1);
	var cadena = new FormData();
	$("#imagenes").html('');
	$("#reporte").html('');
	cadena.append('codigo', $('#serie').val());
	//alert($('#inmueble').val());
	$.ajax({
		url : sUrlP + "consultarGaleria",
		type : 'POST',
		data : cadena,
		contentType : false,
		processData : false,
		cache : false,
		dataType : "json",
		success : function(json) {
			if(json['msj'] == 'SI'){
				Grid = new TGrid(json, 'reporte', "");
				Grid.SetNumeracion(true);
				Grid.SetName("Galeria");
				Grid.Generar();
			}else{
				alert("No se ha creado galeria");
			}
		}
	});
}

function limpiar(){
    $('#imagen').val('');
    $('#oidser').val('');
    $('#oidcat').val('');
    $('#titulo').val('');
    $('#detalle').val('');
    $('#titulo_i').val('');
    $('#detalle_i').val('');
    $('#fecha').val('');
    $('#enlace').val('');
}