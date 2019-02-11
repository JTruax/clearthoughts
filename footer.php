<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package clearthoughts
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'clearthoughts_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<p class="site-info">
                        
                        © <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>
                        
                        <span class="sep"> | </span>
                        
							<a href="<?php  echo esc_url( __( 'http://wordpress.org/','clearthoughts' ) ); ?>"><?php printf( 
							/* translators:*/
							esc_html__( 'Proudly powered by %s', 'clearthoughts' ),'WordPress' ); ?></a>
                        
				         <span class="sep"> | </span>
                        
                        ClearThoughts theme by <a href="https://webgeekstudio.ca" target="_blank">Webgeek Studio</a>
                        
					</p><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

