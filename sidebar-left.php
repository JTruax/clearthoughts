<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package clearthoughts
 */

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'clearthoughts_sidebar_position' );
?>

    <?php if ( 'both' === $sidebar_pos ) : ?>
    <div class="widget-area" id="left-sidebar" role="complementary">
        <?php else : ?>
        <div class="widget-area" id="left-sidebar" role="complementary">
            <?php endif; ?>
            <?php dynamic_sidebar( 'left-sidebar' ); ?>

        </div>
        <!-- #secondary -->