/**
 * Created by judprog on 07/05/15.
 */
/**
 * Desarrollado por: Judelvis Antonio Rivas Perdomo
 * Fecha Creacion: 09 de Noviembre de 2014
 */

$(function() {
    listarNoticia();
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

function registrar() {
    //alert(1);
    var archivoImagen = document.getElementById("imagen");
    var imagen = archivoImagen.files[0];
    var cadena = new FormData();

    cadena.append('imagen', imagen);

    cadena.append('titulo', $('#titulo').val());
    cadena.append('descrip', $('#descrip').val());
    cadena.append('titulo_i', $('#titulo_i').val());
    cadena.append('descrip_i', $('#descrip_i').val());
    cadena.append('fecha', $('#fecha').val());
    cadena.append('enlace', $('#enlace').val());

    if($('#titulo').val() == ''){

        alert('Debe ingresar los datos');

        return false;
    }
    $('#notificationModal').modal('show');
    //$("#carga_busqueda").dialog('open');
    $.ajax({
        url : sUrlP + "registrarNoticia",
        type : 'POST',
        data : cadena,
        contentType : false,
        processData : false,
        cache : false,
        success : function(msj) {
            $('#notificationModal').modal('hide');
            $("#modal_mensaje").html(msj);
            $("#msj_alertas").modal('show');
            //alert(msj);
            consultar();
            limpiar();
        }
    });

}

function consultar(){
    $.ajax({
        url : sUrlP + "listarNoticia",
        type : 'POST',
        contentType : false,
        processData : false,
        cache : false,
        dataType : "json",
        success : function(json) {
            if(json['msj'] == 'SI'){
                Grid = new TGrid(json, 'reporte', "");
                Grid.SetNumeracion(true);
                Grid.SetName("Noticias");
                Grid.Generar();
            }else{
                alert("No se ha creado noticia");
            }
        }
    });
}

function limpiar(){

}