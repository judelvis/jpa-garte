<?php
$home = 'Principal';$porta='Portafolio';$bio = 'Biografia';$not = 'Noticias';$con ='Contactenos';
$bandera = '<a class="btn btn-lg btn-success" href="'.site_url("principal/idioma").'">
                    <i class="fa fa-flag fa-2x pull-left"></i> English</a>';
if(isset($_SESSION['idioma']) && $_SESSION['idioma']=='_i'){
    $home = 'Home';$porta='Porta';$bio = 'Biografiaf';$not = 'News';$con ='Contac';
    $bandera = '<a class="btn btn-lg btn-success" href="'.site_url("principal/cerrar").'">
                    <i class="fa fa-flag fa-2x pull-left"></i> Español</a><br>';
}
?>
<body>
	<header id="">
		<div class="info wow fadeIn" data-wow-duration="1s"
			data-wow-delay=".2s">
			<div class="width-wrapper">
				<h1>
					<span class="wrapper"><font color="#000" ><?php echo __TITLE__;?></font>
					</span>
				</h1>
			</div>
			<div class="clearfix"></div>
		</div>
		<div id="stuck_container">
			<div class="width-wrapper">
				<nav>
					<ul class="sf-menu">
						<li class="current"><a href="<?php echo site_url("principal") ?>"><?php echo $home;?></a>
						</li>
						<li><a href="#"><?php echo $porta;?></a> <?php echo $lstTipo;?></li>
						<li><a href="#"><?php echo $bio;?></a></li>
                        <li><a href="#"><?php echo $not;?></a></li>
						<li><a href="<?php echo site_url("principal/contacto")?>"><?php echo $con;?></a>
						</li>
					</ul>
				</nav>
                <?php echo $bandera;?>
				<!--<form id="search" method="POST" accept-charset="utf-8"
					style='width: 320px;'
					action="<?php echo site_url("principal/consulta2")?>">
					<input type="text" name="s" / style='width: 100%;'
						placeholder='Buscar Serie'> <a
						onclick="document.getElementById('search').submit()">
						<div class="search_icon"></div>
					</a>
				</form>!-->
				<div class="clearfix"></div>
			</div>
		</div>
	</header>