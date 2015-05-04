/**
 * Desarrollado por: Judelvis Antonio Rivas Perdomo
 * Fecha Creacion: 09 de Noviembre de 2014
 */
$(function() {
	listarTipo();
});

function limpiar(){
	$("#categoria").val('');
}

function Registrar() {
	var nombre = $("#categoria").val();
    var nombre_i = $("#categoria_i").val();
	var cadena = new FormData();
	cadena.append('categoria', nombre);
    cadena.append('categoria_i', nombre_i);
	if(nombre == ''){
		alert("Debe ingresar una categoria");
		return false;
	}
	
	$.ajax({
		url : sUrlP + "registrarTipo",
		type : 'POST',
		data : cadena,
		contentType : false,
		processData : false,
		cache : false,
		success : function(msj) {
			//alert(msj);
			limpiar();
			listarTipo();
		}
	});
	
}

function listarTipo(){
	$.ajax({
		url : sUrlP + "listarTipo",
		type : "POST",
		dataType : "json",
		success : function(json) {//alert(json['msj']);
			if(json['msj']==1){
				var Grid1 = new TGrid(json, 'reporte','');
				//Grid1.SetNumeracion(true);
				Grid1.SetName("tp");
				//Grid1.SetXls(true);
				Grid1.Generar();
			}else $("#reporte").html("No posee tipos creados");
		}
	});
}