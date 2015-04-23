/**
 * Desarrollado por: Judelvis Antonio Rivas Perdomo
 * Fecha Creacion: 09 de Noviembre de 2014
 */

var sUrl = 'http://' + window.location.hostname + '/estcorp';
var sUrlP = sUrl + '/index.php/panel/panel/';
var sImg = sUrl + '/system/img/';

$(function() {
  $('#msj_alertas').dialog({
    modal : true,
    autoOpen : false,
    width : 260,
    height : 160,
    buttons : {
      "Cerrar" : function() {
        $(this).dialog("close");
      },
    }
  });

});

