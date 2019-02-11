<?php
/**
 * Left sidebar check.
 *
 * @package clearthoughts
 */

?>

<?php
$sidebar_pos = get_theme_mod( 'clearthoughts_sidebar_position' );
?>

<?php if ( 'left' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>
	<?php get_sidebar( 'left' ); ?>
<?php endif; ?>

