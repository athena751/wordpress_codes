<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri());?>/js/cloud-zoom.1.0.2.min.js"></script>
<script type="text/javascript">
	jQuery(function() {
	    if ( document.location.href.indexOf('#tv-showspromotional') > -1 ) {
	       // $('#elementID').animate({"left": "250"}, "slow");
	       jQuery(".nav-tabs li").removeClass( "active" )
	       jQuery('li.term-80').addClass('active');
	       jQuery(".tab-content .tab-pane").removeClass( "in active" )
	       jQuery('#tv-showspromotional').addClass('in active');
	    }
	});
</script>
<?php wp_footer(); ?>


</body>
</html>