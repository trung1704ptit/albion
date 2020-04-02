<?php
// Register widget area.
function albion_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'albion' ),
		'id'            => 'article-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'albion' ),
		'before_widget' => '<div id="%1$s" class="sidebar widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'albion' ),
		'id'            => 'footer-two',
		'description'   => esc_html__( 'Add widgets here.', 'albion' ),
		'before_widget' => '<div class="single-footer-widget footer-wid widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-wid-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'albion' ),
		'id'            => 'footer-three',
		'description'   => esc_html__( 'Add widgets here.', 'albion' ),
		'before_widget' => '<div class="single-footer-widget footer-wid widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-wid-title">',
		'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
		'name'          => esc_html__( 'Footer Four', 'albion' ),
		'id'            => 'footer-four',
		'description'   => esc_html__( 'Add widgets here.', 'albion' ),
		'before_widget' => '<div class="single-footer-widget footer-wid widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-wid-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'albion_widgets_init' );