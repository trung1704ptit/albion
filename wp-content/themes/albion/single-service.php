<?php global $albion_opt;
/**
 * Single Service Page
 * @package Albion
 */

get_header();

// After Hiding Banner add spacing
if(albion_hide_page_banner() == 1 ){
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
if(albion_hide_page_banner() == 1 ) {} else { ?>
    <div class="page-title-area item-bg2" <?php if(isset($albion_opt['service_bg']['url']) && $albion_opt['service_bg']['url']!='') { ?> style="background-image: url( <?php echo esc_url($albion_opt['service_bg']['url']); ?> );" <?php  } ?>>
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
} ?>

<!-- Start Research Details Area -->
<div class="services-details-area ptb-110 <?php echo esc_attr($page_spac); ?>">
    <div class="container">
        <?php
        while ( have_posts() ) :
        the_post(); ?>

        <?php echo the_content(); ?> 

        <?php
        endwhile; // End of the loop.
        ?>
    </div>
</div>
<!-- End Research Details Area -->

<?php
get_footer();
