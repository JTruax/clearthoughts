<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package clearthoughts
 */

get_header();

$container   = get_theme_mod( 'clearthoughts_container_type' );
$sidebar_pos = get_theme_mod( 'clearthoughts_sidebar_position' );

?>

    <div class="wrapper" id="404-wrapper">

        <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

            <div class="row">
                <div class="col-sm-12 col-md-4 entry-header">
                    <span class="four-o-four">404</span>
                </div>

                <div class="col-md-8 content-area" id="primary">

                    <main class="site-main" id="main">

                        <section class="error-404 not-found">



                            <header class="page-header">

                                <h1 class="page-title">
                                    <?php esc_html_e( 'Oops! That page can&rsquo;t be found.',
							'clearthoughts' ); ?>
                                </h1>

                            </header>
                            <!-- .page-header -->

                            <div class="page-content">

                                <p>
                                    <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?',
							'clearthoughts' ); ?>
                                </p>

                                <?php get_search_form(); ?>

                                <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

                                <?php if ( clearthoughts_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>

                                <div class="widget widget_categories">

                                    <h2 class="widget-title">
                                        <?php esc_html_e( 'Most Used Categories', 'clearthoughts' ); ?>
                                    </h2>

                                    <ul>
                                        <?php
										wp_list_categories( array(
											'orderby'    => 'count',
											'order'      => 'DESC',
											'show_count' => 1,
											'title_li'   => '',
											'number'     => 10,
										) );
										?>
                                    </ul>

                                </div>
                                <!-- .widget -->

                                <?php endif; ?>

                                <?php

							the_widget( 'WP_Widget_Tag_Cloud' );
							?>

                            </div>
                            <!-- .page-content -->

                        </section>
                        <!-- .error-404 -->
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