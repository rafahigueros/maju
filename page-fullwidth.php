<?php 

/*
    Template Name: No Sidebar
    theme: maju by rafaelhigueros.me | scream.ws
    v: 1.0
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

	<div id="body">

	    <section id="articles" class="grid_12 fullwidth">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article> 
		    <h1 class="title"><?php the_title(); ?></h1>
		    <?php the_content(); ?>
		</article>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'maju'); ?></p>
		<?php endif; ?>

	    </section>

	</div>	

<?php get_footer(); ?>
