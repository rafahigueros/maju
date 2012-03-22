<?php 

/*
    Categories template 
    theme: maju by rafaelhigueros.com | scream.ws
    v: 1.2
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

	<div id="body">

	    <section id="articles" class="grid_9">
		<article> 
		    <h3 class="tags-name"><?php _e( 'Articles under', 'maju' ); ?>: <?php the_category(', '); ?></h3>
		    <div class="archives">
			<ul>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			    <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><em><?php the_date('M d Y'); ?></em><?php the_title(); ?></a></li>
			<?php endwhile; else: ?>
			    <li><?php _e('Sorry, no posts matched your criteria.', 'maju'); ?></li>
			<?php endif; ?>
			</ul>
		    </div>
		</article>
	    </section>

	    <!-- Sidebar -->
	    <?php get_sidebar(); ?>

	</div>	

<?php get_footer(); ?>
