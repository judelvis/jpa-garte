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
						<li class="current"><a href="<?php echo site_url("principal") ?>">Principal</a>
						</li>
						<li><a href="#">Portafolio</a> <?php echo $lstTipo;?></li>
						<li><a href="#">Biografia</a></li>
                        <li><a href="#">Noticias</a></li>
						<li><a href="<?php echo site_url("principal/contacto")?>">Contactenos</a>
						</li>
					</ul>
				</nav>
				<form id="search" method="POST" accept-charset="utf-8"
					style='width: 320px;'
					action="<?php echo site_url("principal/consulta2")?>">
					<input type="text" name="s" / style='width: 100%;'
						placeholder='Buscar Serie'> <a
						onclick="document.getElementById('search').submit()">
						<div class="search_icon"></div>
					</a>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
	</header>