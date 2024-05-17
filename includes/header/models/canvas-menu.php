<?php
if ( ! function_exists( 'clotya_canvas_menu' ) ) {
	function clotya_canvas_menu(){
	?>

	<aside class="site-offcanvas">
		<div class="site-scroll">
			<div class="site-offcanvas-header">
				<div class="site-brand">
					<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
						<?php if (get_theme_mod( 'clotya_logo' )) { ?>
							<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'clotya_logo' )) ); ?>" alt="<?php bloginfo("name"); ?>">
						<?php } elseif (get_theme_mod( 'clotya_logo_text' )) { ?>
							<span class="brand-text"><?php echo esc_html(get_theme_mod( 'clotya_logo_text' )); ?></span>
						<?php } else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo("name"); ?>">
						<?php } ?>
					</a>
				</div><!-- site-brand -->
				<div class="offcanvas-close"><i class="klbth-icon-cancel"></i></div>
			</div><!-- site-offcanvas-header -->
			<div class="site-offcanvas-body">
				<span class="offcanvas-heading"><?php esc_html_e('Main Menu','clotya'); ?></span>
				<nav class="site-nav vertical">
					<?php 
					wp_nav_menu(array(
					'theme_location' => 'main-menu',
					'container' => '',
					'fallback_cb' => 'show_top_menu',
					'menu_id' => '',
					'menu_class' => 'menu',
					'echo' => true,
					"walker" => '',
					'depth' => 0 
					));
					?>
				</nav><!-- site-nav -->

				<?php $sidebarmenu = get_theme_mod('clotya_header_sidebar','0'); ?>
				<?php if($sidebarmenu == '1'){ ?>
					<span class="offcanvas-heading"><?php esc_html_e('Categories', 'clotya'); ?></span>
					<nav class="site-nav vertical categories">
						<?php
						wp_nav_menu(array(
						'theme_location' => 'sidebar-menu',
						'container' => '',
						'fallback_cb' => 'show_top_menu',
						'menu_id' => '',
						'menu_class' => 'menu ',
						'echo' => true,
						"walker" => '',
						'depth' => 0 
						));
						?>
					</nav><!-- site-nav -->
				<?php } ?>
			</div><!-- site-offcanvas-body -->
			<div class="site-offcanvas-footer">
				<div class="site-copyright">
					<?php if(get_theme_mod( 'clotya_copyright' )){ ?>
						<p><?php echo clotya_sanitize_data(get_theme_mod( 'clotya_copyright' )); ?></p>
					<?php } else { ?>
						<p><?php esc_html_e('Copyright 2022.KlbTheme . All rights reserved','clotya'); ?></p>
					<?php } ?>
				</div><!-- site-copyright -->
			</div><!-- site-offcanvas-footer -->
		</div><!-- site-scroll -->
	</aside><!-- site-offcanvas -->

	<?php

	}
}

add_action('wp_footer', 'clotya_canvas_menu');