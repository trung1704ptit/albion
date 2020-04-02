<?php global $albion_opt;
/**
 * The header for our theme
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Albion
 */

?>
<!doctype html>
<?php if( albion_rtl() == true ): ?>
	<html dir="rtl" <?php language_attributes(); ?>>
<?php else: ?>
	<html <?php language_attributes(); ?>>
<?php endif; ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Start Preloader Area -->
	<?php if (isset($albion_opt['enable_preloader']) && $albion_opt['enable_preloader'] == '1') { ?>
		<div class="preloader">
			<div class="loader">
				<div class="loader-outter"></div>
				<div class="loader-inner"></div>
			</div>
		</div>
	<?php } ?>
	<!-- End Preloader Area -->

	<?php
	// Choose Navbar Style
	if (class_exists('ACF')) {
		if( get_field('choose_navigation_style') == 1 ) {
			$style_cls = "navbar-area";
			$container_cls = "container-fluid";
			$nav_style = 1;

		} elseif( get_field('choose_navigation_style') == 3 ) {
			$style_cls = "navbar-area navbar-style-four";
			$container_cls = "container-fluid";
			$nav_style = 3;

		} elseif( get_field('choose_navigation_style') == 4 ) {
			$style_cls = "navbar-area navbar-style-three";
			$container_cls = "container";
			$nav_style = 4;

		} else {
			$style_cls = "navbar-area navbar-style-two";
			$container_cls = "container";
			$nav_style = 2;
		}
	} else {
		$style_cls = "navbar-area navbar-style-two";
		$container_cls = "container";
		$nav_style = 2;
	} ?>

	<?php
	// White Logo
	if(isset($albion_opt['white_logo']['url']) && $albion_opt['white_logo']['url'] !='' ) {
		$white_logo = $albion_opt['white_logo']['url'];
	}else {
		$white_logo = "null";
	}

	// Sticky Black Logo
	if(isset($albion_opt['black_logo']['url']) && $albion_opt['black_logo']['url'] !='' ) {
		$black_logo = $albion_opt['black_logo']['url'];
	}else {
		$black_logo = "null";
	} 

	// After Hiding Banner add navbar class
	if(albion_hide_page_banner() == 1 || albion_hide_page_banner_acf() == 'yes'){
		$nav_cls = " navbar-bg";
	} else {
		$nav_cls = "";
	} 
	
	// WP admin bar
	$hide_wp_nav = 'hide-wp-nav'; ?>

	<!-- Start Navbar Area -->
	<?php if ( !is_404()){ ?>
	<div class="<?php echo esc_attr($style_cls); ?><?php if(!is_front_page()){echo esc_attr($nav_cls);} ?>">
		<div class="sparsity-responsive-nav <?php if ( is_user_logged_in() ) {echo esc_attr( $hide_wp_nav );}?>">
			<div class="container">
				<div class="sparsity-responsive-menu">
					<div class="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php if( $nav_style == 1 || $nav_style == 2 ) { 
								// White Logo
								if ( $white_logo != 'null' ) { ?>
									<img src="<?php echo esc_url($white_logo); ?>" class="main-logo" alt="<?php bloginfo( 'title' ); ?>"><?php
								} else { ?>
									<h2 class="main-title"><?php bloginfo( 'name' ); ?></h2>
								<?php }  

								// Black Logo
								if ( $black_logo != 'null' ) { ?>
									<img src="<?php echo esc_url($black_logo); ?>" class="optional-logo" alt="<?php bloginfo( 'title' ); ?>"><?php
								} else { ?>
									<h2 class="optional-title"><?php bloginfo( 'name' ); ?></h2>
								<?php }  
							} elseif( $nav_style == 3 || $nav_style == 4 ) {
								// Black Logo
								if ( $black_logo != 'null' ) { ?>
									<img src="<?php echo esc_url($black_logo); ?>" class="optional-logo" alt="<?php bloginfo( 'title' ); ?>"><?php
								} else { ?>
									<h2 class="optional-title"><?php bloginfo( 'name' ); ?></h2>
								<?php }
							} ?>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="sparsity-nav <?php if ( is_user_logged_in() ) {echo esc_attr( $hide_wp_nav );}?>">
			<div class="<?php echo esc_attr($container_cls); ?>">
				<nav class="navbar navbar-expand-md navbar-light">
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if( $nav_style == 1 || $nav_style == 2 ) { 
							// White Logo
							if ( $white_logo != 'null' ) { ?>
								<img src="<?php echo esc_url($white_logo); ?>" class="main-logo" alt="<?php bloginfo( 'title' ); ?>"><?php
							} else { ?>
								<h2 class="main-title"><?php bloginfo( 'name' ); ?></h2> <?php  
							} 

							// Black Logo
							if ( $black_logo != 'null' ) { ?>
								<img src="<?php echo esc_url($black_logo); ?>" class="optional-logo" alt="<?php bloginfo( 'title' ); ?>"><?php
							} else { ?>
								<h2 class="optional-title"><?php bloginfo( 'name' ); ?></h2><?php 
							}  
						} elseif( $nav_style == 3 || $nav_style == 4 ) {
							// Black Logo
							if ( $black_logo != 'null' ) { ?>
								<img src="<?php echo esc_url($black_logo); ?>" class="main-logo" alt="<?php bloginfo( 'title' ); ?>"><?php
							} else { ?>
								<h2 class="optional-title"><?php bloginfo( 'name' ); ?></h2>
							<?php }
						} ?>
					</a>

					<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
						<?php 
						if(has_nav_menu('header')){
							wp_nav_menu( array(
								'theme_location'  => 'header',
								'depth'           => 3,
								'container'       => 'div',
								'menu_class'      => 'navbar-nav',
								'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
								'walker'          => new Albion_Bootstrap_Navwalker()
							) );
						} ?>

						<?php
						if( (isset($albion_opt['enable_header_btn']) && $albion_opt['enable_header_btn'] != 0) || (isset($albion_opt['enable_search']) && $albion_opt['enable_search'] != 0)  ){
							$head_btn = $albion_opt['enable_header_btn'];
							$link	  = $albion_opt['btn_link']; ?>

							<div class="others-options"> <?php

								if($albion_opt['enable_search'] == true) { ?>
								<div class="option-item"><i class="search-btn flaticon-search"></i>
									<i class="close-btn fas fa-times"></i>
									
									<div class="search-overlay search-popup">
										<div class='search-box'>
											<form role="search" method="get" id="searchform"
												class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
													<input type="text" class="search-input" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Search','albion'); ?>" required />
													<button type="submit" id="searchsubmit" class="search-button"><i class="fas fa-search"></i></button>
											</form>
										</div>
									</div>
								</div> <?php 
								} 
								if($head_btn == true) { ?>
								<a href="<?php echo esc_url($link); ?>" class="btn btn-primary"><?php echo esc_html($albion_opt['header_btn_text']); ?></a>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- End Navbar Area -->
