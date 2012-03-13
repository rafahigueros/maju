<?php 

/*
    404 / Not found 
    theme: maju by rafaelhigueros.me | scream.ws
    v: 1.0
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>



<script>
(function(){
})();
</script>

	<div id="body">

	    <section id="articles" class="grid_9">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article> 
		    <h2 class="title"><a href="<? the_permalink();?>" title="<?php the_title();  ?>"><?php the_title(); ?></a></h2>
		    <?php the_excerpt(); ?>
		    <a href="<?php the_permalink(); ?>" title="<?php the_title();  ?>" class="read-more">read more &rarr;</a>
		</article>
		<?php endwhile; else: ?>
		<article class="notfound">
		    <h1><?php _e('404', 'maju'); ?></h1>
		    <p>Page not found</p>
		    <h5><?php _e('Try using the search form', 'maju') ?></h5>
		    <?php get_search_form();  ?>
		</article>
		<?php endif; ?>

		<div class="archives home">
		    <h4><?php _e('Archives', 'maju') ?></h4>
		    <ul>
		    <?php
			$recentPosts = new WP_Query();
			$recentPosts->query('showposts=10');
		    ?>
		    <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><em><?php the_date('M d Y'); ?></em><?php the_title(); ?></a></li>
		    <?php endwhile; wp_reset_query(); ?> 
			<li><a href="<?php echo get_option('home') ?>/archives"><?php _e('View all posts &rarr;', 'maju') ?></a></li>
		    </ul>
		</div>

	    </section>

	    <!-- Sidebar -->
	    <?php get_sidebar(); ?>

	</div>	

<?php get_footer(); ?>
