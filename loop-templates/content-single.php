<?php
/**
 * Single post partial template.
 *
 * @package clearthoughts
 */
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    
    <div class="row">
        
<div class="col-md-12">

    <?php
	if ( has_post_thumbnail() ) { ?>
    
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
    <div class="image-hero" style="background-image: url('<?php echo $thumb['0'];?>')">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ></a>
    </div>
    <?php } ?>
<span class="overlay"></span>
</div>

    

    <div class="meta-wrapper">
	<header class="col-sm-12 col-md-4 entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        
        <?php if ( 'post' == get_post_type() ) : ?>

			<ul class="entry-meta">
				<li>Posted on <?php the_time('F j, Y'); ?> by <?php the_author_posts_link(); ?></li>
                <li>Category: <?php the_category( ' ' ); ?></li>
                <li>Tags: <?php the_tags( ' ' ); ?></li>
                <li><a href="<?php comments_link(); ?>">Leave a comment</a></li>
			</ul><!-- .entry-meta -->
		<?php endif; ?>
        
        <?php get_sidebar( 'left' ); ?>

	</header><!-- .entry-header -->

	<div class="col-sm-12 col-md-8">
        <div class="entry-content">
		  <?php the_content(); ?>
        </div>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'clearthoughts' ),
			'after'  => '</div>',
		) );
		?>

        <?php clearthoughts_post_nav(); ?>
        
        
	</div><!-- .entry-content -->
        
        
    
        
     </div><!-- .meta-wrapper -->
        
         </div><!-- .row -->
    
    
</article><!-- #post-## -->
