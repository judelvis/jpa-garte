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
                <div class="row">
					<div class="grid_12">
						<div class="wrapper2">
							<div class="heading1 wow fadeIn" data-wow-duration="1s"
								data-wow-delay="0.1s" id='tb'>
								<h3>
									<?php echo $tb;?>
								</h3>
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
                                    /**fecha
                                     * <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                                    <span class="first">Fecha: <span class="highlighted">'.$ls->fecha.'</span></span>
                                    <div class="clearfix"></div>
                                    </div>
                                     */
                                    $tipoDatos=0;
                                    if($tipo != 0)$tipoDatos=$ls->oidcat;
                                    $tituloSerie = $ls->nombre;$desSerie = $ls->descrip;
                                    if(isset($_SESSION['idioma']) && $_SESSION['idioma']=='_i'){
                                        $tituloSerie = $ls->nombre_i;$desSerie = $ls->descrip_i;
                                    }
									echo '
									<div class="grid_2">
									<div class="box1">
									<h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s"><a href="#primero"  onclick="muestra('.$ls->oidser.','.$tipoDatos.');">'.$tituloSerie.'</a></h4>
									<a href="#primero"  onclick="muestra('.$ls->oidser.','.$tipoDatos.');">
									<img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="' . __IMG__ . 'galeria/medio/' . $ls->imagen . '" alt=""  />
									</a>
									<div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
									<div class="price">

									<span class="first">'.substr($desSerie,0,140).'</span>
									</div>
									<br>

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
							<!--<div class="button-wrapper1">
								<a class="btn-big-green wow fadeIn" data-wow-duration="1s"
									data-wow-delay="0.1s"
									href="<?php echo site_url("principal/consulta")?>"> <span><?php if(isset($_SESSION['idioma']) && $_SESSION['idioma']=='_i')echo'All';
                                        else echo 'Ver Todas Las Series';
                                        ?></span>
								</a>
							</div> !-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
