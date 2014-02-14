<?php 

/* 
    Footer template
    theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

        <footer class="row">
            <?php 
            // If set on theme options page, footer copy will be pasted here
            if($options['footer_copy'] == '') { ?>
            <p class="col-md-6">&copy; 2012 WP theme by <a href="http://rafaelhigueros.com">rafaelhigueros.com</a></p>
            <?php } else { ?>
            <p class="col-md-6">
            <?php echo $options['footer_copy']; ?></p>
            <?php } ?>
            <p class="col-md-6"><a href="#" class="pull-right back-top"><?php _e('top &uarr;', 'maju') ?></a></p>
        </footer>
        <!--- FOOTER #END -->

    </div>
   <!-- CONTAINER #END -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <!-- Scripts -->
    <script>

    // Custom code here
    (function (){

        //If Javascript is enabled add a "js" class
        $('html').addClass('js');

        //Back to top
        $('a.back-top').on('click', function(){
            $('html, body').animate({scrollTop: '0px'}, 300);
            return false;
        });

        $('article img.size-full').addClass('img-responsive');
        $('article img.size-large').addClass('img-responsive');
        $('article img.alignnone').addClass('img-responsive');

    })();

    //Google Analytics code
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '<?php echo $options['g_a']; ?>']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    </script>

    <?php wp_footer(); ?>
    
    <?php
    //Custom JS here if any
    if($options['custom_javascript'] == '') { } else { ?><!-- Custom JS if any -->
    <script>
    <?php echo stripslashes(htmlspecialchars_decode($options['custom_javascript'])); ?>  
    </script><?php } ?>

</body>
</html>
