<?php
/**
 * Search results partial template.
 *
 * @package clearthoughts
 */

?>
    <article <?php post_class(); ?> id="post-
        <?php the_ID(); ?>">
        <div class="row">

            <div class="col-md-12">

                <?php
	if ( has_post_thumbnail() ) { ?>

                    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
    <div class="image-hero" style="background-image: url('<?php echo $thumb['0'];?>')">
    </div></a>
                    <?php } ?>
            </div>

            <div class="meta-wrapper">
                <header class="col-sm-12 col-md-4 entry-header">

                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>' ); ?>

                    <?php if ( 'post' == get_post_type() ) : ?>

                    <ul class="entry-meta">
                        <li>Posted on
                            <?php the_time('F j, Y'); ?> by
                            <?php the_author_posts_link(); ?>
                        </li>
                        <li>Category:
                            <?php the_category( ' ' ); ?>
                        </li>
                        <li>Tags:
                            <?php the_tags( ' ' ); ?>
                        </li>
                        <li><a href="<?php comments_link(); ?>">Leave a comment</a></li>
                    </ul>
                    <!-- .entry-meta -->

                    <?php endif; ?>

                </header>
                <!-- .entry-header -->

                <div class="col-sm-12 col-md-8 entry-content">

                    <?php
		the_excerpt();
		?>

                    <?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'clearthoughts' ),
			'after'  => '</div>',
		) );
		?>

                </div>
                <!-- .entry-content -->

            </div>
            <!-- .meta-wrapper -->

        </div>
        <!-- .row -->
    </article>
    <!-- #post-## -->