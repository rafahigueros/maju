<?php 

/*
    Archives template 
    theme: maju by rafaelhigueros.me | scream.ws
    v: 1.0
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

	<div id="body">

	    <section id="articles" class="grid_9">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="archives"> 
		    <div class="grid_4">
		    <h5 class="title"><?php the_title(); ?></h5>
		    <ul>
			<?php wp_get_archives('type=alpha'); ?>
		    </ul>
		    </div>

		    <div class="grid_4">
		    <h5><?php _e('Archives by Category:', 'maju') ?></h5>
		    <ul>
			 <?php wp_list_categories(); ?>
		    </ul>
		    </div>
		</article>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'maju'); ?></p>
		<?php endif; ?>

	    </section>

	    <!-- Sidebar -->
	    <?php get_sidebar(); ?>

	</div>	

<?php get_footer(); ?>
