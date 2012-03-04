<?php 

/* 
    Footer template
    theme: maju by rafaelhigueros.me | scream.ws
    v: 1.0
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>


	<footer class="grid_12"><!-- Footer -->
	    <?php 
	    // If set on theme options page, footer copy will be pasted here
	    if($options['footer_copy'] == '') { ?>
	    <small class="copy">&copy; 2012 WP theme depeloped by <a href="http://rafaelhigueros.me">rafaelhigueros.me</a> / <a href="http://scream.ws">scream.ws</a></small>
	    <?php } else { ?>
	    <small class="copy"><?php echo $options['footer_copy']; ?></small>
	    <?php } ?>
	    <small class="links"><a href="#" id="back-top"><?php _e('top &uarr;', 'maju') ?></a></small>
	</footer><!--- #END Footer -->
    </div>

    <!-- Scripts -->
    <script>
	// Custom code here

	(function (){
	    //Back to top
	    $('a#back-top').on('click', function(){
		$('html, body').animate({scrollTop: '0px'}, 300);
		return false;
	    });

	    // Add search form
	    $('<li></li>',{
		id: 'show-search',
		text: 'search'
	    }).appendTo('nav ul');

	    $('#show-search').on('click', function(){
		$(this).hide();
		$('#searchform').fadeIn();
	    });

	})();
    </script>

    <?php wp_footer(); ?>
	
</body>
</html>
