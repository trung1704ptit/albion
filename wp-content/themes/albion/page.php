<?php
/**
 * The template for displaying all pages
 * @package Albion
 */

get_header();

// After Hiding Banner add spacing
if(albion_hide_page_banner() == 1 || albion_hide_page_banner_acf() == 'yes' ){
    $page_spac = "mt-80";
} else {
    $page_spac = "";
}

// Page Banner Alignment Class Generate
if(albion_page_banner_alignment() == 2 ){
    $alignment = "text-center";
} elseif(albion_page_banner_alignment() == 3) {
    $alignment = "text-right";
} else {
	$alignment = "text-left";
}

//Page Banner Area
if( albion_hide_page_banner() == 1 ){
	if( function_exists('acf_add_options_page') && get_field('page_banner_hide') ) {} 
} 
elseif( albion_hide_page_banner() != 1 && albion_hide_page_banner_acf() == 'yes' ){ 
	{} 
} 
else { ?>
	<div class="page-title-area item-bg1" <?php if(isset($albion_opt['page_bg']['url']) && $albion_opt['page_bg']['url']!='') { ?> style="background-image: url( <?php echo esc_url($albion_opt['page_bg']['url']); ?> );" <?php  } ?>>
		<div class="container">
			<div class="page-title-content <?php echo esc_attr($alignment); ?>">
				<h2><?php the_title(); ?></h2>
				<?php
				if(albion_breadcumb() != 1){ ?>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'albion')?></a></li>
						<li><?php the_title(); ?></li>
					</ul><?php
				} ?>
			</div>
		</div>
		<div class="lines">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
		</div>
	</div>
<?php
}

if (!albion_is_elementor()) { ?>
	<div class="page-main-content  <?php echo esc_attr($page_spac); ?>">
<?php } ?>
	<!-- Start About Area -->
	<div class="page-area <?php echo esc_attr($page_spac); ?>">
		<?php if (!albion_is_elementor()) { ?><div class="container"><?php } ?>
			<?php
			while ( have_posts() ) :
				the_post();

				//No Content
				$thecontent = get_the_content();
				if(empty($thecontent)){  ?><div class="albion-single-blank-page"> </div><?php }

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		<?php if (!albion_is_elementor()) { ?></div><?php } ?>
	</div>
<?php
//Normal Page Editor
if (!albion_is_elementor()) { ?>
</div> <?php } 

get_footer();
