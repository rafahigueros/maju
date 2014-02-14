<?php 

/*
    Date template 
    theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>
*/

//Get theme options
$options = get_option('maju_theme_options');

get_header(); ?>

    <div class="row">
        <section class="col-md-8">
            <div class="archives">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <dl class="dl-horizontal">
                    <dt><?php the_date('M d Y'); ?></dt>
                    <dd><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></dd>
                </dl>
                <?php endwhile; else: ?>
                    <li><?php _e('Sorry, no posts matched your criteria.', 'maju'); ?></li>
                <?php endif; ?>
            </div>
            <?php next_posts_link('&larr; Older Entries') ?>  <?php previous_posts_link('Newer Entries &rarr;') ?>
        </section>

        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>
