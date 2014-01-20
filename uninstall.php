<?php
function xav_delete_register_settings() {
  for ($id = 0; $id <= 40; $id++) {
     delete_option( 'caption-'.$id);
     delete_option( 'photo-'.$id);
  }
}
register_deactivation_hook(__FILE__, 'xav_delete_register_settings');
?>
