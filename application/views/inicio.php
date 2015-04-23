<div id="contenido"  style='overflow: hidden;background-color: #fafafa;'><!--Contenido-->
	<article id="colum1"><!--1era columna-->
	<?php if(isset($parrafo)){?>
	<p class="parrafo">Купить недвижимость в Испании ЛЕГКО !!! Широкий выбор недвижимости любого типа .</p>
	<p>Мы поможем найти вам именно то что вы искали. Квартиры, дома,  участки, т.д</p>
	<ul id="botones">
		<li class='izquierda'><a href="<?php echo site_url("principal/buscarCiudad/4")?>"><b><font size=5>BARCELONA</font></b></a></li>
		<li class='derecha'><a href="<?php echo site_url("principal/buscarCiudad/5")?>"><b><font size=5>HOSPITALET</font></b></a><li>
		<li class='izquierda'><a href="<?php echo site_url("principal/buscarCiudad/7")?>"><b><font size=5>LLOBREGAT</font></a></li>
		<li class='derecha'><a href="<?php echo site_url("principal/buscarCiudad/8")?>"><b><font size=5>VILADECANS</font></a></li>
		<li class='izquierda'><a href="<?php echo site_url("principal/buscarCiudad/9")?>"><b><font size=5>BADALONA</font></a></li>
		<li class='derecha'><a href="<?php echo site_url("principal/buscarCiudad/13")?>"><b><font size=5>VALDOREIX</font></a></li>
	</ul>
	
	<?php }
	if(isset($consulta)){
		$this -> load -> view('plantilla/orden');
	}
	
	
	?>
	
	<p>&nbsp;</p>

	<div id="images" style='width: 100%;'>
 	<ul>
 	
 	<?php 
 	//print('<pre>');
 	//print_r($lst);
 	if($lst==0){
 		echo'<h1>БЕЗ РЕЗУЛЬТАТА</h1>';
 	}else{
 		foreach ($lst as $ls){
 			
 			if($ls -> imagen != null){
 				echo '<li>';
 				echo '<a href="'.site_url("principal/galeria2/".$ls->id).'" ><img class="ima" src="'.__IMG__.'galeria/'.$ls->imagen.'" /></a><br>';
 				if(!isset($parrafo)){
 					echo '<div class="det"><p class="parrafo2">'.strtoupper(substr($ls->ubica,0,60)).'</p></div>';
 				}
 				echo '</li>';
 			}else{
				echo '<li>';
				echo '<a href="'.site_url("principal/galeria2/".$ls->id).'" ><img class="ima" src="'.__IMG__.'no_disponible.gif" /></a><br>';
				if(!isset($parrafo)){
					echo '<div class="det"><p class="parrafo2">'.strtoupper(substr($ls->ubica,0,60)).'</p></div>';
				}
				echo '</li>'; 				
 			}
 		}	
 	}
 	
 	?>
  	</ul>
	</div>
	<br>
	<div style="float: left;"><p class="parrafo">И если на нашей страничке вы не находите то что вы хотели. пишите нам нам на email  или звоните . наш каталог очень велик.</p></div>
</article><!--Fin de 1era columna-->

<?php $this -> load->view('plantilla/buscador');$this->load->view('plantilla/pie');?>

</div><!--Fin de Contenido-->
</body>
</html>
