<div class="row">
	<div class="col-lg-12">
		<div class="box dark">
			<header>
				<div class="icons">
					<i class="icon-edit"></i>
				</div>
				<h5>Registro</h5>
				<div class="toolbar">
					<ul class="nav">
						<li><a class="accordion-toggle minimize-box"
							data-toggle="collapse" href="#div-1"> <i class="icon-chevron-up"></i>
						</a></li>
					</ul>
				</div>
			</header>
			<div id="div-1" class="accordion-body collapse in body">
				<form class="form-horizontal">
					<div class="form-group">
						<label for="autosize" class="control-label col-lg-2">Ciudad</label>
						<div class="col-lg-10">
							<input type="text" placeholder="INGRESE CIUDAD"class="form-control" name="ciudad" id="ciudad" />
						</div>
					</div>

					<div class="form-group">
						<label for="autosize" class="control-label col-lg-2">Descripcion</label>

						<div class="col-lg-10">
							<textarea  class="form-control" name="desc"
								id="desc"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2">Estado</label>
						<div class="col-lg-10">
							<select data-placeholder="Seleccione Estado"
								class="form-control "  id='estado' name='estado'></select>
						</div>
					</div>
					<a href="#" class="btn btn-primary btn-lg" onclick="Registrar();">Registrar</a>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="box dark">
			<header>
				<div class="icons">
					<i class="icon-edit"></i>
				</div>
				<h5>Lista De Ciudades</h5>
				<div class="toolbar">
					<ul class="nav">
						<li><a class="accordion-toggle minimize-box"
							data-toggle="collapse" href="#reporte"> <i class="icon-chevron-up"></i>
						</a></li>
					</ul>
				</div>
			</header>
			<div id="reporte" class="accordion-body collapse in body">
				
			</div>
		</div>
	</div>
</div>