<?php 

/*
    Template Name: Archive
    theme: maju by rafaelhigueros.me | scream.ws
    v: 1.0
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

	<div id="body">

	    <section id="articles" class="grid_9">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article> 
		    <h5 class="title"><?php the_title(); ?></h5>
		    <div class="archives">
		    <ul>
		    <?php
			$recentPosts = new WP_Query();
			$recentPosts->query('showposts=10');
		    ?>
		    <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><em><?php the_date('M d Y'); ?></em><?php the_title(); ?></a></li>
		    <?php endwhile; wp_reset_query(); ?> 
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
