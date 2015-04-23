<form id="bookingForm2" class="bookingForm1" method="post" action="<?php echo site_url("principal/cordenado")?>">
	<input type="hidden" id='consulta' name='consulta' value='<?php echo $consulta;?>'>
	<span class="heading">Ordenar De:</span> <select name="orden" id='orden'
		class="tmSelect auto" data-class="tmSelect tmSelect2">
		<option value="precio desc">Mayor a Menor Precio</option>
		<option value="precio asc">Menor a Mayor Precio</option>
		<option value="tama desc">Mayor a Menor Tamaño</option>
		<option value="tama asc">Menor a Mayor Tamaño</option>
	</select> <a href="#" class="btn-big" data-type="submit" onclick='$("#bookingForm2").submit();'>Ordenar</a>
</form>