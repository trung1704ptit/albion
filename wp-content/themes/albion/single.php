<?php
/**
 * The template for displaying all single posts
 * @package Albion
 */

get_header();

if ( isset($albion_opt['blog-layout']) && $albion_opt['blog-layout'] == 1 ) {
    $blogimg_size = "albion_single_thumb";
}elseif ( isset($albion_opt['blog-layout']) && $albion_opt['blog-layout'] == 2 ) {
    $blogimg_size = "albion_single_thumb";
}else {
    $blogimg_size = "full";
}

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

if( albion_hide_page_banner() == 1 ) { }else { ?>
	<div class="page-title-area item-bg1" <?php if(isset($albion_opt['single_blog_bg']['url']) && $albion_opt['single_blog_bg']['url']!='') { ?> style="background-image: url( <?php echo esc_url($albion_opt['single_blog_bg']['url']); ?> );" <?php  } ?>>
		<div class="container">
			<div class="page-title-content <?php echo esc_attr($alignment); ?>">
				<h2><?php the_title(); ?></h2>

				<?php
            	if(albion_breadcumb() != 1){ ?>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'albion')?></a></li>
						<li><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php esc_html_e('blog', 'albion') ?></a></li>
						<li>
							<?php 
							$title = the_title('','',false);
							if (!empty($title)) { 
								the_title();
							}else{
								esc_html_e('No Title ', 'albion');
							}
							?>
						</li>
					</ul><?php
            	} ?>
			</div>
		</div>
	</div>
<?php
} ?>

<!-- Start Blog Area -->
<div class="blog-details-area ptb-110 <?php echo esc_attr($page_spac); ?>"> 
	<div class="container">
		<div class="row"> <?php
			while ( have_posts() ) : the_post(); ?>
			<div class="<?php if ( is_active_sidebar( 'article-sidebar' ) && isset($albion_opt['blog-layout']) && $albion_opt['blog-layout'] == 1 ) { echo esc_attr('col-lg-8');} elseif(isset($albion_opt['blog-layout']) && $albion_opt['blog-layout'] == 3) { echo esc_attr('col-lg-12 col-md-12');} elseif(isset($albion_opt['blog-layout']) && $albion_opt['blog-layout'] == 2){ echo esc_attr('col-lg-8 offset-lg-2');} else{ echo esc_attr('col-lg-8');} ?>">
				<div class="blog-details">
					<?php
					if ( has_post_format( 'video' )) { ?>
						<?php if (has_post_thumbnail()) { ?>
							<div class="single-blog-video">
								<img src="<?php the_post_thumbnail_url($blogimg_size) ?>" alt="<?php echo esc_attr__('blog image', 'albion')?>">
								<?php if ((class_exists( 'ACF' )) ) { 
								$link = get_field( 'video_link' ); ?>
								<a href="<?php echo esc_url($link); ?>" class="play-link popup-youtube">
									<i class="fa fa-play"></i>
								</a>
								<?php 
								} ?>
							</div>
						<?php
						}
					} ?>

					<?php 
					$post_format =  get_post_format() ;
					if ($post_format != 'video') {
						if(has_post_thumbnail()) { ?>
							<div class="article-img">
								<img src="<?php the_post_thumbnail_url($blogimg_size) ?>" alt="<?php echo esc_attr__('blog image', 'albion')?>">
							</div> <?php 
						} 
					} ?>

					<div class="blog-details-content">
						<ul class="entry-meta">
							<li>
								<span><?php esc_html_e('Posted On:', 'albion'); ?></span>
								<?php echo esc_html(get_the_date('F d, Y')) ?> 
							</li>
							<li> <?php albion_posted_by(); ?> </li>
						</ul>

						<?php the_content(); 
						
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'albion' ),
							'after'  => '</div>',
						) );
						?>

						<?php if ( get_the_tags() ) {  ?>
						<ul class="category">
							<li><span class="icon-book"><i class="fas fa-bookmark"></i></span></li>
							<?php $tags = get_the_tags();
							foreach ($tags as $tag ) {  ?>
								<li><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
									<?php echo esc_html($tag->name) ?><span class="seperator"><?php echo esc_html(','); ?></span></a>
								</li>
								
							<?php
							} ?>
						</ul>
						<?php } ?>
					</div>
				</div>
			
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
			</div> <?php 
			endwhile; // End of the loop.

			// Sidebar
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

