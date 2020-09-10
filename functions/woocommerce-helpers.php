<?php 
// Sportsball Coupon Code Restrictions
add_filter( 'woocommerce_coupon_is_valid', 'coupon_week_days_check', 10, 2);
function coupon_week_days_check( $valid, $coupon ) {

    // Set HERE your coupon slug   <===  <===  <===  <===  <===  <===  <===  <===  <===  <===  
    $coupon_code_wd = 'sportsball';
    // Set HERE your defined invalid days (others: 'Mon', 'Tue', 'Wed' and 'Thu')  <===  <===
    $invalid_days = array('Tue', 'Wed', 'Thu', 'Fri', 'Sat');

    $now_day = date ( 'D' ); // Now day in short format

    // WooCommerce version compatibility
    if ( version_compare( WC_VERSION, '3.0', '<' ) ) {
        $coupon_code = strtolower($coupon->code); // Older than 3.0
    } else {
        $coupon_code = strtolower($coupon->get_code()); // 3.0+
    }

    if( $coupon_code_wd == $coupon_code && intval($err_code) === WC_COUPON::E_WC_COUPON_INVALID_FILTERED && in_array($now_day, $invalid_days) ) {
        $err = __( "Coupon $coupon_code_wd only works on Sunday and Monday", "woocommerce" );
    }
    return $err;
}
