<?php
/**
* Plugin Name: Growing Zone Finder
* Description: Widget for finding growing zone by zip code.
* Version: 1.0
* Author: chimento
* Author URI: https://chimen.to
* Text Domain: growing-zone-finder
*
* @package           Chimento_Growing_Zone_Finder
*/

function showWidget() {

return "<div id='zone-finder' class='container-sm text-center p-3 mt-3'>"
    .   "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' rel='stylesheet'
    integrity='ha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl' crossorigin='anonymous'>"
    .   "<link rel='stylesheet' href='" . plugin_dir_url( __FILE__ ) . "app.css'></script>"
    .   "<img src='" . plugin_dir_url( __FILE__ ) . "logo_half.png'></script>"
    .   "<h1>Growing Zone Finder</h1>"
    .   "<h6 class='text-muted mb-3'>Enter your zip code to find information about your growing zone</h6>"
    .   "<div class='mb-3'>"
        . "<input type='text' placeholder='Enter Your Zip Code...' id='zipcode' class='form-control text-center' />"
    .   "</div>"
    .   "<div class='d-flex flex-column' id='results-container' >"
    .   "</div>"
    .   "<script src='" . plugin_dir_url( __FILE__ ) . "app.js'></script>"
    . "</div>";

}

add_shortcode('growing-zone-finder', 'showWidget');
?>