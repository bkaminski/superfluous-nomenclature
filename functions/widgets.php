<?php
//DECLARE WIDGETS HERE
function wbwbeer_widgets_init() {
    register_sidebar( array(
        'name'          => 'Easily Enjoyed Text Widget Area',
        'id'            => 'wbwbeer_enjoyed',
        'before_widget' => '<div class="easily-enjoyed">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wbwbeer_widgets_init' );
