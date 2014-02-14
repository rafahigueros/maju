<?php 

/*
    Page template 
    theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header();  ?>

    <div class="row">
        <section class="col-md-8">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article> 
                <div class="page-header">
                    <h1 class="title"><?php the_title(); ?></h1>
                </div>
                <?php the_content(); ?>
            </article>
            <div class="clearfix"></div>
            <?php endwhile; else: ?>
            <article>
                <p><?php _e('Sorry, no posts matched your criteria.', 'maju'); ?></p>
            </article>
            <?php endif; ?>
        </section>

        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>
