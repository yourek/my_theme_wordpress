<?php
/**
 * search.php
 * @package WordPress
 * @subpackage Clotya
 * @since Clotya 1.0
 * 
 */
 ?>

<?php get_header(); ?>

<div class="klb-blog page-content">
	<div class="container">

		<h2 class="search-title"><?php printf( esc_html__( 'Search Results for: %s', 'clotya' ), get_search_query() ); ?></h2>

		<?php if( get_theme_mod( 'clotya_blog_layout' ) == 'left-sidebar') { ?>
			<div class="row content-wrapper sidebar-left">
				<div id="sidebar" class="col col-12 col-md-3 col-lg-3 content-secondary site-sidebar blog-sidebar sticky">
					<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
						<?php dynamic_sidebar( 'blog-sidebar' ); ?>
					<?php } ?>
				</div>
				<div class="col col-12 col-md-9 col-lg-9 content-primary">
					<div class="blog-posts">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

						<?php endwhile; ?>
					
							<?php get_template_part( 'post-format/pagination' ); ?>
							
						<?php else : ?>

							<h2><?php esc_html_e('No Posts Found', 'clotya') ?></h2>

						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php } elseif( get_theme_mod( 'clotya_blog_layout' ) == 'full-width') { ?>
			<div class="row content-wrapper">
				<div class="col col-12 col-lg-10 offset-lg-1 content-primary">
					<div class="blog-posts">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

						<?php endwhile; ?>
					
							<?php get_template_part( 'post-format/pagination' ); ?>
							
						<?php else : ?>

							<h2><?php esc_html_e('No Posts Found', 'clotya') ?></h2>

						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
				<div class="row content-wrapper sidebar-right">
					<div class="col col-12 col-lg-9 content-primary">
						<div class="blog-posts">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

							<?php endwhile; ?>
						
								<?php get_template_part( 'post-format/pagination' ); ?>
								
							<?php else : ?>

								<h2><?php esc_html_e('No Posts Found', 'clotya') ?></h2>

							<?php endif; ?>
						</div>
					</div>
					<div id="sidebar" class="col col-12 col-lg-3 content-secondary blog-sidebar sticky">
						<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
						<?php } ?>
					</div>
				</div>
			<?php } else { ?>
				<div class="row content-wrapper">
					<div class="col col-12 col-lg-10 offset-lg-1 content-primary">
						<div class="blog-posts">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

							<?php endwhile; ?>
						
								<?php get_template_part( 'post-format/pagination' ); ?>
								
							<?php else : ?>

								<h2><?php esc_html_e('No Posts Found', 'clotya') ?></h2>

							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
		
	</div>
</div>

<?php get_footer(); ?>