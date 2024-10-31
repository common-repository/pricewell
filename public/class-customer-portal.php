<?php

function pricewell_customer_portal($atts = array()) {
    // normalize attribute keys, lowercase
    $atts = array_change_key_case( (array) $atts, CASE_LOWER );
    
    extract(shortcode_atts(
        array(
            'portal_id' => '',
        ), $atts, $tag
    ));
    
    if ($portal_id === null || trim($portal_id) === '') {
        print('<strong>PriceWell Error:</strong> portal_id is required.');
    }

    print('<div id="pricewell-customer-portal"  data-id="'.esc_html($portal_id).'" data-mode="test"></div><script src=""></script>');

    wp_enqueue_script('pricewell-customer-portal-js', 'https://snippet.pricewell.io/customer-portal.js', '1.0.0', false);
}

add_shortcode('pricewell_customer_portal', 'pricewell_customer_portal');

?>