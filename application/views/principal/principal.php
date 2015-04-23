<section id="content">
	<div class="width-wrapper width-wrapper__inset1">
		<div class="wrapper1">
			<div class="container">
				<div class="row">
					<div class="grid_3">
						<div id="tabs">
							<div class="row">
								<div class="grid_3">
									<ul class="tabs-list">
										<li><a href="#tabs-1">
												<div class="tab tab-first maxheight">BUSCADOR</div>
										</a>
										</li>
										<li><a href="#tabs-2">
												<div class="tab maxheight">ORDENAR</div>
										</a>
										</li>
									</ul>
								</div>
							</div>
							<div id="tabs-1">
								<?php $this -> load -> view('principal/incluir/buscador');?>
							</div>
							<div id="tabs-2">
								<?php if(isset($consulta)) $this -> load -> view('principal/incluir/orden');?>
							</div>
						</div>
						<div class="banner1">
							<h2 class="wow fadeIn" data-wow-duration="1s"
								data-wow-delay="0.1s">
								<a href="#">Nuestros Servicios</a>
							</h2>
							<p class="wow fadeIn" data-wow-duration="1s"
								data-wow-delay="0.2s">Lorem ipsum dolor sit amet conse ctetur
								adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
								exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit.</p>
						</div>

					</div>
					<div class="grid_9">
						<?php $this -> load -> view('principal/incluir/slider',$slider);?>
						<div class="wrapper2">
							<div class="heading1 wow fadeIn" data-wow-duration="1s"
								data-wow-delay="0.1s" id='tb'>
								<h2>
									<?php echo $tb;?>
								</h2>
							</div>
							<?php
							if ($lst == 0) {
								echo '<div class="border-wrapper1 wrapper3"><div class="row"><h2><center>No existen publicaciones</center></h2></div></div>';
							} else {
								$i = 0;
								$j=1;$band=0;
								echo '<div class="border-wrapper1 wrapper3 pag'.$j.'"><div class="row">';
								foreach ( $lst as $ls ) {
									$i ++;
									$band++;
									if($band == __PAG__){
										$j++;
										$band=1;
									}
									if ($i > 3) {
										echo '</div></div>';
										echo '<div class="border-wrapper1 wrapper3 pag'.$j.'"><div class="row">';
										$i = 1;
									}
									echo '
									<div class="grid_3">
									<div class="box1">
									<h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s"><a href="' . site_url ( "principal/galeria2/" . $ls->id ) . '">' . $ls->frase . '</a></h4>
									<img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="' . __IMG__ . 'galeria/medio/' . $ls->imagen . '" alt=""  />
									<div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
									<span class="first">Ref: <span class="highlighted">' . $ls->refe . '</span></span>
									<span class="second">Tamaño: <span class="highlighted">' . $ls->tama . ' MT2</span></span>
									<div class="clearfix"></div>
									</div>
									<div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
									<div class="price">
									<span class="first">Precio:</span>
									<h4>' . number_format ( $ls->precio, 2 ) .' ' .__MONEDA__.'</h4>
									</div>
									<a class="btn-default" href="' . site_url ( "principal/galeria2/" . $ls->id ) . '"> <span>Detalles</span> </a>
									<div class="clearfix"></div>
									</div>
									</div>
									</div>';
								}
								echo '</div></div>';
								$npag = count($lst)/__PAG__;
								if(($npag)>1 ){
									echo'<nav><ul class="pagination pagination-lg" id="paginador">';
									$tam =ceil($npag);
									for($i=1;$i<=$tam;$i++){
										echo'<li><a href="#tb" onclick="pagina('.$i.')">'.$i.'</a></li>';
									}
									echo '</ul>	</nav>';
								}
							}
							?>
							<div class="button-wrapper1">
								<a class="btn-big-green wow fadeIn" data-wow-duration="1s"
									data-wow-delay="0.1s"
									href="<?php echo site_url("principal/consulta")?>"> <span>Ver
										Todo</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>