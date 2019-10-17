<?php
//DECLARE WIDGETS HERE
function wbwbeer_widgets_init() {
    register_sidebar( array(
        'name'          => 'New Release Widget Area',
        'id'            => 'wbwbeer_new',
        'before_widget' => '<div">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wbwbeer_widgets_init' );
