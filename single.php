<?php 

/*
    Single template 
    theme: maju by rafaelhigueros.me | scream.ws
    v: 1.0
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

	<div id="body">

	    <section id="articles" class="grid_9">

		<article> 
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		    <?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?>
		    <h1 class="title"><?php the_title(); ?></h1>
		    <?php the_content(); ?>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'maju'); ?></p>
		<?php endif; ?>
		</article>

		<p>
		    <?php if($options['tw_user'] == '') { } else { ?>
		    <a  href="https://twitter.com/share" class="twitter-share-button" data-size="large"  data-text="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" data-via="<?php echo $options['tw_user']; ?>" data-lang="en">Tweet</a>
		    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		    <?php } ?>
		    <a style="float: right;" href="#" id="back-top"><?php _e('top &uarr;', 'maju') ?></a>
		</p>

		<div id="singlepost-widget-area"><!-- I use this for ad space usually -->
		    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Single Post Widgets") ) : ?>
		    <?php endif; ?>
		</div>

		<?php comments_template(); ?>

	    </section>

	    <!-- Sidebar -->
	    <?php get_sidebar(); ?>

	</div>	

<?php get_footer(); ?>
