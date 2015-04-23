<form id="bookingForm" class="bookingForm1 wow fadeIn"
	data-wow-duration="1s" data-wow-delay="0.1s" method="post"
	action="<?php echo site_url("principal/consulta")?>">
	<span class="heading">Tipo:</span> <select name="tipo" id='tipo'
		class="judSel auto"></select> <br> <br> <span class="heading">Estado:</span>
	<select name="estado" id='estado' class="judSel auto"
		onchange='cmbCiudad();'>
	</select> <br> <br> <span class="heading">Ciudad:</span> <select
		name="ciudad" id='ciudad' class="judSel auto">
		<option value=0>Seleccione Estado</option>
	</select> <br> <br>
	<div class="narrow-selects">
		<div class="block-left">
			<span class="heading">Precio Min (<?php echo __MONEDA__;?>):</span> <select
				name="min_precio" id='min_precio' class="tmSelect auto"
				data-class="tmSelect tmSelect2">
				<option value=0>-----</option>
				<option value=100000>100000</option>
				<option value=300000>300000</option>
				<option value=500000>500000</option>
				<option value=800000>800000</option>
				<option value=1000000>1000000</option>
				<option value=3000000>3000000</option>
				<option value=5000000>5000000</option>
				<option value=10000000>10000000</option>
				<option value=15000000>15000000</option>
				<option value=30000000>30000000</option>
				<option value=40000000>40000000</option>
				<option value=50000000>50000000</option>
			</select>
		</div>
		<div class="block-right">
			<span class="heading">Precio Max (<?php echo __MONEDA__;?>):</span> <select
				name="max_precio" id='max_precio' class="tmSelect auto"
				data-class="tmSelect tmSelect2">
				<option value=0>-----</option>
				<option value=100000>100000</option>
				<option value=300000>300000</option>
				<option value=500000>500000</option>
				<option value=800000>800000</option>
				<option value=1000000>1000000</option>
				<option value=3000000>3000000</option>
				<option value=5000000>5000000</option>
				<option value=10000000>10000000</option>
				<option value=15000000>15000000</option>
				<option value=30000000>30000000</option>
				<option value=40000000>40000000</option>
				<option value=50000000>50000000</option>
			</select>
		</div>
		<div class="block-left">
			<span class="heading">Tamaño Min(mt2):</span> <select name="min_tama"
				id='min_tama' class="tmSelect auto" data-class="tmSelect tmSelect2">
				<option value=0>-----</option>
				<option value=50>50</option>
				<option value=100>100</option>
				<option value=200>200</option>
				<option value=500>500</option>
				<option value=501>500 +</option>
			</select>
		</div>
		<div class="block-right">
			<span class="heading">Tamaño Max(mt2):</span> <select name="max_tama"
				id='max_tama' class="tmSelect auto" data-class="tmSelect tmSelect2">
				<option value=0>-----</option>
				<option value=50>50</option>
				<option value=100>100</option>
				<option value=200>200</option>
				<option value=500>500</option>
				<option value=501>500 +</option>
			</select>
		</div>
		<div class="block-left">
			<span class="heading"># Baños:</span> <select name="banos" id='banos'
				class="tmSelect auto" data-class="tmSelect tmSelect2"><option
					value=0>-----</option>
				<?php for($i=1;$i<=10;$i++)echo '<option value='.$i.'>'.$i.'</option>';?>
			</select>
		</div>
		<div class="block-right">
			<span class="heading"># Habitaciones:</span> <select name="habita"
				id='habita' class="tmSelect auto" data-class="tmSelect tmSelect2"><option
					value=0>-----</option>
				<?php for($i=1;$i<=10;$i++)echo '<option value='.$i.'>'.$i.'</option>';?>
			</select>
		</div>
		<div class="clearfix"></div>
	</div>
	<a href="#" class="btn-big" data-type="submit" onclick='validar();'>Buscar</a>
</form>
