<?php 

/*
    Taxanomies Template
    theme: maju by rafaelhigueros.me | scream.ws
    v: 1.0
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

<script src="<?php bloginfo('template_url'); ?>/js/portfolio.js"></script>

	<div id="body">

	    <!-- Projects [BEGIN] -->
	    <section id="projects" class="grid_12 fullwidth">

		<p><a href="<?php echo get_option('home'); ?>/view-my-work/"><?php _e('&larr; Back to all projects', 'maju') ?></a></p>

		<?php 
		//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

		$taxonomy     = 'project_type';
		$orderby      = 'name'; 
		$show_count   = 0;      // 1 for yes, 0 for no
		$pad_counts   = 0;      // 1 for yes, 0 for no
		$hierarchical = 1;      // 1 for yes, 0 for no
		$title        = '';

		$args = array(
		  'taxonomy'     => $taxonomy,
		  'orderby'      => $orderby,
		  'show_count'   => $show_count,
		  'pad_counts'   => $pad_counts,
		  'hierarchical' => $hierarchical,
		  'title_li'     => $title
		);
		?>

		<ul class="project-type">
		    <li><?php _e('Sort by type:', 'maju') ?></li>
		<?php wp_list_categories( $args ); ?>
		</ul>

		<?php
		    $i = 0;
		    if ( have_posts() ) : while ( have_posts() ) : the_post();
		?>
		    <div class="<?php if($i%3!=0){ echo 'grid_3 project-box'; } else { echo 'grid_3 project-box first-box'; } ?>">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			    <?php the_post_thumbnail('thumbnail'); ?>
			</a>
		    </div>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'maju'); ?></p>
		<?php endif; ?>

	    </section>
	    <!-- Projects [END] -->

	</div>	

<?php get_footer(); ?>
