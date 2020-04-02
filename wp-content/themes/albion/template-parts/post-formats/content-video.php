<?php global $albion_opt;
/**
 * Post Format: Video
 * @package Albion
 */
if ( isset($albion_opt['blog-layout']) && $albion_opt['blog-layout'] == 1 ) {
    $blogimg_size = "albion_single_thumb";
}elseif ( isset($albion_opt['blog-layout']) && $albion_opt['blog-layout'] == 2 ) {
    $blogimg_size = "albion_single_thumb";
}else {
    $blogimg_size = "full";
} ?>

<div <?php post_class(); ?>>
    <div class="single-blog-post">
        <?php if(has_post_thumbnail()) { ?>
            <div class="entry-thumbnail">
                <a href="<?php the_permalink() ?>">
                    <img src="<?php the_post_thumbnail_url($blogimg_size) ?>" alt="<?php echo esc_attr__('blog image', 'albion')?>">
                </a>
            </div>
        <?php } ?>

        <div class="post-content">
            <div class="post_type_icon">
                <i class="fa fa-play-circle p-1"></i>
            </div>
            
            <ul class="entry-meta">
                <li>
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ) ?>">
                        <?php the_author() ?>
                    </a>
                </li>
                <li>
                    <?php echo esc_html(get_the_date('F d, Y')) ?>
                </li>
                <li>
                    <?php comments_number(); ?>
                </li>
            </ul>

            <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>

            <?php the_excerpt() ?>
            
            <a href="<?php the_permalink() ?>" class="learn-more-btn">
                <?php if(isset($albion_opt['post_read_more'] ) && !$albion_opt['post_read_more'] == ''){ echo esc_html($albion_opt['post_read_more']); }else{ echo esc_html__('Read More','albion'); } ?>
                <i class="flaticon-add"></i>
            </a>
        </div>
    </div>
</div>