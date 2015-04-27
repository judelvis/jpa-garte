/**
 * Desarrollado por: Judelvis Antonio Rivas Perdomo
 * Fecha Creacion: 09 de Noviembre de 2014
 */

$(function() {
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
	listarSerie();
});

function limpiar(){
	$("#nombre").val('');
	$("#descrip").val('');
	$("#fecha").val('');
}

function Registrar() {
	var nombre = $("#nombre").val();
	var descrip = $("#descrip").val();
	var fecha = $("#fecha").val();
    var cadena = new FormData();
	cadena.append('nombre', nombre);
	cadena.append('descrip',descrip);
	cadena.append('fecha',fecha);

	if(nombre == '' || descrip == '' || fecha == '' ){
		alert("Debe ingresar todos los datos");
		return false;
	}

	$.ajax({
		url : sUrlP + "registrarSerie",
		type : 'POST',
		data : cadena,
		contentType : false,
		processData : false,
		cache : false,
		success : function(msj) {
			alert('Se registro con exito');
			limpiar();
			window.location = sUrlP+"agregarGaleria/"+msj;
		}
	});
	return false;
	
}

function listarSerie(){//alert(sUrlP);
	$.ajax({
		url : sUrlP + "listarSerie",
		type : "POST",
		dataType : "json",
		success : function(json) {//alert(json)
			if(json['msj']==1){
				var Grid1 = new TGrid(json, 'reporte','');
				//Grid1.SetNumeracion(true);
				//Grid1.SetEstilo('tgridh');
				Grid1.SetName("in");
				//Grid1.SetXls(true);
				Grid1.Generar();
			}else $("#reporte").html("No posee serie creada");
		}
	});
}