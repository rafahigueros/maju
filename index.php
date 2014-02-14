<?php 

/*
    Index/main template 
    theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

    <div class="row">
        <section class="col-md-8">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article> 
                <h3 class="post-title"><a href="<? the_permalink();?>" title="<?php the_title();  ?>"><?php the_title(); ?></a></h3>
                <?php the_content( __('Continue Reading..', 'maju') ); ?>
            </article>
            <div class="clearfix"></div>
            <?php endwhile; else: ?>
            <article> 
                <p><?php _e('Sorry, no posts matched your criteria.', 'maju'); ?></p>
            </article> 
            <?php endif; ?>
            <?php next_posts_link('&larr; Past Articles') ?> <?php previous_posts_link('New Articles &rarr;') ?>
        </section>

        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>
