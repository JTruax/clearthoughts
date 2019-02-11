<?php
/**
 * Partial template for content in page.php
 *
 * @package clearthoughts
 */

?>

    <article <?php post_class(); ?> id="post-
        <?php the_ID(); ?>">

        <header class="entry-header">

            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        </header>
        <!-- .entry-header -->


        <div class="entry-content">

            <?php the_content(); ?>

            <?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'clearthoughts' ),
			'after'  => '</div>',
		) );
		?>

        </div>
        <!-- .entry-content -->

        <footer class="entry-footer">

            <?php edit_post_link( __( 'Edit', 'clearthoughts' ), '<span class="edit-link">', '</span>' ); ?>

        </footer>
        <!-- .entry-footer -->

    </article>
    <!-- #post-## -->