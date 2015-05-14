<?php
$home = 'Principal';$porta='Portafolio';$bio = 'Biografia';$not = 'Noticias';$con ='Contacto';
$bandera = '<div><a class="" href="'.site_url("principal/idioma").'">
                    English</a></div>';
if(isset($_SESSION['idioma']) && $_SESSION['idioma']=='_i'){
    $home = 'Home';$porta='Porta';$bio = 'Biographi';$not = 'News';$con ='Contac';
    $bandera = '<a class="" href="'.site_url("principal/cerrar").'">
                    Español</a><br>';
}
?>
<body>
	<header id="">
		<div class="info wow fadeIn" data-wow-duration="1s"
			data-wow-delay=".2s">
			<div class="width-wrapper">
				<h1><img src="<?php echo __IMG__;?>logo.jpg" style="width: 50px" />
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
						<li><a href="<?php echo site_url("principal/biografia")?>"><?php echo $bio;?></a></li>
                        <li><a href="<?php echo site_url("principal/noticia")?>"><?php echo $not;?></a></li>
						<li><a href="<?php echo site_url("principal/contacto")?>"><?php echo $con;?></a>
						</li>
					</ul>
                    <?php echo $bandera;?>
				</nav>

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