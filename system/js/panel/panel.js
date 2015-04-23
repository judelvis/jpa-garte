/**
 * Desarrollado por: Judelvis Antonio Rivas Perdomo
 * Fecha Creacion: 09 de Noviembre de 2014
 */

$(function() {
	//$('#notificationModal').modal('show');
	cmbInmuebles();
	//consultar();
});

function cmbInmuebles() {
	//alert(sUrlP);
	$.ajax({
		url : sUrlP + 'cmbInmuebles',
		dataType : 'JSON',
		success : function(json) {
			$.each(json, function(item, valor) {
				$("#inmueble").append(new Option(item+' | '+valor, item, false, true));
			});
			$("#inmueble").append(new Option('Seleccione Inmueble', 0, false, true));
		}
	});
}

function registrar() {
	//alert(1);
	var archivoImagen = document.getElementById("imagen");
	var imagen = archivoImagen.files[0];
	var cadena = new FormData();

	cadena.append('imagen', imagen);
	cadena.append('codigo', $('#inmueble').val());
	
	if($('#inmueble').val() == 0){
		
		alert('Debe elegir un inmueble');
		
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
	cadena.append('codigo', $('#inmueble').val());
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
	
}