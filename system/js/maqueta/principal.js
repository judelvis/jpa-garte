include('js/jquery-ui.js')
include('js/camera.js');
include('js/jquery.equalheights.js');
include('search/search.js');
include('booking/js/jquery-ui-1.10.3.custom.min.js');
include('booking/js/jquery.fancyform.js');
include('booking/js/jquery.placeholder.js');
include('booking/js/regula.js');
include('booking/js/booking.js');
include('js/jquery.mobile.customized.min.js');
//include('js/jquery.mobilemenu.js');
include('js/wow/wow.js');
include('js/jquery.tabs.js');
//document.write('<script src="'+slide+'scripts/camera.js"></script>');
$(document).ready(function() {
	if ($('html').hasClass('desktop')) {
		new WOW().init();
	}
	$('#bookingForm2').bookingForm();
	cmbTipo();
	pagina(1);
	
});



function cmbTipo() {
	$.ajax({
		url : sUrlP + 'cmbTipo',
		dataType : 'JSON',
		success : function(json) {//alert(json);
			$.each(json, function(item, valor) {
				$("#tipo").append(new Option(valor, item, false, true));
			});
			$("#tipo").append(new Option('Seleccione Tipo De Inmueble', 0, false, true));
			$('#bookingForm').bookingForm();
			
		}
	});
}


function pagina(p){
	tam = $('#paginador li').size();
	for(var i=1;i<=tam;i++){
		$(".pag"+i).hide();
	}
	$(".pag"+p).show();
}

/*
 * function include(url){ document.write('<script src="'+url+'"></script>');
 * return false ; }
 */

/*
 * cookie.JS ========================================================
 */
include('js/jquery.cookie.js');

/*
 * DEVICE.JS ========================================================
 */
include('js/device.min.js');

/*
 * Stick up menu ========================================================
 */
include('js/tmstickup.js');
$(window).load(function() {
	if ($('html').hasClass('desktop')) {
		$('#stuck_container').TMStickUp({})
	}
});

/*
 * Easing library ========================================================
 */
include('js/jquery.easing.1.3.js');

/*
 * ToTop ========================================================
 */
include('js/jquery.ui.totop.js');
$(function() {
	$().UItoTop({
		easingType : 'easeOutQuart'
	});
});

/*
 * DEVICE.JS AND SMOOTH SCROLLIG
 * ========================================================
 */
include('js/jquery.mousewheel.min.js');
include('js/jquery.simplr.smoothscroll.min.js');
$(function() {
	if ($('html').hasClass('desktop')) {
		$.srSmoothscroll({
			step : 150,
			speed : 800
		});
	}
});

/*
 * Copyright Year ========================================================
 */
var currentYear = (new Date).getFullYear();
$(document).ready(function() {
	$("#copyright-year").text((new Date).getFullYear());
});

/*
 * Superfish menu ========================================================
 */
include('js/superfish.js');
include('js/jquery.mobilemenu.js');

/*
 * Orientation tablet fix
 * ========================================================
 */
$(function() {
	// IPad/IPhone
	var viewportmeta = document.querySelector
			&& document.querySelector('meta[name="viewport"]'), ua = navigator.userAgent,

	gestureStart = function() {
		viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";
	},

	scaleFix = function() {
		if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
			viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
			document.addEventListener("gesturestart", gestureStart, false);
		}
	};

	scaleFix();
	// Menu Android
	if (window.orientation != undefined) {
		var regM = /ipod|ipad|iphone/gi, result = ua.match(regM)
		if (!result) {
			$('.sf-menu li').each(function() {
				if ($(">ul", this)[0]) {
					$(">a", this).toggle(function() {
						return false;
					}, function() {
						window.location.href = $(this).attr("href");
					});
				}
			})
		}
	}

    /*$("#div-slider").dialog({autoOpen: false,
        width: 800, // overcomes width:'auto' and maxWidth bug
        height: 600,
        maxWidth: 800,
        modal: true,
        fluid: true, //new option
        resizable: false,
        open: function(event, ui){
            fluidDialog(); // needed when autoOpen is set to true in this codepen
        }
    });*/
});
var ua = navigator.userAgent.toLocaleLowerCase(), regV = /ipod|ipad|iphone/gi, result = ua
		.match(regV), userScale = "";
if (!result) {
	userScale = ",user-scalable=0"
}
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0'+ userScale + '">')


function muestra(oidserie,oidcate){
    //alert(oidserie+"**"+oidcate);
    $("#div-slider").load(sUrlPa+"mostrarSerie",{oidser:oidserie, oidcat:oidcate}, function(response, status, xhr) {
        //alert(response);
    });
    $('#div-slider').dialog('open');
    //N_Ventana(sUrlPa+"mostrarSerie/"+oidserie+"/"+oidcate);
}