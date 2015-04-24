/**
 * Desarrollado por: Judelvis Antonio Rivas Perdomo
 * Fecha Creacion: 09 de Noviembre de 2014
 */

$(function() {
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
				Grid1.SetEstilo('tgridh');
				Grid1.SetName("in");
				Grid1.SetXls(true);
				Grid1.Generar();
			}else $("#reporte").html("No posee serie creada");
		}
	});
}

function cmbZonas() {
	$.ajax({
		url : sUrlP + 'cmbZonas',
		dataType : 'JSON',
		success : function(json) {//alert(json);
			$.each(json, function(item, valor) {
				$("#estado").append(new Option(valor, item, false, true));
			});
			$("#estado").append(new Option('Seleccione un Estado', 0, false, true));
		}
	});
}

function cmbTipo() {
	$.ajax({
		url : sUrlP + 'cmbTipo',
		dataType : 'JSON',
		success : function(json) {//alert(json);
			$.each(json, function(item, valor) {
				$("#tipo").append(new Option(valor, item, false, true));
			});
			$("#tipo").append(new Option('Seleccione Tipo De Inmueble', 0, false, true));
		}
	});
}

function cmbCiudad() {
	var zona = $("#estado").val();
	var cadena = new FormData();
	cadena.append('zona', zona);
	//alert(zona);
	$.ajax({
		url : sUrlP + 'cmbCiudad',
		type : 'POST',
		data : cadena,
		contentType : false,
		processData : false,
		cache : false,
		dataType : 'JSON',
		success : function(json) {//alert(json);
			$("#ciudad").html('');
			$.each(json, function(item, valor) {
				$("#ciudad").append(new Option(valor, item, false, true));
			});
			$("#ciudad").append(new Option('Seleccione Ciudad', 0, false, true));
		}
	});
}