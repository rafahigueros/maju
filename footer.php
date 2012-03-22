<?php 

/* 
    Footer template
    theme: maju by rafaelhigueros.com | scream.ws
    v: 1.2
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>


	<footer class="grid_12"><!-- Footer -->
	    <?php 
	    // If set on theme options page, footer copy will be pasted here
	    if($options['footer_copy'] == '') { ?>
	    <small class="copy">&copy; 2012 WP theme by <a href="http://rafaelhigueros.com">rafaelhigueros.com</a></small>
	    <?php } else { ?>
	    <small class="copy">
		<?php echo $options['footer_copy']; ?></small>
	    <?php } ?>
	    <small class="links"><a href="#" class="back-top"><?php _e('top &uarr;', 'maju') ?></a></small>
	</footer><!--- #END Footer -->
    </div>

    <!-- Scripts -->
    <script>

	//This enables the site to adjust on any screen, you can find this script here: http://adapt.960.gs/
	// Edit to suit your needs.
	var ADAPT_CONFIG = {
	  // Where is your CSS?
	  path: '<?php bloginfo('template_url'); ?>/css/',

	  // false = Only run once, when page first loads.
	  // true = Change on window resize and page tilt.
	  dynamic: true,

	  // First range entry is the minimum.
	  // Last range entry is the maximum.
	  // Separate ranges by "to" keyword.
	  range: [
	    '0px    to 760px  = mobile.css',
	    '760px  to 2560px  = 720.css'
	  ]
	};

	// Custom code here
	(function (){

	    //If Javascript is enabled add a "js" class
	    $('html').addClass('js');

	    //Back to top
	    $('a.back-top').on('click', function(){
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

	    var reqname = $('form#commentform p.comment-form-author span.required');
	    var reqmail = $('form#commentform p.comment-form-email span.required');
	    $('form#commentform p.comment-form-author label').append(reqname);
	    $('form#commentform p.comment-form-email label').append(reqmail);

	})();

	//Google Analytics code
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', '<?php echo $options['g_a']; ?>']);
	_gaq.push(['_trackPageview']);

	(function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
    </script>
    <script src="<?php bloginfo('template_url'); ?>/js/adapt.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/prettify.js"></script>

    <?php wp_footer(); ?>

    
    <?php
    //Custom JS here if any
    if($options['custom_javascript'] == '') { } else { ?><!-- Custom JS if any -->
    <script>
    <?php echo stripslashes($options['custom_javascript']); ?>  
    </script><?php } ?>

	
</body>
</html>
