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
						<label class="control-label col-lg-2">Tipo</label>
						<div class="col-lg-10">
							<select data-placeholder="Seleccione Tipo De Inmueble"
								class="form-control " id='tipo' name='tipo'></select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2">Estado</label>
						<div class="col-lg-4">
							<select data-placeholder="Seleccione Estado"
								onchange='cmbCiudad();' class="form-control " id='estado'
								name='estado'></select>
						</div>
						<label class="control-label col-lg-2">Ciudad</label>
						<div class="col-lg-4">
							<select data-placeholder="Seleccione Ciudad"
								class="form-control " id='ciudad' name='ciudad'></select>
						</div>
					</div>
					
					<div class="form-group">
						<label for="autosize" class="control-label col-lg-2">Dirección</label>

						<div class="col-lg-4">
							<textarea class="form-control" name="direc" id="direc"></textarea>
						</div>
						<label for="autosize" class="control-label col-lg-2">Google Map</label>
						<div class="col-lg-4">
							<textarea class="form-control" name="ubica" id="ubica"></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label for="autosize" class="control-label col-lg-2">Precio</label>
						<div class="col-lg-4">
							<input type="text" placeholder="Ingrese Precio"
								class="form-control" name="precio" id="precio"
								onkeypress='return soloNumeros(event);' />
						</div>
						<label for="autosize" class="control-label col-lg-2">Tamaño</label>
						<div class="col-lg-4">
							<input type="text" placeholder="Ingrese Tamaño"
								class="form-control" name="tama" id="tama"
								onkeypress='return soloNumeros(event);' />
						</div>
					</div>

					<div class="form-group">
						<label for="autosize" class="control-label col-lg-2">#
							Habitaciones</label>
						<div class="col-lg-4">
							<input type="text" placeholder="Ingrese # De Habitaciones"
								class="form-control" name="habita" id="habita"
								onkeypress='return soloNumeros(event);' />
						</div>
						<label for="autosize" class="control-label col-lg-2"># Baños</label>
						<div class="col-lg-4">
							<input type="text" placeholder="Ingrese # De Baños"
								class="form-control" name="banos" id="banos"
								onkeypress='return soloNumeros(event);' />
						</div>
					</div>
					
					<div class="form-group">
						<label for="autosize" class="control-label col-lg-2">#
							Estacionamientos</label>
						<div class="col-lg-4">
							<input type="text" placeholder="Ingrese # De Estacionamiento"
								class="form-control" name="estaciona" id="estaciona"
								onkeypress='return soloNumeros(event);' />
						</div>
						
					</div>

					<div class="form-group">
						<label for="autosize" class="control-label col-lg-2">Detalle
							General</label>

						<div class="col-lg-4">
							<textarea class="form-control" name="deta" id="deta"></textarea>
						</div>
						<label for="autosize" class="control-label col-lg-2">Descripcion
							Corta</label>
						<div class="col-lg-4">
							<input type="text" placeholder="Ingrese Descripcion Corta"
								class="form-control" name="frase" id="frase" />
						</div>
					</div>
					
					<div class="form-group">
						<label for="autosize" class="control-label col-lg-12">Servicios Disponibles</label>
					</div>

					<div class="row">
						<div class="col-lg-5">
							<div class="form-group">
								<div class="input-group">
									<input id="box1Filter" type="text" placeholder="Filtro"
										class="form-control" /> <span class="input-group-btn">
										<button id="box1Clear" class="btn btn-warning" type="button">x</button>
									</span>
								</div>
							</div>
							<div class="form-group">
								<select id="box1View" multiple="multiple" class="form-control"
									size="16">
									<?php echo $servicios;?>
								</select>
								<hr>
								
							</div>
						</div>

						<div class="col-lg-2">
							<div class="btn-group btn-group-vertical"
								style="white-space: normal;">
								<button id="to2" type="button" class="btn btn-primary">
									<i class="icon-chevron-right"></i>
								</button>
								<button id="allTo2" type="button" class="btn btn-primary">
									<i class="icon-forward"></i>
								</button>
								<button id="allTo1" type="button" class="btn btn-danger">
									<i class="icon-backward"></i>
								</button>
								<button id="to1" type="button" class="btn btn-danger">
									<i class=" icon-chevron-left icon-white"></i>
								</button>
							</div>
						</div>

						<div class="col-lg-5">
							<div class="form-group">
								<div class="input-group">
									<input id="box2Filter" type="text" placeholder="Filtro"
										class="form-control" /> <span class="input-group-btn">
										<button id="box2Clear" class="btn btn-warning" type="button">x</button>
									</span>
								</div>
							</div>
							<div class="form-group">
								<select id="box2View" multiple="multiple" class="form-control"
									size="16"></select>
							</div>
							<hr />

							
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
				<h5>Lista De Inmuebles</h5>
				<div class="toolbar">
					<ul class="nav">
						<li><a class="accordion-toggle minimize-box"
							data-toggle="collapse" href="#reporte"> <i
								class="icon-chevron-up"></i>
						</a></li>
					</ul>
				</div>
			</header>
			<div id="reporte" class="accordion-body collapse in body"></div>
		</div>
	</div>
</div>


