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
	    <small class="copy">&copy; 2012 WP theme by <a href="http://rafaelhigueros.com">rafaelhigueros.com</a></small>
	    <?php } else { ?>
	    <small class="copy">
		<?php echo $options['footer_copy']; ?></small>
	    <?php } ?>
	    <small class="links"><a href="#" id="back-top"><?php _e('top &uarr;', 'maju') ?></a></small>
	</footer><!--- #END Footer -->
    </div>

    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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

	    var reqname = $('form#commentform p.comment-form-author span.required');
	    var reqmail = $('form#commentform p.comment-form-email span.required');
	    $('form#commentform p.comment-form-author label').append(reqname);
	    $('form#commentform p.comment-form-email label').append(reqmail);


	})();
    </script>
    <script src="<?php bloginfo('template_url'); ?>/js/adapt.min.js"></script>

    <?php wp_footer(); ?>
	
</body>
</html>
