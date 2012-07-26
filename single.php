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
		    <h1 itemprop="name" class="title"><?php the_title(); ?></h1>
		    <?php the_content(); ?>
		    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'maju' ) . '</span>', 'after' => '</div>' ) ); ?>
		    <p itemprop="about">
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

		<div id="singlepost-widget-area"><!-- I use this for ad space usually -->
		    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Single Post Widgets") ) : ?>
		    <?php endif; ?>
		</div>

		<div class="post-meta">
		    <iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=276799092404902" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>

		    <a href="https://twitter.com/share" data-url="<?php the_permalink(); ?>" class="twitter-share-button" data-via="<?php echo $options['tw_user']; ?>">Tweet</a>
		    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

		    <!-- Place this tag where you want the +1 button to render -->
		    <div class="g-plusone"></div>

		    <!-- Place this render call where appropriate -->
		    <script type="text/javascript">
		    (function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		    })();
		    </script>

		    <div itemscope itemtype="http://schema.org/Person">
			<p>
			    <?php _e('post written by:', 'maju'); ?> <a href="<?php the_author_url(); ?>" rel="author" title="<?php the_author(); ?>" itemprop="url"><span itemprop="name"><?php the_author(); ?></a><br />
			    <span class="post-date"><?php the_date();?></span>
			    <a style="float: right;" href="#" class="back-top"><?php _e('top &uarr;', 'maju') ?></a>
			</p>
		    </div>
		</div>

		<?php comments_template(); ?>

	    </section>

	    <!-- Sidebar -->
	    <?php get_sidebar(); ?>

	</div>	

<?php get_footer(); ?>
