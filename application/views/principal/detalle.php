<style type="text/css">
	.fluid_container {
			margin: 0 auto;
			max-width: 1000px;
			width: 90%;
		}
		
	 .google-maps {
position: relative;
padding-bottom: 75%; // This is the aspect ratio
height: 0;

}
.google-maps iframe {
top: 0;
left: 0;
width: 100% !important;
}
table {
	color: #000000;
	
	border-collapse: collapse
}

table,caption {
	margin: 0 auto;
	border-right: 1px solid #CCC;
	border-left: 1px solid #CCC;
	border-top:1px solid #CCC;
	border-bottom:1px solid #CCC;
}

caption,th,td {
	border-left: 0;
	padding: 10px
}

caption,thead th,tbody th,tfoot th,tfoot td {
	background-color: #333333;
	color: #FFF;
	font-weight: bold;
	text-transform: uppercase;
	text-align: right;
}

thead th {
	background-color: #C30;
	color: #FFB3A6;
	text-align: center
}

tbody th {
	padding: 20px 10px
	background-color: #000;
}

tbody tr.odd {
	background-color: #F7F7F7;
	color: #666
}

tbody a {
	padding: 1px 2px;
	color: #333;
	text-decoration: none;
	border-bottom: 1px dotted #E63C1E
}

tbody a:active,tbody a:hover,tbody a:focus,tbody a:visited {
	color: #666
}

tbody tr:hover {
	background-color: #EEE;
	color: #333
}

tbody tr:hover a {
	background-color: #FFF
}

tbody td+td+td+td a {
	color: #C30;
	font-weight: bold;
	border-bottom: 0
}

tbody td+td+td+td a:active,tbody td+td+td+td a:hover,tbody td+td+td+td a:focus,tbody td+td+td+td a:visited {
	color: #E63C1E
}

tbody td a[href="http://www.rodcast.com.br/"] {
	margin: 0 auto;
	display: block;
	width: 15px;
	height: 15px;
	background: transparent url('data:image/gif;base64,R0lGODlhDwAPAIAAACEpMf///yH5BAAAAAAALAAAAAAPAA8AAAIjjA8Qer0JmYvULUOlxXEjaEndliUeA56c97TqSD5pfJnhNxYAOw%3D%3D') no-repeat;
	text-indent: -999em;
	border-bottom: 0
}

tbody a:visited:after {
	font-family: Verdana,sans-serif;
	content: "\00A0\221A"
}
</style>
<!--========================================================
		CONTENT
		=========================================================-->
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
										</a></li>
										<li><a href="#tabs-2">
												<div class="tab maxheight">ORDENAR</div>
										</a></li>
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
								<?php $this -> load -> view('principal/incluir/slider2',$slider);?>
								<div class="wrapper2">
							<div class="heading1 wow fadeIn" data-wow-duration="1s"
								data-wow-delay="0.1s">
								<h2><?php echo $tb;?></h2>
							</div>
									

			<div>
				<table><tbody>
				<tr><th>REFERENCIA</th><td><?php echo $lst ['datos'] [0]->refe ?></td></tr>
				<tr><th>DIRECCION</th><td><?php echo $lst ['datos'] [0]->direc ?></td></tr>
				<tr><th>DESCRIPCION</th><td><?php echo $lst ['datos'] [0]->detalle ?></td></tr>
				<tr><th>TAMAÑO</th><td><?php echo $lst ['datos'] [0]->tama ?></td></tr>
				<tr><th>PRECIO</th><td><?php echo number_format($lst ['datos'] [0]->precio,2).' '.__MONEDA__ ?></td></tr>
				<tr><th>ESTADO</th><td><?php echo $lst ['datos'] [0]->znomb ?></td></tr>
				<tr><th>CIUDAD</th><td><?php echo $lst ['datos'] [0]->cnomb ?></td></tr>
				<tr><th>INMUEBLE</th><td><?php echo $lst ['datos'] [0]->tnomb ?></td></tr>
				<tr><th>BAÑOS</th><td><?php echo $lst ['datos'] [0]->banos ?></td></tr>
				<tr><th>HABITACIONES</th><td><?php echo $lst ['datos'] [0]->habita ?></td></tr>
				<tr><th>ESTACIONAMIENTO</th><td><?php echo $lst ['datos'] [0]->estaciona ?></td></tr>
				</tbody>
				</table>
			</div>
			<br><br>
			<div class="width-wrapper ">
				<div class="wrapper3">
					<div class="container">
						<div class="row">
			<?php 
			$picado = explode('|',$lst ['datos'] [0]->servicios);
			$l1 = '<ul class="list2">';
			$l2 = '<ul class="list2">';
			$l3 = '<ul class="list2">';
			$j=0;
			$arj = array('1'=>'l1','2'=>'l2','3'=> 'l3');
			for($i=0;$i<count($picado);$i++){
				
				if($picado[$i] != ''){
					$j++;
					if($j>3) $j=1;
					$$arj[$j] .= '<li><h4>'.$picado[$i].'</h4></li>';
				}
			}
			$l1 .='</ul>';
			$l2 .='</ul>';
			$l3 .='</ul>';
			?>
			<div class="grid_3"><div class="box2"><?php echo $l1?></div></div>
			<div class="grid_3"><div class="box2"><?php echo $l2?></div></div>
			<div class="grid_3"><div class="box2"><?php echo $l3?></div></div>
			</div></div></div></div>
			<?php if($lst ['datos'] [0]->ubica != '')echo '<div class="google-maps">'.$lst ['datos'] [0]->ubica.'</div>';?>
			
									
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

