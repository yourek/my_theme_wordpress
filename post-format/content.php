<article id="post-<?php the_ID(); ?>" <?php post_class('klb-article post'); ?>>
	<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
		<?php  
		$att=get_post_thumbnail_id();
		$image_src = wp_get_attachment_image_src( $att, 'full' );
		$image_src = $image_src[0]; 
		?>
        <figure class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image_src); ?>" alt="<?php the_title_attribute(); ?>"></a>
		</figure>
	<?php } ?>
	<div class="entry-wrapper">
		<div class="entry-meta top">
			<?php if(has_category()){ ?>
				<div class="entry-category">
					<?php the_category(', '); ?>
				</div><!-- entry-category -->
			<?php } ?>
			
		    <div class="entry-date">
				<a href="<?php the_permalink(); ?>"> <?php echo get_the_date(); ?></a>
		    </div>
					  
			<?php the_tags( '<div class="meta-item entry-tags">', ', ', ' </div>'); ?>
			
			<?php if ( is_sticky()) {
				printf( '<div class="meta-item sticky-post"><i class="klbth-icon-star-empty"></i> %s</div>', esc_html__('Featured', 'clotya' ) );
			} ?>
        </div>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
		<div class="entry-content">
			<?php the_excerpt(); ?>
			<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'clotya' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
		</div><!-- entry-content -->
	</div><!-- entry-wrapper -->
</article><!-- post -->

