<?php 

/*
    Home template 
    theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

	<div id="body">

	    <section id="articles" class="grid_9">
		<?php
		    $u = $options['post_num']; 
		    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		    query_posts('showposts='.$u.'&paged='.$paged);
		?>
		<?php while (have_posts()) : the_post(); ?>
		<article> 
		    <h1 class="post-title"><a href="<? the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
		    <?php the_content( __('Continue Reading..', 'maju') ); ?>
		</article>
		<?php endwhile; wp_reset_query(); ?> 

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
			//If archives page is set up, add a "view all posts"
			$archives = $options['archives_page'];
			if($archives == '') { } else {
		    ?>
			<li class="view-all-posts"><a href="<?php echo get_option('home') ?>/<?php echo $archives; ?>"><?php _e('View all posts &rarr;', 'maju') ?></a></li>
		    <?php } ?>
		    </ul>
		</div>

	    </section>

	    <!-- Sidebar -->
	    <?php get_sidebar(); ?>

	</div>	

<?php get_footer(); ?>
