<?php
/**
 * @package CSS3 Menus
 * @version 0.1
 */
/*
Plugin Name: CSS3 Menus
Plugin URI: 
Description: Patiente
Author: Xavier Artot
Version: 0.1
Author URI: 
*/
//echo $pagenow;
//$screen = get_current_screen();
//echo $screen->id;

// CSS charge dans l'admin
function my_admin_notice(){
    global $pagenow;
    if ( $pagenow == 'admin.php' ) {
      echo '<div class="updated">
        <p>This notice only appears on the plugins page.</p>
      </div>';
    }
}
add_action('admin_notices', 'my_admin_notice');

  function load_custom_wp_admin_style() {
    // //netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css  CDN BOOTSTRAP
    global $pagenow;
    if ( $pagenow == 'admin.php' ) {
      //wp_register_style( 'bootstrap_css', plugins_url( 'menu_css3/assets/styles/less/bootstrap-css/css/bootstrap.css' ), false, '3.0.3', 'all' );
      //wp_enqueue_style( 'bootstrap_css' );
      wp_register_style( 'menu_css3', plugins_url( 'menu_css3/assets/styles/src/less.menu_css3.css' ) );
      wp_enqueue_style( 'menu_css3' );
   } 
  }
  add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style', 1);

// charge dans l'admin
  function xav_admin_scripts_js() {
    // //netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js CDN Bootstrap JS
    // //ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js
    wp_register_script( 'jquery_x', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
    false, true, true );
    wp_enqueue_script( 'jquery_x' );

    wp_register_script( 'custom_ui_x', plugins_url( 'menu_css3/assets/javascript/jquery-ui-1.10.3.custom.js'),
    false, true, true );
    wp_enqueue_script( 'custom_ui_x' );

    wp_register_script( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js', false, true, true );
    wp_enqueue_script( 'bootstrap' );

    wp_register_script( 'menu_css3', plugins_url( 'menu_css3/assets/javascript/src/jquery.menu_css3.js' ),false, true, true  );
    wp_enqueue_script( 'menu_css3' );

  }
  add_action( 'admin_enqueue_scripts', 'xav_admin_scripts_js' );


add_action('admin_menu', 'my_admin_menu');
function my_admin_menu() {
  add_menu_page(
    'Neoframework options', // titre de la page <title> 
    'Menus CSS3', // titre dans le menu
    'activate_plugins', // permissions: les admin sont aurotise a gerer ce panneaux 
    'menu_css3',// id ou slug 
    'front_page', // fonction qui genere le code html de cette page
    plugins_url( 'menu_css3/assets/images/ad-icon.png'), // icone dans le menu
    55 // position dans le menu
  );

  //add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function ); 
  add_submenu_page('menu_css3', 'mon titre','Help', 'activate_plugins', 'documentation','xav_help_CSS3_menus');
  add_action( 'admin_init', 'register_mysettings' ); //call register settings function
}

// Supressions des options a la desactivation du plugin
function xav_delete_register_settings() {
  delete_option( 'height');
}
// Ajoute les options
function register_mysettings() {
  register_setting( 'background-group', 'mode-visuel' );
  register_setting( 'background-group', 'width' );
  register_setting( 'background-group', 'height' );
  register_setting( 'background-group', 'margin-top' );
  register_setting( 'background-group', 'margin-right' );
  register_setting( 'background-group', 'margin-bottom' );
  register_setting( 'background-group', 'margin-left' );
  register_setting( 'background-group', 'margin-unite' );
  register_setting( 'background-group', 'bgc-bgc' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );
  register_setting( 'background-group', '' );

}
// demarre lessphp
add_action( 'wp_enqueue_scripts', 'xav_css3_menus' );
function xav_css3_menus() {
  wp_register_style( 'menu_css3', plugins_url( 'menu_css3/assets-front-end/less/style.php' ) );
  wp_enqueue_style( 'menu_css3' );
}

register_deactivation_hook(__FILE__, 'xav_delete_register_settings');

// page d'aide
function xav_help_CSS3_menus() {
  echo 'eeeeeeeeeeee';
}

function front_page()
{
  $less = '';
  $less .= '
  @height_l       :   '.esc_attr( get_option('test1') ).';

  .cowgirl{
    ssssssssssssssssss: '.esc_attr( get_option('test1') ).';
  }
  ';
  file_put_contents(WP_PLUGIN_DIR . '/menu_css3/assets-front-end/less/variables.less' , $less);
  echo $_GET['page'];
  ?>


<div class="tabbable">
  <!-- Tabs -->
  <ul class="nav nav-tabs onglet">
    <li class="active"><a href="#tabr1" data-toggle="tab">Links Menu</a></li>
    <li><a href="#tabr2" data-toggle="tab">Background Menu</a></li>
    <li><a href="#tabr3" data-toggle="tab">Documentation</a></li>
  </ul>
  <div class="tab-content container">
    <!-- Tabs 1 -->
    <div class="tab-pane active" id="tabr1">

<!--
      <div class="form-group">
        <label class="col-md-2 control-label" for="checkboxes">Inline Checkboxes</label>
        <div class="col-md-4">
          <label class="checkbox-inline" for="checkboxes-0">
            <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
            1
          </label>
          <label class="checkbox-inline" for="checkboxes-1">
            <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
            2
          </label>
          <label class="checkbox-inline" for="checkboxes-2">
            <input type="checkbox" name="checkboxes" id="checkboxes-2" value="3">
            3
          </label>
          <label class="checkbox-inline" for="checkboxes-3">
            <input type="checkbox" name="checkboxes" id="checkboxes-3" value="4">
            4
          </label>
        </div>
      </div>
-->
    </div>
    <!-- Tabs 2-->
    <div class="tab-pane " id="tabr2">
      <form class="form-bgc form form-horizontal" role="form" action="options.php" method="post" accept-charset="utf-8">
        <?php settings_fields( 'background-group' ); ?>
        
        <div class="col-8">
          <fieldset>

            <!-- Multiple Radios (inline) -->
              <div class="form-group" style="height: 60px;">
                <div class="row">
                  <div class="col-xs-2 label-block">
                    <label class="">Mode </label>
                  </div>
                  <?php $responsive = (esc_attr( get_option('mode-visuel-bgc') ) == 'responsive') ? ' checked' : ''?>
                  <?php $pixel = (esc_attr( get_option('mode-visuel-bgc') ) == 'pixel') ? ' checked' : ''?>
                  <div class="col-xs-2 bloc-size-normal">
                    <div class="radio">
                      <label for="responsive">
                        Responsive
                        <input type="radio" name="mode-visuel-bgc" id="responsive" value="responsive"<?php echo $responsive; ?>>
                      </label>
                    </div>
                    <div class="radio">
                      <label for="pixel">
                        Fixe
                        <input type="radio" name="mode-visuel-bgc" id="pixel" value="pixel"<?php echo $pixel; ?>>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                      data-content="responsive all value will in %" data-html="true" 
                      data-original-title="mode">
                        Help
                    </button>
                  </div>
                </div>
              </div>

              <!-- height -->
          <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="height-bgc">Height </label>
                </div>
                <div class="col-xs-2 bloc-size-normal">
                  <input name="height-bgc" value="<?php echo esc_attr( get_option('height-bgc') ); ?>" id="height-bgc" type="text" class="form-control" placeholder="height">
                </div>
                <div class="col-xs-1 text-right">
                  <label class="control-label" for="height-unite-bgc">Unite: </label>
                </div>
                <div class="col-xs-1">
                  <?php esc_attr( get_option( 'height-unite-bgc' ); ?>
                  <select name="height-unite-bgc" id="height-unite-bgc" class="form-control">
                    <option>%</option>
                    <option>px</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="" data-html="true" 
                    data-original-title="height" title="">
                      Help
                  </button>
                </div>
              </div>
            </div>

            <!-- width l -->
            <div class="form-group">
              <div class="row">
                <div class="col-xs-2 label-block">
                  <label class="control-label" for="width-bgc">Width</label>
                </div>
                <div class="col-xs-2 bloc-size-normal">
                  <input value="<?php esc_attr( get_option( 'width-bgc' ); ?>" type="text" name="width-bgc" id="width-bgc" class="form-control" placeholder="width-bgc">
                </div>
                <div class="col-xs-1 text-right">
                  <label class="control-label" for="width-unite-bgc">Unite: </label>
                </div>
                <div class="col-xs-1">
                  <?php esc_attr( get_option( 'width-unite-bgc' ); ?>
                  <select class="form-control" name="width-unite-bgc" id="width-unite-bgc" >
                    <option>%</option>
                    <option>px</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="" data-html="true" 
                    data-original-title="width" title="">
                      Help
                  </button>
                </div>
              </div>
            </div>

            <!-- margin -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="margin-bgc">Margin </label>
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-top-bgc"></label>
                  <input type="text" class="form-control" value="<?php echo esc_attr( get_option('margin-top-bgc') ); ?>" name="margin-top-bgc" id="margin-top-bgc" placeholder="top">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-right-bgc"></label>
                  <input type="text" class="form-control" name="margin-right-bgc" value="<?php echo esc_attr( get_option('margin-right-bgc') ); ?>" id="margin-right-bgc" placeholder="right">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-bottom-bgc"></label>
                  <input type="text" class="form-control" name="margin-bottom-bgc" value="<?php echo esc_attr( get_option('margin-bottom-bgc') ); ?>" id="margin-bottom-bgc" placeholder="bottom">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-left-bgc"></label>
                  <input type="text" class="form-control" name="margin-left-bgc" value="<?php echo esc_attr( get_option('margin-left-bgc') ); ?>" id="margin-left-bgc" placeholder="left">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-unite-bgc">
                      <?php esc_attr( get_option( 'margin-unite' ); ?>
                  </label>
                  <select class="form-control" name="margin-unite-bgc" id="margin-unite-bgc">
                    <option value="">%</option>
                    <option value="">px</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="top | right | bottom | left" data-html="true" 
                    data-original-title="margin">
                      Help
                  </button>
                </div>
              </div>
            </div>

              <!-- bgc -->
              <div class="form-group">
                <div class="row">
                  <div class="label-block col-xs-2">
                    <label class="col-md-2 control-label" for="bgc-bgc">background</label>
                  </div>
                  <div class="col-xs-3">
                    <input value="<?php echo esc_attr( get_option('bgc-bgc') ); ?>" id="bgc-bgc" placeholder="color" name="bgc-bgc" class="form-control" type="text">
                  </div>
                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                      data-content="the color for the background" data-html="true" 
                      data-original-title="color">
                        Help
                    </button>
                  </div>
                </div>
              </div>

              <!-- border -->

              <div class="form-group">
                <div class="row">
                  <div class="label-block col-xs-2">
                    <label class="col-md-2 control-label" for="border-bgc">Border</label>
                  </div>
                  <div class="col-xs-2 bloc-size-normal">
                    <input id="border-bgc" pattern="\d+" placeholder="border-bgc" value="<?php echo esc_attr( get_option('border-bgc') ); ?>" name="border-bgc" class="form-control" type="text">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="border-size">
                      <?php esc_attr( get_option('border-style-bgc') ); ?>
                    </label>
                    <select class="form-control" name="border-size-bgc" id="border-size-bgc">
                      <option>size</option>
                    <?php for ($i = 0; $i <= 20; $i++) {?>
                      <?php echo '<option value="'.$i.'">'.$i.'</option>';
                    <?php } ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="border-style-bgc">
                      <?php esc_attr( get_option('border-style-bgc') ); ?>
                    </label>
                    <select class="form-control" name="border-style-bgc" id="border-style-bgc">
                      <option>style</option>
                      <option>none</option>
                      <option>solid</option>
                      <option>dotted</option>
                      <option>dashed</option>
                      <option>double</option>
                      <option>groove</option>
                      <option>ridge</option>
                      <option>inset</option>
                      <option>outset</option>
                      <option>inherit</option>
                    </select>
                  </div>
                  
                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="border color | pixel width | line style" data-html="true" 
                    data-original-title="" title="Border">
                      Help
                    </button>
                  </div>
                </div>
              </div>

              <!-- box-shadow .box-shadow( 0 1px 1px rgba(0,0,0,.075)); 
              La première valeur indique le décalage horizontal vers la droite (ici 8px)
              le deuxième correspond au décalage vertical vers le bas (ici 8px)
              le chiffre suivant indique la force du dégradé (ici 0px)
              et enfin, la couleur (ici #aaa)
              -->
              <div class="form-group">
                <div class="row">
                  <div class="label-block col-xs-2">
                    <label class="col-md-2 control-label" for="box">Shadow </label>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="box-shadow-horizontal-bgc"></label>
                    <select class="form-control" name="box-shadow-horizontal-bgc" id="box-shadow-horizontal-bgc">
                      <option>horizontal<option>
                    <?php for ($i = 0; $i <= 20; $i++) {?>
                      <?php echo '<option value="'.$i.'">'.$i.'</option>';
                    <?php } ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="box-shadow-vertical-bgc"></label>
                    <select class="form-control" name="box-shadow-vertical-bgc" id="box-shadow-vertical-bgc">
                      <option>vertical<option>
                    <?php for ($i = 0; $i <= 20; $i++) {?>
                      <?php echo '<option value="'.$i.'">'.$i.'</option>';
                    <?php } ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="box-shadow-gradient"></label>
                    <select class="form-control" name="box-shadow-gradient-bgc" id="box-shadow-gradient-bgc">
                      <option>gradient<option>
                    <?php for ($i = 0; $i <= 20; $i++) {?>
                      <?php echo '<option value="'.$i.'">'.$i.'</option>';
                    <?php } ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="box-shadow-size-bgc"></label>
                    <select class="form-control" name="box-shadow-size-bgc" id="box-shadow-size-bgc">
                      <option>size<option>
                    <?php for ($i = 0; $i <= 20; $i++) {?>
                      <?php echo '<option value="'.$i.'">'.$i.'</option>';
                    <?php } ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                      data-content="horizontal | vertical | gradient | size" data-html="true" 
                      data-original-title="" title="box shadow">
                        Help
                    </button>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="label-block col-xs-2">
                    <label class="control-label" for="radius">Border Radius</label>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-top-left-bgc"> </label>
                    <input value="<?php echo esc_attr( get_option('radius-top-left-bgc') ); ?> type="text" class="form-control" name="radius-top-left-bgc" id="radius-top-left-bgc" placeholder="top left">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-top-right-bgc"> </label>
                    <input value="<?php echo esc_attr( get_option('radius-top-right-bgc') ); ?> type="text" class="form-control" name="radius-top-right-bgc" id="radius-top-left-bgc" placeholder="top right">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-bottom-left-bgc"> </label>
                    <input value="<?php echo esc_attr( get_option('radius-bottom-left-bgc') ); ?> type="text" class="form-control" name="radius-bottom-left-bgc" id="radius-bottom-left-bgc" placeholder="bottom left">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-bottom-right-bgc"> </label>
                    <input value="<?php echo esc_attr( get_option('radius-bottom-right-bgc') ); ?> type="text" class="form-control" name="radius-bottom-right-bgc" id="radius-bottom-right-bgc" placeholder="bottom left">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-unite-bgc"> </label>
                    <select name="radius-unite-bgc" class="form-control" id="radius-unite-bgc">
                      <option value="">%</option>
                      <option  value="" selected>px</option>
                    </select>
                  </div>
                  <div class="col-xs-1 abbr">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                      data-content="top left | top right | bottom right | bottom left" data-html="true" 
                      data-original-title="border radius"> 
                        Help
                    </button>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="label-block col-xs-2">
                    <label class="control-label" for="opacity-bgc">Opacity</label>
                  </div>
                  <div class="col-xs-1">
                    <input value="<?php echo esc_attr( get_option('opacity-bgc') ); ?> type="text" class="form-control" name="opacity-bgc" id="opacity-bgc">
                  </div>

                  <div class="col-xs-4" id="slider"></div> 

                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                      data-content="opacity in percent" data-html="true" 
                      data-original-title="background opacity">
                        Help
                    </button>
                  </div>
                </div>
              </div>
              
          </fieldset>
      </div>

        <button type="submit" name="panel_update" data-loading-text="Loading..." class="btn btn-primary">
          <?php _e('Save Changes') ?> &rarr;
        </button>
        <input type="hidden" name="panel_nonce_name" value="<?php echo wp_create_nonce('key-panel'); ?>">
      </form>

    </div>
    <!-- Tabs 3-->
    <div class="tab-pane" id="tabr3">
      Tab3
    </div>
  </div><!-- FIN Tabs -->

</div>
<?php
}
?>
