<?php
/**
 * The template for displaying all single posts.
 *
 * @package clearthoughts
 */

get_header();
$container   = get_theme_mod( 'clearthoughts_container_type' );
$sidebar_pos = get_theme_mod( 'clearthoughts_sidebar_position' );
?>

    <div class="wrapper" id="single-wrapper">

        <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

            <div class="row">

                <!-- Do the left sidebar check -->
                <?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

                <main class="site-main" id="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'loop-templates/content', 'single' ); ?>

                    <?php endwhile; // end of the loop. ?>


                    <?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) : ?>
                        <div class="row comments-wrapper">


                            <div class="col-md-12 col-lg-4">
                                <?php if (get_the_author_meta('description')) : // Checking if the user has added any author descript or not. If it is added only, then lets move ahead ?>
                                <table width="100%">
                                    <tr>
                                        <td width="100" class="author-image">
                                            <?php echo get_avatar(get_the_author_meta('user_email'), '80'); // Display the author gravatar image with the size of 100 ?>
                                        </td>
                                        <td><span>AUTHOR:</span>
                                            <h3 class="author-name">
                                                <?php esc_html(the_author_meta('display_name')); // Displays the author name of the posts ?>
                                            </h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <p class="author-description">
                                                <?php esc_textarea(the_author_meta('description')); // Displays the author description added in Biographical Info ?>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-12 col-lg-8">
                                <?php echo comments_template();?>
                            </div>


                        </div>
                        <!-- #row -->
                        <?php endif; ?>





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