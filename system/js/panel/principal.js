/**
 * Desarrollado por: Judelvis Antonio Rivas Perdomo
 * Fecha Creacion: 09 de Noviembre de 2014
 */

$(function() {
	$('#tabs').tabs();
	listar_pendientes();
	listar_procesando();
	listar_procesado();
	listar_rechazo_cliente();
	listar_rechazo_admin();
});

function listar_pendientes(){
	var datos = "estatus=0&panel=1";
	$("#resp1").html('');
	alert(sUrlP);
	$.ajax({
		url : sUrlP + "listar_pedidos_pendientes",
		data: datos,
		type : "POST",
		dataType : "json",
		success : function(json) {//alert(json);
			if(json['resp']==1){
				var Grid1 = new TGrid(json, 'resp1','Pedidos Pendientes por Depositar');
				Grid1.SetNumeracion(true);
				Grid1.SetName("PDepositar");
				Grid1.SetDetalle();
				Grid1.Generar();
			}else $("#resp1").html("No posee Pedidos Pendientes por Depositar");
		}
	});
}

function listar_procesando(){
	var datos = "estatus=1";
	$("#resp2").html('');
	//alert(sUrlP + "listar_pedidos_cliente");
	$.ajax({
		url : sUrlP + "listar_pedidos_cliente",
		data: datos,
		type : "POST",
		dataType : "json",
		success : function(json) {//alert(json);
			if(json['resp']==1){
				var Grid2 = new TGrid(json, 'resp2','Pedidos Pendientes por Aprobar');
				Grid2.SetNumeracion(true);
				Grid2.SetName("procesando");
				Grid2.SetDetalle();
				Grid2.Generar();
			}else $("#resp2").html("No posee Pedidos Pendientes por Aprobar");
		}
	});
}

function listar_procesado(){
	var datos = "estatus=2";
	$("#resp3").html('');
	alert(sUrlP);
	$.ajax({
		url : sUrlP + "listar_pedidos_cliente",
		data: datos,
		type : "POST",
		dataType : "json",
		success : function(json) {//alert(json);
			if(json['resp']==1){
				var Grid3 = new TGrid(json, 'resp3','Pedidos Aprobados');
				Grid3.SetNumeracion(true);
				Grid3.SetName("Procesado");
				Grid3.SetDetalle();
				Grid3.Generar();
			}else $("#resp3").html("No posee Pedidos Aprobados");
		}
	});
}

function listar_rechazo_cliente(){
	var datos = "estatus=3";
	$("#resp4").html('');
	$.ajax({
		url : sUrlP + "listar_pedidos_cliente",
		data: datos,
		type : "POST",
		dataType : "json",
		success : function(json) {//alert(json);
			if(json['resp']==1){
				var Grid4 = new TGrid(json, 'resp4','Pedidos Rechazados Por Cliente');
				Grid4.SetNumeracion(true);
				Grid4.SetName("Rcliente");
				Grid4.SetDetalle();
				Grid4.Generar();
			}else $("#resp4").html("No posee Pedidos Rechazados por Cliente");
		}
	});
}

function listar_rechazo_admin(){
	var datos = "estatus=4";
	$("#resp5").html('');
	$.ajax({
		url : sUrlP + "listar_pedidos_cliente",
		data: datos,
		type : "POST",
		dataType : "json",
		success : function(json) {//alert(json);
			if(json['resp']==1){
				var Grid5 = new TGrid(json, 'resp5','Pedidos rechazados por administrador');
				Grid5.SetNumeracion(true);
				Grid5.SetName("Radmin");
				Grid5.SetDetalle();
				Grid5.Generar();
			}else $("#resp5").html("No posee Pedidos Rechazados por Administrador");
		}
	});
}