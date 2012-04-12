<?php 

/*
    Page template 
    theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

	<div id="body">

	    <section id="articles" class="grid_9">

		<article> 
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		    <h1 class="title"><?php the_title(); ?></h1>
		    <?php the_content(); ?>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'maju'); ?></p>
		<?php endif; ?>
		</article>

		<?php comments_template(); ?>

	    </section>

	    <!-- Sidebar -->
	    <?php get_sidebar(); ?>

	</div>	

<?php get_footer(); ?>
