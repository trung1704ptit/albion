<?php global $albion_opt;
/**
 * Single project Page
 * @package albion
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
    <div class="page-title-area item-bg2" <?php if(isset($albion_opt['project_bg']['url']) && $albion_opt['project_bg']['url']!='') { ?> style="background-image: url( <?php echo esc_url($albion_opt['project_bg']['url']); ?> );" <?php  } ?>>
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

<!-- Start project Details Area -->
<div class="projects-details-area ptb-110 <?php echo esc_attr($page_spac); ?>">
    <div class="container">
        <div class="projects-details">
            <?php
            while ( have_posts() ) :
            the_post(); ?>

            <div class="row">
                <?php 
                $images = get_field('projects_images');
                if( $images ): ?>
                    <?php foreach( $images as $image ): ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="projects-details-image">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr__('project image', 'albion')?>">
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="projects-details-info">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <?php
                                if (class_exists( 'ACF') && get_field('information_list')){
                                    if( have_rows('information_list') ): ?>
                                        <ul>
                                            <?php while( have_rows('information_list') ): the_row(); ?>
                                                <?php
                                                if(get_sub_field('is_link') == true){ ?>
                                                    <li>
                                                        <span><?php echo esc_html( get_sub_field('title') ); ?></span>

                                                        <a href="<?php echo esc_url( get_sub_field('link_url') ); ?>">
                                                            <?php echo esc_html( get_sub_field('title_value') ); ?>
                                                        </a>
                                                    </li>

                                                    <?php
                                                } else { ?>
                                                    <li><span><?php echo esc_html( get_sub_field('title') ); ?></span> <p><?php echo esc_html( get_sub_field('title_value') ); ?></p></li> <?php
                                                } ?>
                                            <?php endwhile; ?>
                                        </ul>
                                <?php endif;
                                } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
            <div class="projects-details-desc">
                <?php the_content(); ?>
            </div>

            <?php
            endwhile; // End of the loop.
            ?>
        </div>
    </div>
</div>
<!-- End project Details Area -->

<?php
get_footer();
