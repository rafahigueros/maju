<?php 

/*
    Single template 
    theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

    <div class="row">
        <section class="col-md-8">

            <article itemscope itemtype="http://schema.org/Article"> 
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="page-header">
                    <h1 itemprop="name" class="title"><?php the_title(); ?></h1>
                </div>
                <section itemprop="articleBody" class="article-content">
                    <?php the_content(); ?>
                </section>
                <!--  LE ARTICLE CONTENT #END -->

                <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'maju' ) . '</span>', 'after' => '</div>' ) ); ?>
                <!--  LE ARTICLE PAGINATION #END -->
                
                <dl class="dl-horizontal">
                    <dt><?php _e('tagged:'); ?></dt>
                    <dd class="tag-links" itemprop="genre">
                        <?php
                            $posttags = get_the_tags();
                            if ($posttags) {
                                foreach($posttags as $tag) {
                                    echo '<a href="' . get_tag_link($tag_id) . '" itemprop="keywords">' . $tag->name . '</a>, '; 
                                }
                            }
                        ?>
                    </dd>
                </dl>
                <!--  LE ARTICLE TAGS #END -->

            <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.', 'maju'); ?></p>
            <?php endif; ?>

                <dl class="dl-horizontal by_line">
                    <dt>
                        <?php _e('written by:', 'maju'); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author(); ?>" itemprop="author" rel="me"><?php the_author(); ?></a><br />
                    </dt>
                    <dd><?php echo get_the_author_meta('description'); ?></dd>
                    <dt><?php _e('Date:', 'maju'); ?></dt>
                    <dd class="post-date" itemprop="datePublished" ><?php the_date();?></dd>
                </dl>

            </article>
           <!-- LE ARTICLE #END -->

            <div id="singlepost-widget-area"><!-- I use this for ad space usually -->
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Single Post Widgets") ) : ?>
                <?php endif; ?>
            </div>

            <div class="post-meta">
                <div class="fb-like" data-href="<?php the_permalink(); ?>" style="padding: 0 15px 0 0;" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>

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

                <a style="float: right; margin: -25px 0 0 0;" href="#" class="back-top"><?php _e('top &uarr;', 'maju') ?></a>
            </div>
            <!-- POST META #END -->

            <?php comments_template(); ?>

        </section>

        <!-- Sidebar -->
        <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>
