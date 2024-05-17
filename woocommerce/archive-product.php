<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

// Elementor `archive` location
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) {

	if ( ! clotya_is_pjax() ) {
	    get_header( 'shop' );
	}

	?>

	<?php clotya_do_action( 'clotya_before_main_shop'); ?>

	<div class="page-content">
		<div class="container">

			<?php
				do_action( 'woocommerce_before_main_content' );
			?>
			<header class="woocommerce-products-header">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
				<?php endif; ?>

				<?php
				/**
				 * Hook: woocommerce_archive_description.
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' );
				?>
			</header>
			
			<?php if( get_theme_mod( 'clotya_shop_layout' ) == 'full-width' || clotya_get_option() == 'full-width') { ?>
					<div class="row content-wrapper">
						<div class="col col-12 col-lg-12 content-primary">
						
							<?php get_template_part( 'includes/woocommerce/banner' ); ?>
						
							<?php
							if ( woocommerce_product_loop() ) {

								/**
								 * Hook: woocommerce_before_shop_loop.
								 *
								 * @hooked woocommerce_output_all_notices - 10
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action( 'woocommerce_before_shop_loop' );

								woocommerce_product_loop_start();

								if ( wc_get_loop_prop( 'total' ) ) {
									while ( have_posts() ) {
										the_post();

										/**
										 * Hook: woocommerce_shop_loop.
										 */
										do_action( 'woocommerce_shop_loop' );

										wc_get_template_part( 'content', 'product' );
									}
								}

								woocommerce_product_loop_end();

								do_action( 'woocommerce_after_shop_loop' );
							} else {
								do_action( 'woocommerce_no_products_found' );
							}
							?>
						</div>
						<div id="sidebar" class="col col-12 col-lg-3 shop-sidebar filtered-sidebar sticky hide-desktop">
							<div class="site-scroll">
								<div class="sidebar-inner">
									<div class="sidebar-mobile-header">
										<h3 class="entry-title"><?php esc_html_e('Filter Products','clotya'); ?></h3>

										<div class="close-sidebar">
											<i class="klbth-icon-cancel"></i>
										</div><!-- close-sidebar -->
									</div><!-- sidebar-mobile-header -->

									<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
										<?php dynamic_sidebar( 'shop-sidebar' ); ?>
									<?php } ?>
								</div><!-- sidebar-inner -->
							</div><!-- site-scroll -->
						</div><!-- sidebar -->
					</div>
			<?php } elseif( get_theme_mod( 'clotya_shop_layout' ) == 'right-sidebar' || clotya_get_option() == 'right-sidebar') { ?>
				<div class="row content-wrapper sidebar-right">
					<div class="col col-12 col-lg-9 content-primary">
					
						<?php get_template_part( 'includes/woocommerce/banner' ); ?>
					
						<?php
						if ( woocommerce_product_loop() ) {

							/**
							 * Hook: woocommerce_before_shop_loop.
							 *
							 * @hooked woocommerce_output_all_notices - 10
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );

							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 */
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();

							do_action( 'woocommerce_after_shop_loop' );
						} else {
							do_action( 'woocommerce_no_products_found' );
						}
						?>
					</div>
					<div id="sidebar" class="col col-12 col-lg-3 shop-sidebar filtered-sidebar sticky">
						<div class="site-scroll">
							<div class="sidebar-inner">
								<div class="sidebar-mobile-header">
									<h3 class="entry-title"><?php esc_html_e('Filter Products','clotya'); ?></h3>

									<div class="close-sidebar">
										<i class="klbth-icon-cancel"></i>
									</div><!-- close-sidebar -->
								</div><!-- sidebar-mobile-header -->

								<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
									<?php dynamic_sidebar( 'shop-sidebar' ); ?>
								<?php } ?>
							</div><!-- sidebar-inner -->
						</div><!-- site-scroll -->
					</div><!-- sidebar -->
				</div>
			<?php } else { ?>
				<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
					<div class="row content-wrapper sidebar-left">
						<div class="col col-12 col-lg-9 content-primary">
						
							<?php get_template_part( 'includes/woocommerce/banner' ); ?>
						
							<?php
							if ( woocommerce_product_loop() ) {

								/**
								 * Hook: woocommerce_before_shop_loop.
								 *
								 * @hooked woocommerce_output_all_notices - 10
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action( 'woocommerce_before_shop_loop' );

								woocommerce_product_loop_start();

								if ( wc_get_loop_prop( 'total' ) ) {
									while ( have_posts() ) {
										the_post();

										/**
										 * Hook: woocommerce_shop_loop.
										 */
										do_action( 'woocommerce_shop_loop' );

										wc_get_template_part( 'content', 'product' );
									}
								}

								woocommerce_product_loop_end();

								do_action( 'woocommerce_after_shop_loop' );
							} else {
								do_action( 'woocommerce_no_products_found' );
							}
							?>
						</div>
						<div id="sidebar" class="col col-12 col-lg-3 shop-sidebar filtered-sidebar sticky">
							<div class="site-scroll">
								<div class="sidebar-inner">
									<div class="sidebar-mobile-header">
										<h3 class="entry-title"><?php esc_html_e('Filter Products','clotya'); ?></h3>

										<div class="close-sidebar">
											<i class="klbth-icon-cancel"></i>
										</div><!-- close-sidebar -->
									</div><!-- sidebar-mobile-header -->

									<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
										<?php dynamic_sidebar( 'shop-sidebar' ); ?>
									<?php } ?>
								</div><!-- sidebar-inner -->
							</div><!-- site-scroll -->
						</div><!-- sidebar -->
					</div>
				<?php } else { ?>
					<div class="row content-wrapper">
						<div class="col col-12 col-lg-12 content-primary">
						
							<?php get_template_part( 'includes/woocommerce/banner' ); ?>
						
							<?php
							if ( woocommerce_product_loop() ) {

								/**
								 * Hook: woocommerce_before_shop_loop.
								 *
								 * @hooked woocommerce_output_all_notices - 10
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action( 'woocommerce_before_shop_loop' );

								woocommerce_product_loop_start();

								if ( wc_get_loop_prop( 'total' ) ) {
									while ( have_posts() ) {
										the_post();

										/**
										 * Hook: woocommerce_shop_loop.
										 */
										do_action( 'woocommerce_shop_loop' );

										wc_get_template_part( 'content', 'product' );
									}
								}

								woocommerce_product_loop_end();

								do_action( 'woocommerce_after_shop_loop' );
							} else {
								do_action( 'woocommerce_no_products_found' );
							}
							?>
						</div>
						<div id="sidebar" class="col col-12 col-lg-3 shop-sidebar filtered-sidebar sticky hide-desktop">
							<div class="site-scroll">
								<div class="sidebar-inner">
									<div class="sidebar-mobile-header">
										<h3 class="entry-title"><?php esc_html_e('Filter Products','clotya'); ?></h3>

										<div class="close-sidebar">
											<i class="klbth-icon-cancel"></i>
										</div><!-- close-sidebar -->
									</div><!-- sidebar-mobile-header -->

									<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
										<?php dynamic_sidebar( 'shop-sidebar' ); ?>
									<?php } ?>
								</div><!-- sidebar-inner -->
							</div><!-- site-scroll -->
						</div><!-- sidebar -->
					</div>
				<?php } ?>
			<?php } ?>
			
			<?php

			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
			?>
		</div>
	</div>
	
	<?php clotya_do_action( 'clotya_after_main_shop'); ?>
	
	<?php 

			if ( ! clotya_is_pjax() ) {
				get_footer( 'shop' );
			}
	}
