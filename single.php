<?php 

/*
    Single template 
    theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

	<div id="body">

	    <section id="articles" class="grid_9">

		<article itemscope itemtype="http://schema.org/Article"> 
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		    <div class="post-title-box"><?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?><h1 itemprop="name"><?php the_title(); ?></h1></div>
		    <?php the_content(); ?>
		    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
		    <p itemprop="about">
		    on: <?php the_category(', '); ?><br /> 
		    <?php
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'maju' ) );
			if ( $tags_list ): ?>
			<span class="tag-links">
			    <?php printf( __( '<span class="%1$s">tagged:</span> %2$s', 'maju' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );?>
			</span>
			<?php endif; // End if $tags_list ?>
		    </p>
		<?php endwhile; else: ?>
		    <p><?php _e('Sorry, no posts matched your criteria.', 'maju'); ?></p>
		<?php endif; ?>
		</article>

		<p>
		    <?php if($options['tw_user'] == '') { } else { ?>
		    <a  href="https://twitter.com/share" class="twitter-share-button" data-size="large"  data-text="<?php the_title(); ?>" data-url="<?php echo wp_get_shortlink(); ?>" data-via="<?php echo $options['tw_user']; ?>" data-lang="en">Tweet</a>
		    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		    <?php } ?>
		    <script>
		      (function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		      })();
		    </script>
		    <g:plusone></g:plusone>
		    <?php
		    //If set on theme options panel integrate Facebook Open Graph
		    if($options['fb_id'] == '' || $options['fb_user_id'] == '') { } else { ?>
		    <iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=127607203928365" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
		    <a style="float: right;" href="#" class="back-top"><?php _e('top &uarr;', 'maju') ?></a>
		    <?php } ?>
		</p>

		<div id="singlepost-widget-area"><!-- I use this for ad space usually -->
		    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Single Post Widgets") ) : ?>
		    <?php endif; ?>
		</div>

		<div class="post-meta">
		    <div itemscope itemtype="http://schema.org/Person">
			<p><?php _e('by:', 'maju'); ?> <a href="<?php the_author_url(); ?>" rel="author" title="<?php the_author(); ?>" itemprop="url"><span itemprop="name"><?php the_author(); ?></a> <span class="post-date"><?php the_date();?></span></p>
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
