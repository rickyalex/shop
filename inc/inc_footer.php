<?php 
?>
	<script src="<?php echo BASE_URL ?>js/bootstrap.min.js"></script>
	 <script src="<?php echo BASE_URL ?>js/bootstrap.js"></script>
	 <script src="<?php echo BASE_URL ?>js/jquery.dcjqaccordion.2.7.js"></script>
	 <script src="<?php echo BASE_URL ?>js/jquery.scrollTo.min.js"></script>
	 <script src="<?php echo BASE_URL ?>js/jquery.nicescroll.js" type="text/javascript"></script>
	 <script src="<?php echo BASE_URL ?>js/jquery.sparkline.js"></script>

 	 <!--common script for all pages-->
 	 <script src="<?php echo BASE_URL ?>js/common-scripts.js"></script>
		
	 <script src="<?php echo BASE_URL ?>js/gritter/js/jquery.gritter.js"></script>
	 <script src="<?php echo BASE_URL ?>js/gritter-conf.js"></script>

	 <!--script for this page-->
	 <script src="<?php echo BASE_URL ?>js/sparkline-chart.js"></script>    
	 <script src="<?php echo BASE_URL ?>js/zabuto_calendar.js"></script>	

	 <!-- XCRUD -->
	 <script src="<?php echo BASE_URL ?>js/shCore.js" type="text/javascript"></script>
	 <script src="<?php echo BASE_URL ?>js/shBrushPhp.js" type="text/javascript"></script>
	 <script src="<?php echo BASE_URL ?>js/shBrushJScript.js" type="text/javascript"></script>

	 <link href="<?php echo BASE_URL ?>css/select2.css" rel="stylesheet" type="text/css" />
	 <script src="<?php echo BASE_URL ?>js/select2.js"></script>
	 <script>
		jQuery(document).on("ready xcrudafterrequest", function(event, container) {
		    if (container) {
		        jQuery(container).find("select").select2({ width: '100%' });
		    } else {
		        jQuery(".xcrud").find("select").select2({ width: '100%' });
		    }
		});
		jQuery(document).on("xcrudbeforedepend", function(event, container, data) {
		    jQuery(container).find('select[name="' + data.name + '"]').select2("destroy");
		});
		jQuery(document).on("xcrudafterdepend", function(event, container, data) {
		    jQuery(container).find('select[name="' + data.name + '"]').select2({ width: '100%' });
		});
	</script>
<?php
?>
