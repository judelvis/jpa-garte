/**
 * Desarrollado por: Judelvis Antonio Rivas Perdomo
 * Fecha Creacion: 09 de Noviembre de 2014
 */
$(function() {
	listarCiudad();
	cmbCiudad();
	formInit();
});

function limpiar(){
	$("#ciudad").val('');
	$("#desc").val('');
}

function Registrar() {
	var nombre = $("#ciudad").val();
	var desc = $("#desc").val();
	var zona = $("#estado").val();
	var cadena = new FormData();
	cadena.append('ciudad', nombre);
	cadena.append('desc',desc);
	cadena.append('estado',zona);
	if(nombre == '' || zona== 0){
		alert("Debe ingresar nombre de la ciudad y escojer estado");
		return false;
	}
	$.ajax({
		url : sUrlP + "registrarCiudad",
		type : 'POST',
		data : cadena,
		contentType : false,
		processData : false,
		cache : false,
		success : function(msj) {
			//alert(msj);
			limpiar();
			listarCiudad();
		}
	});
	//alert('pasa');
}

function listarCiudad(){//alert(sUrlPa);
	$.ajax({
		url : sUrlP + "listarCiudad",
		type : "POST",
		dataType : "json",
		success : function(json) {//alert(json);
			if(json['msj']==1){
				var Grid1 = new TGrid(json, 'reporte','');
				//Grid1.SetNumeracion(true);
				//Grid1.SetEstilo('tgridh');
				Grid1.SetName("cd");
				Grid1.SetXls(true);
				Grid1.Generar();
			}else $("#reporte").html("No posee Ciudades creadas");
		}
	});
}

function cmbCiudad() {
	$.ajax({
		url : sUrlP + 'cmbZonas',
		dataType : 'JSON',
		success : function(json) {//alert(json);
			$.each(json, function(item, valor) {//alert(valor+'//'+item);
				$("#estado").append(new Option(valor, item, false, true));
			});
			
			$("#estado").append(new Option('Seleccione Estado', 0, false, true));
		}
	});
}