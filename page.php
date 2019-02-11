<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package clearthoughts
 */

get_header();

$container   = get_theme_mod( 'clearthoughts_container_type' );
?>

<?php if ( is_page() ) : ?>
	<?php get_template_part( 'global-templates/hero', 'none' ); ?>
<?php endif; ?>


    <div class="wrapper" id="page-wrapper">

        <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

            <div class="row">

                <main class="site-main" id="main">

                    <?php
	if ( has_post_thumbnail() ) { ?>

                        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                        <div class="image-hero" style="background-image: url('<?php echo $thumb['0'];?>')">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
                        </div>
                        <?php } ?>

                        <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'loop-templates/content', 'page' ); ?>

                        <?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

                            <?php endwhile; // end of the loop. ?>

                </main>
                <!-- #main -->

            </div>
            <!-- #primary -->

        </div>
        <!-- .row -->

    </div>
    <!-- Container end -->

    </div>
    <!-- Wrapper end -->

    <?php get_footer(); ?>