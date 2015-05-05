/**
 * Created by judprog on 05/05/15.
 */
/**
 * Desarrollado por: Judelvis Antonio Rivas Perdomo
 * Fecha Creacion: 09 de Noviembre de 2014
 */
$(function() {
    listarBio();
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
    $("#bio").val('');
    $("#bio_i").val('');
    $("#fecha").val('');
}

function Registrar() {
    var bio = $("#bio").val();
    var bio_i = $("#bio_i").val();
    var fecha = $("#fecha").val();
    var cadena = new FormData();
    cadena.append('bio', bio);
    cadena.append('bio_i', bio_i);
    cadena.append('fecha', fecha);
    if(bio == ''){
        alert("Debe ingresar Biografia");
        return false;
    }
    alert(1);
    $.ajax({
        url : sUrlP + "registrarBio",
        type : 'POST',
        data : cadena,
        contentType : false,
        processData : false,
        cache : false,
        success : function(msj) {
            //alert(msj);
            limpiar();
            listarBio();
        }
    });

}

function listarBio(){
    $.ajax({
        url : sUrlP + "listarBio",
        type : "POST",
        dataType : "json",
        success : function(json) {//alert(json['msj']);
            if(json['msj']==1){
                var Grid1 = new TGrid(json, 'reporte','');
                //Grid1.SetNumeracion(true);
                Grid1.SetName("tp");
                //Grid1.SetXls(true);
                Grid1.Generar();
            }else $("#reporte").html("No posee Biografia");
        }
    });
}