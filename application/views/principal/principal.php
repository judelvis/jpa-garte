<section id="content">
	<div class="width-wrapper width-wrapper__inset1">
		<div class="wrapper1">
			<div class="container">
				<div class="row">
                    <A name="primero"></A>
                    <div class="grid_12" >
                        <div class="wrapper2" id="div-slider"></div>
                    </div>
                </div>
					<!--<div class="grid_3">

						<div class="banner1">
							<h2 class="wow fadeIn" data-wow-duration="1s"
								data-wow-delay="0.1s">
								<a href="#">Lo Nuevo</a>
							</h2>
							<p class="wow fadeIn" data-wow-duration="1s"
								data-wow-delay="0.2s">Lorem ipsum dolor sit amet conse ctetur
								adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
								exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit.</p>
						</div>

					</div>!-->
                    <div class="row">
					<div class="grid_12">
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
                                    //print("<pre>");
                                    //print_r($ls);
									echo '
									<div class="grid_4">
									<div class="box1">
									<h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s"><a href="' . site_url ( "principal/galeria2/" . $ls->id ) . '">'.$ls->nombre.'</a></h4>
									<img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="' . __IMG__ . 'galeria/medio/' . $ls->imagen . '" alt=""  />
									<div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
									<span class="first">Fecha: <span class="highlighted">'.$ls->fecha.'</span></span>
									<div class="clearfix"></div>
									</div>
									<div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
									<div class="price">
									<span class="first">Descripcion:</span>
									<h4>'.$ls->descrip.'</h4>
									</div>
									<br>

									<a href="#primero" class="btn-default" onclick="muestra('.$ls->oidser.','.$ls->oidcat.');"> <span>Ver</span> </a>
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
