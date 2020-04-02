<?php global $albion_opt;
/**
 * The main template file
 * @package Albion
 */

get_header(); ?>
<?php
// Page Banner Alignment Class Generate
if(albion_page_banner_alignment() == 2 ){
    $alignment = "text-center";
} elseif(albion_page_banner_alignment() == 3) {
    $alignment = "text-right";
} else {
	$alignment = "text-left";
}

// After Hiding Banner add spacing
if( albion_hide_page_banner() == 1 ){
    $page_spac = "mt-80";
} else {
    $page_spac = "";
}

if( albion_hide_page_banner() == 1 ) { }else { ?>
	<div class="page-title-area item-bg1"  <?php if(isset($albion_opt['blog_bg']['url']) && $albion_opt['blog_bg']['url']!='') { ?> style="background-image: url( <?php echo esc_url($albion_opt['blog_bg']['url']); ?> );" <?php  } ?>>
		<div class="container">
			<div class="page-title-content <?php echo esc_attr($alignment); ?>">
				<h2><?php the_archive_title(); ?></h2>
            	<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
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
<!-- Start Blog Area -->
<div class="blog-area ptb-110 <?php echo esc_attr($page_spac); ?>">
    <div class="container">
        <div class="row">
            <!-- Start Blog Content -->
            <div class="<?php if ( is_active_sidebar( 'article-sidebar' ) && isset($albion_opt['blog-layout']) && $albion_opt['blog-layout'] == 1 ) { echo esc_attr('col-lg-8');} elseif(isset($albion_opt['blog-layout']) && $albion_opt['blog-layout'] == 3) { echo esc_attr('col-lg-12 col-md-12');} elseif(isset($albion_opt['blog-layout']) && $albion_opt['blog-layout'] == 2){ echo esc_attr('col-lg-8 offset-lg-2');} else{ echo esc_attr('col-lg-8');} ?>">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/post-formats/content',get_post_format());
                    endwhile;
                else :
                    get_template_part( 'template-parts/content', 'none' );
                endif;
                ?>
        
                <!-- Stat Pagination -->
                <div class="pagination-area">
                    <nav aria-label="navigation">
                    <?php echo paginate_links( array(
                        'format' => '?paged=%#%',
                        'prev_text' => '<i class="fa fa-angle-double-left"></i>',
                        'next_text' => '<i class="fa fa-angle-double-right"></i>',
                        )
                    ) ?>
                    </nav>
                </div>
            </div>
            <!-- End Blog Content -->
            <?php
            if ( is_active_sidebar( 'article-sidebar' ) && isset($albion_opt['blog-layout']) ){
                if(isset($albion_opt['blog-layout']) && $albion_opt['blog-layout'] != 1 ) {

                } else {
                    get_sidebar(); 
                }
            } else {
                get_sidebar(); 
            } ?>
        </div>   
    </div>
</div>
<!-- End Blog Area -->
<?php
get_footer();
