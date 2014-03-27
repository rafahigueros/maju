<?php 

/*
    404 / Not found 
    theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header(); ?>

    <div class="row">
        <section class="col-md-8">
        
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article> 
                <h1 class="post-title"><a href="<? the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                <?php the_content( __('Continue Reading..', 'maju') ); ?>
            </article>
            <?php endwhile; else: ?>
            <article class="notfound">
                <div class="page-header">
                    <h1 class="title">404</h1>
                </div>
                <p><?php _e('Try using the search form', 'maju') ?></p>
                <?php get_search_form();  ?>
                <div class="clearfix"></div>
                <br />
                <h3><?php _e('archives', 'maju'); ?> </h3>
                <div class="archives">
                    <ul>
                    <?php wp_get_archives('type=monthly'); ?>
                    </ul>
                </div>
            </article>
            <?php endif; ?>
        </section>

        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>
