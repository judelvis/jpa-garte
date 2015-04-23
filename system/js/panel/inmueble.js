/**
 * Desarrollado por: Judelvis Antonio Rivas Perdomo
 * Fecha Creacion: 09 de Noviembre de 2014
 */

$(function() {
	listarInmueble();
	cmbZonas();
	cmbTipo();
});

function limpiar(){
	$("#precio").val('');
	$("#tama").val('');
	$("#habita").val('');
	$("#banos").val('');
	$("#deta").val('');
	$("#frase").val('');
	$("#estado > option[value=0]").attr("selected","selected");
	$("#tipo > option[value=0]").attr("selected","selected");
	$("#ciudad").html('');
	$("#direc").html('');
	$("#ubica").html('');
}

function Registrar() {
	var precio = $("#precio").val();
	var tama = $("#tama").val();
	var deta = $("#deta").val();
	var frase = $("#frase").val();
	var zona = $("#estado").val();
	var ciudad = $("#ciudad").val();
	var tipo = $("#tipo").val();
	var banos = $("#banos").val();
	var habita = $("#habita").val();
	var estaciona = $("#estaciona").val();
	var cadena = new FormData();
	var servicios = '';
	var direc = $("#direc").val();
	var ubica = $("#ubica").val();
	$('#box2View option').each(function(){ 
		servicios += $(this).text() +'|';
	});
	
	cadena.append('precio', precio);
	cadena.append('tama',tama);
	cadena.append('detalle',deta);
	cadena.append('estado', zona);
	cadena.append('ciudad',ciudad);
	cadena.append('tipo',tipo);
	cadena.append('frase',frase);
	cadena.append('banos',banos);
	cadena.append('habita',habita);
	cadena.append('estaciona',estaciona);
	cadena.append('estatus',1);
	cadena.append('servicios',servicios);
	cadena.append('direc',direc);
	cadena.append('ubica',ubica);
	if(precio == '' || tama == '' || deta == '' || zona == 0 || ciudad == 0 || tipo == 0 || habita == '' || banos == ''|| estaciona == '' || frase == ''){
		alert("Debe ingresar todos los datos");
		return false;
	}
	//alert(1);
	$.ajax({
		url : sUrlP + "registrarInmueble",
		type : 'POST',
		data : cadena,
		contentType : false,
		processData : false,
		cache : false,
		success : function(msj) {
			alert('Se registro con exito');
			limpiar();
			listarInmueble();
			window.location = sUrlP+"agregarGaleria/"+msj;
		}
	});
	return false;
	
}

function listarInmueble(){//alert(sUrlP);
	$.ajax({
		url : sUrlP + "listarInmueble",
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
			}else $("#reporte").html("No posee inmuebles creados");
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