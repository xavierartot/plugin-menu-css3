<?php
// Supressions des options a la desactivation du plugin
function xav_delete_register_settings() {
  delete_option( 'mode-visuel-bgc' );
  delete_option( 'height-bgc' );
  delete_option( 'height-unite-bgc' );
  delete_option( 'width-bgc' );
  delete_option( 'width-unite-bgc' );
  delete_option( 'margin-top-bgc' );
  delete_option( 'margin-right-bgc' );
  delete_option( 'margin-bottom-bgc' );
  delete_option( 'margin-left-bgc' );
  delete_option( 'margin-unite-bgc' );
  delete_option( 'bgc-1-bgc' );
  delete_option( 'bgc-2-bgc' );
  delete_option( 'border-bgc' );
  delete_option( 'border-size-bgc' );
  delete_option( 'border-style-bgc' );
  delete_option( 'box-shadow-horizontal-bgc' );
  delete_option( 'box-shadow-vertical-bgc' );
  delete_option( 'box-shadow-gradient-bgc' );
  delete_option( 'box-shadow-size-bgc' );
  delete_option( 'radius-top-left-bgc' );
  delete_option( 'radius-top-right-bgc' );
  delete_option( 'radius-bottom-left-bgc' );
  delete_option( 'radius-bottom-right-bgc' );
  delete_option( 'radius-unite-bgc' );
  delete_option( 'opacity-bgc' );
}

register_deactivation_hook(__FILE__, 'xav_delete_register_settings');
?>
