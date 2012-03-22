<?php 

/*
    Page template 
    theme: maju by rafaelhigueros.com | scream.ws
    v: 1.2
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

		<div class="archives">
		    <h4><?php _e('Archives', 'maju') ?></h4>
		    <ul>
		    <?php
			$recentPosts = new WP_Query();
			$recentPosts->query('showposts=10');
		    ?>
		    <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><em><?php the_date('M d Y'); ?></em><?php the_title(); ?></a></li>
		    <?php endwhile; wp_reset_query(); ?> 
		    <?php
			$archives = $options['archives_page'];
			if($archives == '') { } else {
		    ?>
			<li class="view-all-posts"><a href="<?php echo get_option('home') ?>/<?php echo $archives; ?>"><?php _e('View all posts &rarr;', 'maju') ?></a></li>
		    <?php } ?>
		    </ul>
		</div>	

		<?php comments_template(); ?>

	    </section>

	    <!-- Sidebar -->
	    <?php get_sidebar(); ?>

	</div>	

<?php get_footer(); ?>
