<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: mvx_before_main_content.
 *
 */

do_action( 'mvx_before_main_content' );

global $mvx;

?>

<div class="page-content vendor-store">
	<div class="container">

		<div class="row content-wrapper sidebar-left">
			<div class="col col-12 col-lg-9 content-primary">
	
				<header class="woocommerce-products-header">
					<?php if ( apply_filters( 'mvx_show_page_title', true ) ) : ?>
						<div class="woocommerce-products-header__title page-title"><?php is_tax($mvx->taxonomy->taxonomy_name) ? woocommerce_page_title() : print(get_user_meta( mvx_find_shop_page_vendor(), '_vendor_page_title', true )); ?></div>
					<?php endif; ?>

					<?php
					/**
					 * Hook: mvx_archive_description.
					 *
					 */
					do_action( 'mvx_archive_description' );
					?>
				</header>
				<?php

				/**
				 * Hook: mvx_store_tab_contents.
				 *
				 * Output mvx store widget
				 */

				do_action( 'mvx_store_tab_widget_contents' );
				
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
		
	</div>
</div>


<?php

	/**
	 * Hook: mvx_after_main_content.
	 *
	 */
	do_action( 'mvx_after_main_content' );

/**
 * Hook: mvx_sidebar.
 *
 */
// deprecated since version 3.0.0 with no alternative available
// do_action( 'mvx_sidebar' );

get_footer( 'shop' );