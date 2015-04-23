$(function() {
	var touch = $('#touch-menu');
	var menu = $('.menu');
	$(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	$(window).resize(function() {
		var w = $(window).width();
		if (w > 767 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
	
	cmbCiudad();
	cmbTipo();
});

function cmbTipo() {
	//alert(sUrlP);
	/*$.ajax({
		url : sUrlP + 'cmbTipo',
		dataType : 'JSON',
		success : function(json) {//alert(json);
			$.each(json, function(item, valor) {
				$("#tipo").append(new Option(valor, item, false, true));
			});
			$("#tipo").append(new Option('Escoja Tipo', 0, false, true));
		}
	});*/
}

function cmbCiudad() {
	var cadena = new FormData();
	cadena.append('zona', 3);
	//alert(zona);
	/*$.ajax({
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
			$("#ciudad").append(new Option('Escoja Ciudad', 0, false, true));
		}
	});*/
}

/*$(function() {
	alert(1);
});*/