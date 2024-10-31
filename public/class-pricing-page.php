<?php

function pricewell_pricing_page($atts = array()) {
    // normalize attribute keys, lowercase
    $atts = array_change_key_case( (array) $atts, CASE_LOWER );
    
    extract(shortcode_atts(
        array(
            'page_id' => '',
        ), $atts, $tag
    ));
    
    if ($page_id === null || trim($page_id) === '') {
        print('<strong>PriceWell Error:</strong> page_id is required.');
    }

    print('<div id="pricewell-'.esc_html($page_id).'"></div><script src="https://snippet.pricewell.io/'.$page_id.'/pricewell.js" async></script>');
}

add_shortcode('pricewell_pricing_page', 'pricewell_pricing_page');

?>