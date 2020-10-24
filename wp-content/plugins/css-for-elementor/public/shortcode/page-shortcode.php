<?php

add_action('init','modern_browser');
add_shortcode('modern', 'modern_browser');
/**
 * Shortcode to display a CMB2 form for a post ID.
 * @param array $atts Shortcode attributes
 * @return string       Form HTML markup
 */
function modern_browser($atts = array(), $content = null)
{

    ob_start();
        ?>
        <h3 class="bro-title"><?php echo esc_attr(get_option('modern_title'));?></h3>
        <p class="bro-content"><?php echo esc_attr(get_option('modern_content'));?></p>

        <div class="browser-d-btn">
            <a class="chorom" href="https://www.google.com/chrome/"><img src="<?php _e( plugin_dir_url( __FILE__ ) . '../img/chrome-logo.svg' ); ?>" alt="">Chrome</a>
            <a class="edge" href="https://www.microsoft.com/en-us/edge"><img src="<?php _e( plugin_dir_url( __FILE__ ) . '../img/logo.svg' ); ?>" alt="">Edge</a> <br>
            <a class="opera" href="https://www.opera.com/"><img src="<?php _e( plugin_dir_url( __FILE__ ) . '../img/technology.svg' ); ?>" alt="">Opera</a>
            <a class="mozilla" href="https://www.mozilla.org/en-US/firefox/new/"><img src="<?php _e( plugin_dir_url( __FILE__ ) . '../img/brands-and-logotypes (2).svg' ); ?>" alt="">Firefox</a>
        </div>
        
        <?php

    return ob_get_clean();
}