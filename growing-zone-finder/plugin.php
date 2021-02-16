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

return "<div id='zone-finder'>"
    .       "<link rel='stylesheet' href='" . plugin_dir_url( __FILE__ ) . "app.css'></script>"
    .       "<img src='" . plugin_dir_url( __FILE__ ) . "logo_half.png'></script>"
    .       "<h1>Growing Zone Finder</h1>"
    .       "<h6>Enter your zip code to find information about your growing zone</h6>"
    .       "<div class='form-group'>"
    .           "<input type='text' placeholder='Enter Your Zip Code...' id='zipcode' />"
    .       "</div>"
    .       "<div id='results-container' ></div>"
    .       "<script src='" . plugin_dir_url( __FILE__ ) . "app.js'></script>"
    . "</div>";

}

add_shortcode('growing-zone-finder', 'showWidget');
?>