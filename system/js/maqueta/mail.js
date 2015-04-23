function enviar(){//alert(1);
	var nombre = $("#name").val();
	var correo = $("#email").val();
	var mensaje = $("#message").val();
	var tel = $("#telephone").val();
	if(nombre == '' || correo == '' || mensaje == ''){
		alert("Debe ingresar todos los datos...");
		return false;
	}
	sData = "nombre=" + nombre + "&correo="+correo +"&mensaje="+mensaje+"&tel="+tel;
	$.ajax({
		url : sUrlP + "Envia_Correo",
		type : "POST",
		data : sData,
		success : function(resp) {
			alert(resp);
			$("#name").val('');     
			$("#email").val('');    
			$("#telephone").val('');  
 			$("#mensaje").val('');      
			
		}
	});
	return false;
}