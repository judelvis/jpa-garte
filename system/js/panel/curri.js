/**
 * Created by judprog on 06/05/15.
 */
/**
 * Created by judprog on 05/05/15.
 */
/**
 * Desarrollado por: Judelvis Antonio Rivas Perdomo
 * Fecha Creacion: 09 de Noviembre de 2014
 */
$(function() {
    listarCurri();
    $("#fecha").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $.datepicker.regional['es'] = {
        closeText : 'Cerrar',
        prevText : '&#x3c;Ant',
        nextText : 'Sig&#x3e;',
        currentText : 'Hoy',
        monthNames : [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre',
            'Diciembre' ],
        monthNamesShort : [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul',
            'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
        dayNames : [ 'Domingo', 'Lunes', 'Martes', 'Mi&eacute;rcoles',
            'Jueves', 'Viernes', 'S&aacute;bado' ],
        dayNamesShort : [ 'Dom', 'Lun', 'Mar', 'Mi&eacute;', 'Juv', 'Vie',
            'S&aacute;b' ],
        dayNamesMin : [ 'Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'S&aacute;' ],
        weekHeader : 'Sm',
        dateFormat : 'dd/mm/yy',
        firstDay : 1,
        isRTL : false,
        showMonthAfterYear : false,
        yearSuffix : ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $("#fecha").datepicker("option", "dateFormat", "yy-mm-dd");
});

function limpiar(){
    $("#lugar").val('');
    $("#lugar_i").val('');
    $("#evento").val('');
    $("#evento_i").val('');
    $("#pais").val('');
    $("#estado").val('');
    $("#fecha").val('');
}

function registrar() {
    var cadena = new FormData();
    cadena.append('lugar',   $("#lugar").val());
    cadena.append('lugar_i', $("#lugar_i").val());
    cadena.append('evento',   $("#evento").val());
    cadena.append('evento_i', $("#evento_i").val());
    cadena.append('pais',   $("#pais").val());
    cadena.append('estado',   $("#estado").val());
    cadena.append('fecha', $("#fecha").val());
    $.ajax({
        url : sUrlP + "registrarCurri",
        type : 'POST',
        data : cadena,
        contentType : false,
        processData : false,
        cache : false,
        success : function(msj) {
            //alert(msj);
            limpiar();
            listarCurri();
        }
    });

}

function listarCurri(){
    $.ajax({
        url : sUrlP + "listarCurri",
        type : "POST",
        dataType : "json",
        success : function(json) {//alert(json['msj']);
            if(json['msj']==1){
                var Grid1 = new TGrid(json, 'reporte','');
                //Grid1.SetNumeracion(true);
                Grid1.SetName("tp");
                //Grid1.SetXls(true);
                Grid1.Generar();
            }else $("#reporte").html("No posee Curriculo");
        }
    });
}