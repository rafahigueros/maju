<?php 

/*
    Categories template 
    theme: maju by rafaelhigueros.me | scream.ws
    v: 1.0
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

	<div id="body">

	    <section id="articles" class="grid_9">

		<h3><?php _e( 'Articles under', 'maju' ); ?>: <?php the_category('name'); ?></h3>
		<article> 
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><em><?php the_date(); ?> - </em><?php the_title(); ?></a><br />
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'maju'); ?></p>
		<?php endif; ?>
		</article>

	    </section>

	    <!-- Sidebar -->
	    <?php get_sidebar(); ?>

	</div>	

<?php get_footer(); ?>
