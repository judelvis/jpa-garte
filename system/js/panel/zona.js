/**
 * Desarrollado por: Judelvis Antonio Rivas Perdomo
 * Fecha Creacion: 09 de Noviembre de 2014
 */

$(function() {
	listarZonas();
});

function limpiar(){
	$("#nomb").val('');
	$("#desc").val('');
}

function Registrar() {
	var nombre = $("#nomb").val();
	var desc = $("#desc").val();
	var cadena = new FormData();
	cadena.append('nombre', nombre);
	cadena.append('desc',desc);
	if(nombre == ''){
		alert("Debe ingresar nombre de zona");
		return false;
	}
	
	$.ajax({
		url : sUrlP + "registrarZona",
		type : 'POST',
		data : cadena,
		contentType : false,
		processData : false,
		cache : false,
		success : function(msj) {
			//alert(msj);
			limpiar();
			listarZonas();
		}
	});
	
}

function listarZonas(){
	$.ajax({
		url : sUrlP + "listarZonas",
		type : "POST",
		dataType : "json",
		success : function(json) {//alert(json['msj']);
			if(json['msj']==1){
				var Grid1 = new TGrid(json, 'reporte','Zonas');
				Grid1.SetNumeracion(true);
				Grid1.SetName("zn");
				Grid1.SetXls(true);
				Grid1.Generar();
			}else $("#reporte").html("No posee Zonas creadas");
		}
	});
}