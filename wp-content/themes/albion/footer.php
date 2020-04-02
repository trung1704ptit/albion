<?php global $albion_opt;
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Albion
 */
	// White Logo
	if(isset($albion_opt['white_logo']['url']) && $albion_opt['white_logo']['url'] !='' ) {
		$white_logo = $albion_opt['white_logo']['url'];
	}else {
		$white_logo = "null";
	} 
	// Map Image
	if(isset($albion_opt['map_img']['url']) && $albion_opt['map_img']['url'] !='' ) {
		$map_img = $albion_opt['map_img']['url'];
	}else {
		$map_img = "null";
	}?>

	<?php 
	// Footer Widget
	if(!is_active_sidebar( 'footer-two' ) && !is_active_sidebar( 'footer-three' ) && !is_active_sidebar( 'footer-four' )) {
		$footer_widget = 'yes';
	} else { 
		$footer_widget = 'no';
	} 
	
	// Footer Class
	$footer_no_padding = 'footer-no-padding';
	$footer_no_margin = 'footer-no-margin';
	
	?>
	<!-- Start Footer Area -->
	<?php if ( !is_404()){ ?>
	<footer class="footer-area <?php if( $footer_widget == 'yes' ){ echo esc_attr( $footer_no_padding ); } ?>">
		
		<?php if($footer_widget == 'no'){ ?>
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<div class="logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<?php
									// White Logo
									if ( $white_logo != 'null' ) { ?>
										<img src="<?php echo esc_url($white_logo); ?>" alt="<?php bloginfo( 'title' ); ?>"><?php
									} else { ?>
										<h2><?php bloginfo( 'name' ); ?></h2> <?php  
									} ?>
								</a>
								
								<?php 
								if(isset($albion_opt['footer-social-text']) && $albion_opt['footer-social-text'] !='' ) { ?>
									<p> <?php echo esc_html($albion_opt['footer-social-text']); ?> </p> <?php
								} ?>
							</div>

							<?php get_template_part('inc/social-link', 'social-link'); ?>

						</div>
					</div>

					<?php if ( is_active_sidebar( 'footer-two' ) ) { ?>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<?php dynamic_sidebar('footer-two'); ?>
					</div> <?php 
					} ?>

					<?php if ( is_active_sidebar( 'footer-three' ) ) { ?>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<?php dynamic_sidebar('footer-three'); ?>
					</div> <?php 
					} ?>

					<?php if ( is_active_sidebar( 'footer-four' ) ) { ?>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<?php dynamic_sidebar('footer-four'); ?>
					</div> <?php 
					} ?>
				</div>
			</div> 
		<?php } ?>

		<div class="copyright-area <?php if( $footer_widget == 'yes' ){ echo esc_attr( $footer_no_margin ); } ?>">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-md-6 col-sm-6">
						<p>
						<?php if(isset($albion_opt['footer-copyright-text']) && $albion_opt['footer-copyright-text'] !='') { 
							echo wp_kses_post($albion_opt['footer-copyright-text']) ;
						} else {
							echo esc_html__('© Copyright 2019 All Rights Reserved.','albion') ;
						} ?>
						</p>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6">
						<?php
						if(has_nav_menu('footer-bottom-menu')){
							wp_nav_menu( array(
								'theme_location'  => 'footer-bottom-menu',
								'depth'           => 1,
								'fallback_cb'     => false,
								'menu_id'         => 'footer-bottom-menu-one',
							) );
						} ?>
					</div>
				</div>
			</div>
		</div>

		<?php if (isset($albion_opt['show_mapimage']) && $albion_opt['show_mapimage'] == '1') { 
			if($map_img !='null') { ?>
				<div class="circle-map <?php if( $footer_widget == 'yes' ){ echo esc_attr__('footer-map-none', 'albion'); } ?>"><img src="<?php echo esc_url($map_img); ?>" alt="<?php bloginfo( 'title' ); ?>"></div><?php
			}
		} ?>

		<div class="lines">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
		</div>
	</footer>
	<?php } ?>
	<!-- End Footer Area -->

	<div class="go-top"><i class="fas fa-arrow-up"></i><i class="fas fa-arrow-up"></i></div>
	<?php wp_footer(); ?>

	</body>
</html>