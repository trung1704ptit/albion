<?php
/**
 * The sidebar containing the main widget area
 */

if ( ! is_active_sidebar( 'article-sidebar' ) ) {
	return;
}
?>
<div class="col-lg-4 col-md-12">
	<div id="secondary" class="title blog-sidebar widget-area article-sidebar">
        <?php dynamic_sidebar( 'article-sidebar' ); ?>
	</div>
</div>
