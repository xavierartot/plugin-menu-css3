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
Version: 0.1.1
Author URI: 
*/

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
      wp_register_style( 'menu_css3', plugins_url( 'menu_css3/assets/styles/menu_css3.css' ) );
      wp_enqueue_style( 'menu_css3' );
   } 
  }
  add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style', 1);

// charge dans l'admin
  function xav_admin_scripts_js() {
    wp_register_script( 'jquery_x', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
    false, true, true );
    wp_enqueue_script( 'jquery_x' );

    wp_register_script( 'custom_ui_x', plugins_url( 'menu_css3/assets/javascript/jquery-ui-1.10.3.custom.js'),
    false, true, true );
    wp_enqueue_script( 'custom_ui_x' );

    wp_register_script( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js', false, true, true );
    wp_enqueue_script( 'bootstrap' );

    wp_register_script( 'spectrum_x', plugins_url( 'menu_css3/assets/javascript/spectrum.js' ),false, true, true  );
    wp_enqueue_script( 'spectrum_x' );

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
  //add_submenu_page('menu_css3', 'mon titre','Help', 'activate_plugins', 'documentation','xav_help_CSS3_menus');

  add_action( 'admin_init', 'register_mysettings' ); //call register settings function
}

// Ajoute les options
function register_mysettings() {
  // background
  register_setting( 'background-group', 'mode-visuel-bgc' );
  register_setting( 'background-group', 'height-bgc' );
  register_setting( 'background-group', 'height-unite-bgc' );
  register_setting( 'background-group', 'width-bgc' );
  register_setting( 'background-group', 'width-unite-bgc' );
  register_setting( 'background-group', 'margin-top-bgc' );
  register_setting( 'background-group', 'margin-right-bgc' );
  register_setting( 'background-group', 'margin-bottom-bgc' );
  register_setting( 'background-group', 'margin-left-bgc' );
  register_setting( 'background-group', 'margin-unite-bgc' );
  register_setting( 'background-group', 'bgc-1-bgc' );
  register_setting( 'background-group', 'bgc-2-bgc' );
  register_setting( 'background-group', 'border-bgc' );
  register_setting( 'background-group', 'border-size-bgc' );
  register_setting( 'background-group', 'border-style-bgc' );
  register_setting( 'background-group', 'box-shadow-horizontal-bgc' );
  register_setting( 'background-group', 'box-shadow-vertical-bgc' );
  register_setting( 'background-group', 'box-shadow-gradient-bgc' );
  register_setting( 'background-group', 'box-shadow-size-bgc' );
  register_setting( 'background-group', 'radius-top-left-bgc' );
  register_setting( 'background-group', 'radius-top-right-bgc' );
  register_setting( 'background-group', 'radius-bottom-left-bgc' );
  register_setting( 'background-group', 'radius-bottom-right-bgc' );
  register_setting( 'background-group', 'radius-unite-bgc' );
  register_setting( 'background-group', 'opacity-bgc' );
  // link
  register_setting( 'link-group', 'height-l' );
  register_setting( 'link-group', 'height-unite-l' );
  register_setting( 'link-group', 'width-l' );
  register_setting( 'link-group', 'width-unite-l' );
  register_setting( 'link-group', 'margin-top-l' );
  register_setting( 'link-group', 'margin-right-l' );
  register_setting( 'link-group', 'margin-bottom-l' );
  register_setting( 'link-group', 'margin-left-l' );
  register_setting( 'link-group', 'margin-unite-l' );
  register_setting( 'link-group', 'padding-top-l' );
  register_setting( 'link-group', 'padding-right-l' );
  register_setting( 'link-group', 'padding-bottom-l' );
  register_setting( 'link-group', 'padding-left-l' );
  register_setting( 'link-group', 'padding-unite-l' );
  register_setting( 'link-group', 'bgc-1-l' );
  register_setting( 'link-group', 'bgc-2-l' );
  register_setting( 'link-group', 'border-l' );
  register_setting( 'link-group', 'border-size-l' );
  register_setting( 'link-group', 'border-style-l' );
  register_setting( 'link-group', 'box-shadow-horizontal-l' );
  register_setting( 'link-group', 'box-shadow-vertical-l' );
  register_setting( 'link-group', 'box-shadow-gradient-l' );
  register_setting( 'link-group', 'box-shadow-size-l' );
  register_setting( 'link-group', 'radius-top-left-l' );
  register_setting( 'link-group', 'radius-top-right-l' );
  register_setting( 'link-group', 'radius-bottom-left-l' );
  register_setting( 'link-group', 'radius-bottom-right-l' );
  register_setting( 'link-group', 'radius-unite-l' );
  register_setting( 'link-group', 'opacity-l' );
  register_setting( 'link-group', 'color-1-l' );
  register_setting( 'link-group', 'color-2-l' );
  register_setting( 'link-group', 'text-shadow-horizontal-l' );
  register_setting( 'link-group', 'text-shadow-vertical-l' );
  register_setting( 'link-group', 'text-shadow-blur-l' );
  register_setting( 'link-group', 'text-shadow-color-l' );



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
  //echo $_GET['page'];
  ?>


<div class="tabbable">
  <!-- Tabs -->
  <ul class="nav nav-tabs onglet">
    <li class=""><a href="#tabr1" data-toggle="tab">Links Menu</a></li>
    <li class=""><a href="#tabr2" data-toggle="tab">Background Menu</a></li>
    <li class="active"><a href="#tabr3" data-toggle="tab">Animation</a></li>
    <li class=""><a href="#tabr4" data-toggle="tab">Documentation</a></li>
  </ul>
  <div class="tab-content container">
    <!-- Tabs 1 -->
    <div class="tab-pane" id="tabr1">

      <form class="form-l form form-horizontal" role="form" action="options.php" method="post" accept-charset="utf-8">
        <?php settings_fields( 'link-group' ); ?>
        
        <div class="col-8">
          <fieldset>

              <!-- height -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="height-l">Height </label>
                </div>
                <div class="col-xs-2 bloc-size-normal">
                  <input name="height-l" value="<?php echo esc_attr( get_option('height-l') ); ?>" id="height-l" type="text" class="form-control" placeholder="height">
                </div>
                <div class="col-xs-1 text-right">
                  <label class="control-label" for="height-unite-l">Unite: </label>
                </div>
                <div class="col-xs-1">
                  <?php $unite_percent = (esc_attr( get_option('height-unite-l') ) == '%') ? ' selected' : ''?>
                  <?php $unite_px = (esc_attr( get_option('height-unite-l') ) == 'px') ? ' selected' : ''?>
                  <select name="height-unite-l" id="height-unite-l" class="form-control">
                    <option<?php echo $unite_percent; ?>>%</option>
                    <option<?php echo $unite_px; ?>>px</option>
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

            <!-- width -->
            <div class="form-group">
              <div class="row">
                <div class="col-xs-2 label-block">
                  <label class="control-label" for="width-l">Width</label>
                </div>
                <div class="col-xs-2 bloc-size-normal">
                  <input value="<?php echo esc_attr( get_option( 'width-l' ) ); ?>" type="text" name="width-l" id="width-l" class="form-control" placeholder="width">
                </div>
                <div class="col-xs-1 text-right">
                  <label class="control-label" for="width-unite-l">Unite: </label>
                </div>
                <div class="col-xs-1">
                  <?php $unite_percent = (esc_attr( get_option('width-unite-l') ) == '%') ? ' selected' : ''?>
                  <?php $unite_px = (esc_attr( get_option('width-unite-l') ) == 'px') ? ' selected' : ''?>
                  <select class="form-control" name="width-unite-l" id="width-unite-l" >
                    <option<?php echo $unite_percent; ?>>%</option>
                    <option<?php echo $unite_px; ?>>px</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="" data-html="true" 
                    data-original-title="width"> 
                      Help
                  </button>
                </div>
              </div>
            </div>

            <!-- margin -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="margin-l">Margin </label>
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-top-l"></label>
                  <input type="text" class="form-control" value="<?php echo esc_attr( get_option('margin-top-l') ); ?>" name="margin-top-l" id="margin-top-l" placeholder="top">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-right-l"></label>
                  <input type="text" class="form-control" name="margin-right-l" value="<?php echo esc_attr( get_option('margin-right-l') ); ?>" id="margin-right-l" placeholder="right">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-bottom-l"></label>
                  <input type="text" class="form-control" name="margin-bottom-l" value="<?php echo esc_attr( get_option('margin-bottom-l') ); ?>" id="margin-bottom-l" placeholder="bottom">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-left-l"></label>
                  <input type="text" class="form-control" name="margin-left-l" value="<?php echo esc_attr( get_option('margin-left-l') ); ?>" id="margin-left-l" placeholder="left">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-unite-l">
                      <?php $unite_percent = (esc_attr( get_option('margin-unite-l') ) == '%') ? ' selected' : ''?>
                      <?php $unite_px = (esc_attr( get_option('margin-unite-l') ) == 'px') ? ' selected' : ''?>
                  </label>
                  <select class="form-control" name="margin-unite-l" id="margin-unite-l">
                    <option<?php echo $unite_percent; ?>>%</option>
                    <option<?php echo $unite_px; ?>>px</option>
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

            <!-- padding-l -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="padding-l">Padding</label>
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-top-l"></label>
                  <input type="text" class="form-control" value="<?php echo esc_attr( get_option('padding-top-l') ); ?>" name="padding-top-l" id="padding-top-l" placeholder="top">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-right-l"></label>
                  <input type="text" class="form-control" name="padding-right-l" value="<?php echo esc_attr( get_option('padding-right-l') ); ?>" id="padding-right-l" placeholder="right">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-bottom-l"></label>
                  <input type="text" class="form-control" name="padding-bottom-l" value="<?php echo esc_attr( get_option('padding-bottom-l') ); ?>" id="padding-bottom-l" placeholder="bottom">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-left-l"></label>
                  <input type="text" class="form-control" name="padding-left-l" value="<?php echo esc_attr( get_option('padding-left-l') ); ?>" id="padding-left-l" placeholder="left">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-unite-l">
                      <?php $unite_percent = (esc_attr( get_option('padding-unite-l') ) == '%') ? ' selected' : ''?>
                      <?php $unite_px = (esc_attr( get_option('padding-unite-l') ) == 'px') ? ' selected' : ''?>
                  </label>
                  <select class="form-control" name="padding-unite-l" id="padding-unite-l">
                    <option<?php echo $unite_percent; ?>>%</option>
                    <option<?php echo $unite_px; ?>>px</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="top | right | bottom | left" data-html="true" 
                    data-original-title="Padding">
                      Help
                  </button>
                </div>
              </div>
            </div>

            <!-- bgc link -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="col-md-12 control-label" for="bgc-1-l">background color</label>
                </div>
                <div class="col-xs-4 color">
                  <input value="<?php echo esc_attr( get_option('bgc-1-l') ); ?>" id="bgc-1-l" placeholder="color" name="bgc-1-l" class="form-control color" type="text">
                </div>
                <div class="col-xs-4 color">
                  <label class="hidden" for="bgc-2-l"> </label>
                  <input value="<?php echo esc_attr( get_option('bgc-2-l') ); ?>" id="bgc-2-l" placeholder="color" name="bgc-2-l" class="form-control color" type="text">
                </div>
                <div class="col-xs-2 help-color">
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
                    <label class="col-md-2 control-label" for="border-l">Border</label>
                  </div>
                  <div class="col-xs-2 bloc-size-normal">
                    <input id="border-l" pattern="\d+" placeholder="border" value="<?php echo esc_attr( get_option('border-l') ); ?>" name="border-l" class="form-control" type="text">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="border-size-l"> 
                      <?php $selected = esc_attr( get_option('border-size-l') ); ?>
                    </label>
                    <select class="form-control" name="border-size-l" id="border-size-l">
                      <option>size</option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'"'.$s.'>'.$i.'</option>';
                    } ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="border-style-l">
                      <?php $selected = esc_attr( get_option('border-style-l') ); ?>
                    </label>
                    <select class="form-control" name="border-style-l" id="border-style-l">
                      <option value="style"<?php echo $s = ( 'style' ==  $selected) ? ' selected' : ''; ?>>style</option>
                      <option value="none"<?php echo $s = ( 'none' ==  $selected) ? ' selected' : ''; ?>>none</option>
                      <option value="solid"<?php echo $s = ( 'solid' ==  $selected) ? ' selected' : ''; ?>>solid</option>
                      <option value="dotted"<?php echo $s = ( 'dotted' ==  $selected) ? ' selected' : ''; ?>>dotted</option>
                      <option value="dashed"<?php echo $s = ( 'dashed' ==  $selected) ? ' selected' : ''; ?>>dashed</option>
                      <option value="double"<?php echo $s = ( 'double' ==  $selected) ? ' selected' : ''; ?>>double</option>
                      <option value="groove"<?php echo $s = ( 'groove' ==  $selected) ? ' selected' : ''; ?>>groove</option>
                      <option value="ridge"<?php echo $s = ( 'ridge' ==  $selected) ? ' selected' : ''; ?>>ridge</option>
                      <option value="inset"<?php echo $s = ( 'inset' ==  $selected) ? ' selected' : ''; ?>>inset</option>
                      <option value="outset"<?php echo $s = ( 'outset' ==  $selected) ? ' selected' : ''; ?>>outset</option>
                      <option value="inherit"<?php echo $s = ( 'inherit' ==  $selected) ? ' selected' : ''; ?>>inherit</option>
                    </select>
                  </div>
                  
                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="order: border color | pixel width | line style <br> leave empty for put at 'none'" data-html="true" 
                    title="Border">
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
                    <label class="hidden" for="box-shadow-horizontal-l">
                      <?php $selected = esc_attr( get_option('box-shadow-horizontal-l') ); ?>
                    </label>
                    <select class="form-control" name="box-shadow-horizontal-l" id="box-shadow-horizontal-l">
                      <option>horizontal<option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'"'.$s.'>'.$i.'</option>';
                    } ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="box-shadow-vertical-l">
                      <?php $selected = esc_attr( get_option('box-shadow-vertical-l') ); ?>
                    </label>
                    <select class="form-control" name="box-shadow-vertical-l" id="box-shadow-vertical-l">
                      <option>vertical<option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'"'.$s.'>'.$i.'</option>';
                    } ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="box-shadow-gradient">
                      <?php $selected = esc_attr( get_option('box-shadow-gradient-l') ); ?>
                    </label>
                    <select class="form-control" name="box-shadow-gradient-l" id="box-shadow-gradient-l">
                      <option>gradient<option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'"'.$s.'>'.$i.'</option>';
                    } ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="box-shadow-size-l">
                      <?php $selected = esc_attr( get_option('box-shadow-size-l') ); ?>
                    </label>
                    <select class="form-control" name="box-shadow-size-l" id="box-shadow-size-l">
                      <option>size<option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'"'.$s.'>'.$i.'</option>';
                    } ?>
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
                    <label class="hidden" for="radius-top-left-l"> </label>
                    <input value="<?php echo esc_attr( get_option('radius-top-left-l') ); ?>" type="text" class="form-control" name="radius-top-left-l" id="radius-top-left-l" placeholder="top left">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-top-right-l"> </label>
                    <input value="<?php echo esc_attr( get_option('radius-top-right-l') ); ?>" type="text" class="form-control" name="radius-top-right-l" id="radius-top-left-l" placeholder="top right">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-bottom-left-l"> </label>
                    <input value="<?php echo esc_attr( get_option('radius-bottom-left-l') ); ?>" type="text" class="form-control" name="radius-bottom-left-l" id="radius-bottom-left-l" placeholder="bottom left">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-bottom-right-l"> </label>
                    <input value="<?php echo esc_attr( get_option('radius-bottom-right-l') ); ?>" type="text" class="form-control" name="radius-bottom-right-l" id="radius-bottom-right-l" placeholder="bottom right">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-unite-l"> 
                      <?php $unite_percent_l = (esc_attr( get_option('radius-unite-l') ) == '%') ? ' selected' : ''?>
                      <?php $unite_px_l = (esc_attr( get_option('radius-unite-l') ) == 'px') ? ' selected' : ''?>
                    </label>
                    <select name="radius-unite-l" class="form-control" id="radius-unite-l">
                      <option<?php echo $unite_percent_l; ?>>%</option>
                      <option<?php echo $unite_px_l; ?>>px</option>
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
                    <label class="control-label" for="opacity-l">Opacity</label>
                  </div>
                  <div class="col-xs-1">
                    <input value="<?php echo esc_attr( get_option('opacity-l') ); ?>" type="text" class="form-control" name="opacity-l" id="opacity-l">
                  </div>

                  <div class="col-xs-4" id="slider-l"></div> 

                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                      data-content=" in percent" data-html="true" 
                      data-original-title="background opacity">
                        Help
                    </button>
                  </div>
                </div>
              </div>

            <!-- color link -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="col-md-12 control-label" for="color-1-l">color</label>
                </div>
                <div class="col-xs-4 color">
                  <input value="<?php echo esc_attr( get_option('color-1-l') ); ?>" id="color-1-l" placeholder="color" name="color-1-l" class="form-control color" type="text">
                </div>
                <div class="col-xs-4 color">
                  <label class="hidden" for="color-2-l"> </label>
                  <input value="<?php echo esc_attr( get_option('color-2-l') ); ?>" id="color-2-l" placeholder="color" name="color-2-l" class="form-control color" type="text">
                </div>
                <div class="col-xs-2 help-color">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="the color for the background" data-html="true" 
                    data-original-title="color">
                      Help
                  </button>
                </div>
              </div>
            </div>
                
            <!-- text shadow l -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="text-shadow-l">Text shadow</label>
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="text-shadow-horizontal-l"></label>
                  <input type="text" class="form-control" value="<?php echo esc_attr( get_option('text-shadow-horizontal-l') ); ?>" name="text-shadow-horizontal-l" id="text-shadow-horizontal-l" placeholder="horizontal">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="text-shadow-vertical-l"></label>
                  <input type="text" class="form-control" name="text-shadow-vertical-l" value="<?php echo esc_attr( get_option('text-shadow-vertical-l') ); ?>" id="text-shadow-vertical-l" placeholder="vertical">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="text-shadow-blur-l"></label>
                  <input type="text" class="form-control" name="text-shadow-blur-l" value="<?php echo esc_attr( get_option('text-shadow-blur-l') ); ?>" id="text-shadow-blur-l" placeholder="blur">
                </div>
                <div class="col-xs-4 color">
                  <label class="hidden" for="text-shadow-color-l"> </label>
                  <input value="<?php echo esc_attr( get_option('text-shadow-color-l') ); ?>" id="text-shadow-color-l" placeholder="color" name="text-shadow-color-l" class="form-control color" type="text">
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="- h-shadow  Required. The position of the horizontal shadow. Negative values are allowed.
                    <br>- v-shadow  Required. The position of the vertical shadow. Negative values are allowed.
                    <br>- blur  Optional. The blur distance. 
                    <br>- color Optional. The color of the shadow.
                    <br> <a href='http://www.w3schools.com/cssref/playit.asp?filename=playcss_text-shadow' target='_blank'>try it</a>" data-html="true" 
                    data-original-title="text-shadow">
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
        <input type="hidden" name="panel_nonce_name" value="<?php echo wp_create_nonce('key-link'); ?>">
      </form>
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
    <div class="tab-pane" id="tabr2">
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
                  <?php $unite_percent = (esc_attr( get_option('height-unite-bgc') ) == '%') ? ' selected' : ''?>
                  <?php $unite_px = (esc_attr( get_option('height-unite-bgc') ) == 'px') ? ' selected' : ''?>
                  <select name="height-unite-bgc" id="height-unite-bgc" class="form-control">
                    <option<?php echo $unite_percent; ?>>%</option>
                    <option<?php echo $unite_px; ?>>px</option>
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

            <!-- width -->
            <div class="form-group">
              <div class="row">
                <div class="col-xs-2 label-block">
                  <label class="control-label" for="width-bgc">Width</label>
                </div>
                <div class="col-xs-2 bloc-size-normal">
                  <input value="<?php echo esc_attr( get_option( 'width-bgc' ) ); ?>" type="text" name="width-bgc" id="width-bgc" class="form-control" placeholder="width">
                </div>
                <div class="col-xs-1 text-right">
                  <label class="control-label" for="width-unite-bgc">Unite: </label>
                </div>
                <div class="col-xs-1">
                  <?php $unite_percent = (esc_attr( get_option('width-unite-bgc') ) == '%') ? ' selected' : ''?>
                  <?php $unite_px = (esc_attr( get_option('width-unite-bgc') ) == 'px') ? ' selected' : ''?>
                  <select class="form-control" name="width-unite-bgc" id="width-unite-bgc" >
                    <option<?php echo $unite_percent; ?>>%</option>
                    <option<?php echo $unite_px; ?>>px</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="" data-html="true" 
                    data-original-title="width"> 
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
                      <?php $unite_percent = (esc_attr( get_option('margin-unite-bgc') ) == '%') ? ' selected' : ''?>
                      <?php $unite_px = (esc_attr( get_option('margin-unite-bgc') ) == 'px') ? ' selected' : ''?>
                  </label>
                  <select class="form-control" name="margin-unite-bgc" id="margin-unite-bgc">
                    <option<?php echo $unite_percent; ?>>%</option>
                    <option<?php echo $unite_px; ?>>px</option>
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
                    <label class="col-md-12 control-label" for="bgc-1-bgc">background color</label>
                  </div>
                  <div class="col-xs-4 color">
                    <input value="<?php echo esc_attr( get_option('bgc-1-bgc') ); ?>" id="bgc-1-bgc" placeholder="color" name="bgc-1-bgc" class="form-control color" type="text">
                  </div>
                  <div class="col-xs-4 color">
                    <label class="hidden" for="bgc-2-bgc"> </label>
                    <input value="<?php echo esc_attr( get_option('bgc-2-bgc') ); ?>" id="bgc-2-bgc" placeholder="color" name="bgc-2-bgc" class="form-control color" type="text">
                  </div>
                  <div class="col-xs-2 help-color">
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
                    <input id="border-bgc" pattern="\d+" placeholder="border" value="<?php echo esc_attr( get_option('border-bgc') ); ?>" name="border-bgc" class="form-control" type="text">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="border-size-bgc"> 
                      <?php $selected = esc_attr( get_option('border-size-bgc') ); ?>
                    </label>
                    <select class="form-control" name="border-size-bgc" id="border-size-bgc">
                      <option>size</option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'"'.$s.'>'.$i.'</option>';
                    } ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="border-style-bgc">
                      <?php $selected = esc_attr( get_option('border-style-bgc') ); ?>
                    </label>
                    <select class="form-control" name="border-style-bgc" id="border-style-bgc">
                      <option value="style"<?php echo $s = ( 'style' ==  $selected) ? ' selected' : ''; ?>>style</option>
                      <option value="none"<?php echo $s = ( 'none' ==  $selected) ? ' selected' : ''; ?>>none</option>
                      <option value="solid"<?php echo $s = ( 'solid' ==  $selected) ? ' selected' : ''; ?>>solid</option>
                      <option value="dotted"<?php echo $s = ( 'dotted' ==  $selected) ? ' selected' : ''; ?>>dotted</option>
                      <option value="dashed"<?php echo $s = ( 'dashed' ==  $selected) ? ' selected' : ''; ?>>dashed</option>
                      <option value="double"<?php echo $s = ( 'double' ==  $selected) ? ' selected' : ''; ?>>double</option>
                      <option value="groove"<?php echo $s = ( 'groove' ==  $selected) ? ' selected' : ''; ?>>groove</option>
                      <option value="ridge"<?php echo $s = ( 'ridge' ==  $selected) ? ' selected' : ''; ?>>ridge</option>
                      <option value="inset"<?php echo $s = ( 'inset' ==  $selected) ? ' selected' : ''; ?>>inset</option>
                      <option value="outset"<?php echo $s = ( 'outset' ==  $selected) ? ' selected' : ''; ?>>outset</option>
                      <option value="inherit"<?php echo $s = ( 'inherit' ==  $selected) ? ' selected' : ''; ?>>inherit</option>
                    </select>
                  </div>
                  
                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="order: border color | pixel width | line style <br> leave empty for put at 'none'" data-html="true" 
                    title="Border">
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
                    <label class="hidden" for="box-shadow-horizontal-bgc">
                      <?php $selected = esc_attr( get_option('box-shadow-horizontal-bgc') ); ?>
                    </label>
                    <select class="form-control" name="box-shadow-horizontal-bgc" id="box-shadow-horizontal-bgc">
                      <option>horizontal<option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'"'.$s.'>'.$i.'</option>';
                    } ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="box-shadow-vertical-bgc">
                      <?php $selected = esc_attr( get_option('box-shadow-vertical-bgc') ); ?>
                    </label>
                    <select class="form-control" name="box-shadow-vertical-bgc" id="box-shadow-vertical-bgc">
                      <option>vertical<option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'"'.$s.'>'.$i.'</option>';
                    } ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="box-shadow-gradient">
                      <?php $selected = esc_attr( get_option('box-shadow-gradient-bgc') ); ?>
                    </label>
                    <select class="form-control" name="box-shadow-gradient-bgc" id="box-shadow-gradient-bgc">
                      <option>gradient<option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'"'.$s.'>'.$i.'</option>';
                    } ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="box-shadow-size-bgc">
                      <?php $selected = esc_attr( get_option('box-shadow-size-bgc') ); ?>
                    </label>
                    <select class="form-control" name="box-shadow-size-bgc" id="box-shadow-size-bgc">
                      <option>size<option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'"'.$s.'>'.$i.'</option>';
                    } ?>
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
                    <input value="<?php echo esc_attr( get_option('radius-top-left-bgc') ); ?>" type="text" class="form-control" name="radius-top-left-bgc" id="radius-top-left-bgc" placeholder="top left">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-top-right-bgc"> </label>
                    <input value="<?php echo esc_attr( get_option('radius-top-right-bgc') ); ?>" type="text" class="form-control" name="radius-top-right-bgc" id="radius-top-left-bgc" placeholder="top right">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-bottom-left-bgc"> </label>
                    <input value="<?php echo esc_attr( get_option('radius-bottom-left-bgc') ); ?>" type="text" class="form-control" name="radius-bottom-left-bgc" id="radius-bottom-left-bgc" placeholder="bottom left">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-bottom-right-bgc"> </label>
                    <input value="<?php echo esc_attr( get_option('radius-bottom-right-bgc') ); ?>" type="text" class="form-control" name="radius-bottom-right-bgc" id="radius-bottom-right-bgc" placeholder="bottom right">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-unite-bgc"> 
                      <?php $unite_percent = (esc_attr( get_option('radius-unite-bgc') ) == '%') ? ' selected' : ''?>
                      <?php $unite_px = (esc_attr( get_option('radius-unite-bgc') ) == 'px') ? ' selected' : ''?>
                    </label>
                    <select name="radius-unite-bgc" class="form-control" id="radius-unite-bgc">
                      <option<?php echo $unite_percent; ?>>%</option>
                      <option<?php echo $unite_px; ?>>px</option>
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
                    <input value="<?php echo esc_attr( get_option('opacity-bgc') ); ?>" type="text" class="form-control" name="opacity-bgc" id="opacity-bgc">
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
    <div class="tab-pane active" id="tabr3">
      <h1>Animation</h1>
      <form class="form-l form form-horizontal" role="form" action="options.php" method="post" accept-charset="utf-8">
        <?php settings_fields( 'link-group' ); ?>
        
        <div class="col-8">
          <fieldset>

          </fieldset>
        </div>
      </form>
    </div>

    <!-- Tabs 3-->
    <div class="tab-pane " id="tabr4">
      <h1>Documantation</h1>
    </div>
  </div><!-- FIN Tabs -->

</div>
<?php
}
?>
