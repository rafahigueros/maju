<?php 

/*
    Single template 
    theme: maju by rafaelhigueros.com | scream.ws
    v: 1.2
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

	<div id="body">

	    <section id="articles" class="grid_9">

		<article itemscope itemtype="http://schema.org/Article"> 
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		    <?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?>
		    <h1 class="title" itemprop="name"><?php the_title(); ?></h1>
		    <?php the_content(); ?>
		    <p itemprop="about"><?php the_tags(); ?></p>
		<?php endwhile; else: ?>
		    <p><?php _e('Sorry, no posts matched your criteria.', 'maju'); ?></p>
		<?php endif; ?>
		</article>

		<p>
		    <?php if($options['tw_user'] == '') { } else { ?>
		    <a  href="https://twitter.com/share" class="twitter-share-button" data-size="large"  data-text="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" data-via="<?php echo $options['tw_user']; ?>" data-lang="en">Tweet</a>
		    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		    <?php } ?>
		    <a style="float: right;" href="#" class="back-top"><?php _e('top &uarr;', 'maju') ?></a>
		</p>

		<div id="singlepost-widget-area"><!-- I use this for ad space usually -->
		    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Single Post Widgets") ) : ?>
		    <?php endif; ?>
		</div>

		<div class="post-meta">
		    <div itemscope itemtype="http://schema.org/Person">
			<p>by: <a href="<?php the_author_url(); ?>" rel="author" title="<?php the_author(); ?>" itemprop="url"><span itemprop="name"><?php the_author(); ?></a> <span class="post-date"><?php the_date();?></span></p>
			<p itemprop="description">
			<?php if(the_author_description() == '') { } else { ?>
			<?php the_author_description(); ?>
			<?php } ?>
			<p>
		    </div>
		</div>

		<?php comments_template(); ?>

	    </section>

	    <!-- Sidebar -->
	    <?php get_sidebar(); ?>

	</div>	

<?php get_footer(); ?>
