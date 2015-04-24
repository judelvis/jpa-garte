
		<!--PAGE CONTENT -->
		<div id="content">
			<div class="inner">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header"><?php echo $titulo;?></h1>
					</div>
				</div>
			<?php $this -> load -> view('panel/'.$formulario);?>

		</div>
		<!-- END PAGE CONTENT -->

	</div>


	<!--END MAIN WRAPPER -->

	<!-- FOOTER -->
	<div id="footer">
		
		<p>&copy; empresa &nbsp;2014 &nbsp;</p>
	</div>
	<!--END FOOTER -->


	<!-- GLOBAL SCRIPTS -->
	<script src="<?php echo __PANEL__;?>plugins/jquery-2.0.3.min.js"></script>
	<script
		src="<?php echo __PANEL__;?>plugins/bootstrap/js/bootstrap.min.js"></script>
	<script
		src="<?php echo __PANEL__;?>plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<!-- END GLOBAL SCRIPTS -->


	<!-- PAGE LEVEL SCRIPT-->
	<script src="<?php echo __PANEL__;?>js/jquery-ui.min.js"></script>
	<script src="<?php echo __PANEL__;?>plugins/uniform/jquery.uniform.min.js"></script>
	<script src="<?php echo __PANEL__;?>plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
	<script src="<?php echo __PANEL__;?>plugins/chosen/chosen.jquery.min.js"></script>
	<script src="<?php echo __PANEL__;?>plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
	<script src="<?php echo __PANEL__;?>plugins/tagsinput/jquery.tagsinput.min.js"></script>
	<script src="<?php echo __PANEL__;?>plugins/validVal/js/jquery.validVal.min.js"></script>
	
	<!--<script src="<?php echo __PANEL__;?>plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo __PANEL__;?>plugins/daterangepicker/moment.min.js"></script>
	<script src="<?php echo __PANEL__;?>plugins/datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo __PANEL__;?>plugins/timepicker/js/bootstrap-timepicker.min.js"></script>!-->
	
	<script src="<?php echo __PANEL__;?>plugins/switch/static/js/bootstrap-switch.min.js"></script>
	<script src="<?php echo __PANEL__;?>plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
	<script	src="<?php echo __PANEL__;?>plugins/autosize/jquery.autosize.min.js"></script>
	<script src="<?php echo __PANEL__;?>plugins/jasny/js/bootstrap-inputmask.js"></script>
	
	<script src="<?php echo __PANEL__;?>js/formsInit.js"></script>
	<script>
            $(function () { formInit(); });
        </script>

	<!--END PAGE LEVEL SCRIPT-->

</body>
<!-- END BODY -->
</html>
