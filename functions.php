<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
	// parent css
    $parent_style = 'parent-style'; 
    //wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    // child css
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    // js
    wp_enqueue_script( 'child-script', 
    	get_stylesheet_directory_uri() . '/js/script.js', 
    	array( 'jquery' ),
    	wp_get_theme()->get('Version'),
    	true 
    );
}

add_action( 'widgets_init', 'my_theme_widgets_init' );
function my_theme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'twentynineteen-child' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentynineteen-child' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}


