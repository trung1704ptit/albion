<?php global $albion_opt;
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Albion
 */

get_header();

if ( isset($albion_opt['content_not_found']) && $albion_opt['content_not_found'] != '' ) {
	$title = $albion_opt['content_not_found']; 
	$content = $albion_opt['long_content_not_found']; 
	$button = $albion_opt['button_not_found']; 
?>

<div class="error-area">
	<div class="d-table">
		<div class="d-table-cell">
			<div class="container">
				<div class="error-content">
					<?php if( $albion_opt['img-404']['url']!='' ) { ?>
						<img src="<?php echo esc_url($albion_opt['img-404']['url'] ); ?>">
					<?php } ?>
					<h3><?php echo esc_html( $title ); ?></h3>
					<p><?php echo esc_html( $content ); ?></p>
					<?php if( !$button == '' ) {?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php echo esc_html( $button ); ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
}else { ?>
	<div class="error-area">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="error-content">
						<img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/404.png') ?>" alt="<?php echo esc_attr__('Error','albion')?>">
						<h3><?php echo esc_html__('Page not found','albion')?></h3>
						<p><?php echo esc_html__('The page you are looking for might have been removed had its name changed or is temporarily unavailable.','albion')?></p>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php echo esc_html__('Go to Home', 'albion'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
get_footer();
