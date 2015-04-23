<?php $this -> load -> view("incluir/cabezera"); ?>
<body>
	<div class="container">
		<header>

			<h1>
				<strong>Control De Acceso</strong>
			</h1>
			<h2>Bienvenido</h2>
			<div class="support-note">
				<span class="note-ie">Ingrese usuario y clave</span>
			</div>

		</header>

		<section class="main">
			<form class="form-1" action='<?php echo base_url()?>index.php/panel/validarUsuario'  method='POST'>
				<p class="field">
					<input type="text" name="txtUsuario" id="txtUsuario" placeholder="USUARIO"> <i
						class="icon-user icon-large"></i>
				</p>
				<p class="field">
					<input type="password" name="txtClave" id="txtClave" placeholder="CLAVE"> <i
						class="icon-lock icon-large"></i>
				</p>
				<p class="submit">
					<button type="submit" name="submit">
						<i class="icon-arrow-right icon-large"></i>
					</button>
				</p>
			</form>
		</section>
	</div>
</BODY>
</HTML>