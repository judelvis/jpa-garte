<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
<meta charset="UTF-8" />
<title>Panel de Control</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
<!-- GLOBAL STYLES -->
<!-- GLOBAL STYLES -->
<link rel="stylesheet" href="<?php echo __PANEL__;?>plugins/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo __PANEL__;?>css/main.css" />
<link rel="stylesheet" href="<?php echo __PANEL__;?>css/theme.css" />
<link rel="stylesheet" href="<?php echo __PANEL__;?>css/MoneAdmin.css" />
<link rel="stylesheet" href="<?php echo __PANEL__;?>plugins/Font-Awesome/css/font-awesome.css" />
<!--END GLOBAL STYLES -->

<!-- PAGE LEVEL STYLES -->

<link href="<?php echo __PANEL__;?>css/jquery-ui.css" rel="stylesheet" />
<link href="<?php echo __CSS__;?>tgrid/TGrid.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo __PANEL__;?>plugins/uniform/themes/default/css/uniform.default.css" />
<link rel="stylesheet" href="<?php echo __PANEL__;?>plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
<link rel="stylesheet" href="<?php echo __PANEL__;?>plugins/chosen/chosen.min.css" />
<link rel="stylesheet" href="<?php echo __PANEL__;?>plugins/colorpicker/css/colorpicker.css" />
<link rel="stylesheet" href="<?php echo __PANEL__;?>plugins/tagsinput/jquery.tagsinput.css" />
<link rel="stylesheet" href="<?php echo __PANEL__;?>plugins/daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" href="<?php echo __PANEL__;?>plugins/datepicker/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo __PANEL__;?>plugins/timepicker/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="<?php echo __PANEL__;?>plugins/switch/static/stylesheets/bootstrap-switch.css" />
<link rel="stylesheet" href="<?php echo __PANEL__;?>css/bootstrap-fileupload.min.css" />

<!-- END PAGE LEVEL  STYLES -->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>jquery/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>general/Global.js"></script>
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>tgrid/tgrid.js"></script>
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>tgrid/func.js"></script>
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>tgrid/xls.js"></script>
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>tgrid/paginador.js"></script>
<script type="text/javascript" src="<?php echo __JSVIEW__ ?>panel/<?php echo $js; ?>.js"></script>
</head>
<!-- END HEAD -->


<!-- BEGIN BODY -->
<body class="padTop53 ">
<div class="row">
		<div class="col-lg-12">
			<div class="modal" id="msj_alertas" tabindex="-1" role="dialog"
				aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Respuesta</h4>
						</div>
						<div class="modal-body" id='modal_mensaje'>
							mensaje
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- MAIN WRAPPER -->
	<div id="wrap">


		<!-- HEADER SECTION -->
		<div id="top">

			<nav class="navbar navbar-inverse navbar-fixed-top "
				style="padding-top: 10px;">
				<a data-original-title="Show/Hide Menu" data-placement="bottom"
					data-tooltip="tooltip"
					class="accordion-toggle btn btn-primary btn-sm visible-xs"
					data-toggle="collapse" href="#menu" id="menu-toggle"> <i
					class="icon-align-justify"></i>
				</a>
				<!-- LOGO SECTION -->
				<header class="navbar-header">

					<a href="#" class="navbar-brand"> <img
						src="<?php //echo __PANEL__;?>img/logo.png" alt="" />EMPRESA</a>
				</header>
				<!-- END LOGO SECTION -->
				

			</nav>

		</div>
		<!-- END HEADER SECTION -->


  
