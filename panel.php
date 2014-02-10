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
Text Domain: menu_css3
Domain Path: /lang
*/

// Localization
function myplugin_init() {
  load_plugin_textdomain( 'my-plugin', false, dirname( plugin_basename( __FILE__ ) ). '/lang/' ); 
}
add_action('plugins_loaded', 'myplugin_init');

//add_action('init', 'localizationsample_init');
//function localizationsample_init() {
//    $path = dirname(plugin_basename( __FILE__ )) . '/lang/';
//    $loaded = load_plugin_textdomain( 'menu_css3', false, $path);
//    if ( isset( $_GET['page'] ) == basename(__FILE__) && !$loaded) {          
//        echo '<div class="error">Sample Localization: ' . __('Could not load the localization file: ' . $path, 'localizationsample') . '</div>';
//        return;
//    } 
//} 
//// CSS charge dans l'admin
//function my_admin_notice(){
//    global $pagenow;
//    if ( $pagenow == 'admin.php' ) {
//      echo '<div class="updated">
//        <p>This notice only appears on the plugins page.</p>
//      </div>';
//    }
//}
//add_action('admin_notices', 'my_admin_notice');

// lang
//add_action( 'init', 'make_wpm_multilang' );
//function make_wpm_multilang() {
//  load_plugin_textdomain('menu_css3', false, dirname( plugin_basename( __FILE__ ) ).'/lang');
//}
// Localization
 

  function load_custom_wp_admin_style() {
    // //netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css  CDN BOOTSTRAP
    global $pagenow;
    if ( $pagenow == 'admin.php' ) {
      wp_register_style( 'menu_css3', plugins_url( 'menu_css3/assets/styles/menu_css3.css' ) );
      wp_enqueue_style( 'menu_css3' );
   } 
  }
  add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style', 1);


  function xav_admin_scripts_js() {

    wp_register_script( 'jquery_x', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
    false, true, false );
    wp_enqueue_script( 'jquery_x' );

    wp_register_script( 'custom_ui_x', plugins_url( 'menu_css3/assets/javascript/jquery-ui-1.10.3.custom.js'),
    false, true, false );
    wp_enqueue_script( 'custom_ui_x' );

    wp_register_script( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js', false, true, false );
    wp_enqueue_script( 'bootstrap' );

    wp_register_script( 'spectrum_x', plugins_url( 'menu_css3/assets/javascript/spectrum.js' ),false, true, false  );
    wp_enqueue_script( 'spectrum_x' );

    wp_register_script( 'menu_css3', plugins_url( 'menu_css3/assets/javascript/src/jquery.menu_css3.js' ), false, true, false  );
    wp_enqueue_script( 'menu_css3' );

    wp_register_script( 'prefix', plugins_url( 'menu_css3/assets/javascript/prefixfree.min.js' ),false, true, false  );
    wp_enqueue_script( 'prefix' );

  }
  if(is_admin()){
      add_action( 'admin_enqueue_scripts', 'xav_admin_scripts_js' );
      global $pagenow;
        if ( $pagenow == 'admin.php' ) {
    }
  }


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
  register_setting( 'background-group', 'height-bgc' );
  register_setting( 'background-group', 'height-unite-bgc' );
  register_setting( 'background-group', 'width-bgc' );
  register_setting( 'background-group', 'width-unite-bgc' );
  register_setting( 'background-group', 'margin-top-bgc' );
  register_setting( 'background-group', 'margin-right-bgc' );
  register_setting( 'background-group', 'margin-bottom-bgc' );
  register_setting( 'background-group', 'margin-left-bgc' );
  register_setting( 'background-group', 'margin-unite-bgc' );
  register_setting( 'background-group', 'padding-top-bgc' );
  register_setting( 'background-group', 'padding-right-bgc' );
  register_setting( 'background-group', 'padding-bottom-bgc' );
  register_setting( 'background-group', 'padding-left-bgc' );
  register_setting( 'background-group', 'padding-unite-bgc' );
  register_setting( 'background-group', 'bgc-1-bgc' );
  register_setting( 'background-group', 'bgc-2-bgc' );
  register_setting( 'background-group', 'border-bgc' );
  register_setting( 'background-group', 'border-size-bgc' );
  register_setting( 'background-group', 'border-style-bgc' );
  register_setting( 'background-group', 'box-shadow-horizontal-bgc' );
  register_setting( 'background-group', 'box-shadow-vertical-bgc' );
  register_setting( 'background-group', 'box-shadow-gradient-bgc' );
  register_setting( 'background-group', 'box-shadow-color-bgc' );
  register_setting( 'background-group', 'radius-top-left-bgc' );
  register_setting( 'background-group', 'radius-top-right-bgc' );
  register_setting( 'background-group', 'radius-bottom-left-bgc' );
  register_setting( 'background-group', 'radius-bottom-right-bgc' );
  register_setting( 'background-group', 'radius-unite-bgc' );
  register_setting( 'background-group', 'opacity-bgc' );

  // position
  register_setting( 'background-group', 'sens-pos-bgc' );
  //register_setting( 'background-group', 'display-hook-bgc' );
  register_setting( 'background-group', 'pos-bgc' );

  // link
  //register_setting( 'link-group', 'text-align-l' );
  //register_setting( 'link-group', 'height-l' );
  //register_setting( 'link-group', 'height-unite-l' );
  //register_setting( 'link-group', 'width-l' );
  //register_setting( 'link-group', 'width-unite-l' );
  register_setting( 'link-group', 'line-height-l' );
  register_setting( 'link-group', 'line-height-unite-l' );
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
  register_setting( 'link-group', 'box-shadow-color-l' );
  register_setting( 'link-group', 'radius-top-left-l' );
  register_setting( 'link-group', 'radius-top-right-l' );
  register_setting( 'link-group', 'radius-bottom-left-l' );
  register_setting( 'link-group', 'radius-bottom-right-l' );
  register_setting( 'link-group', 'radius-unite-l' );
  register_setting( 'link-group', 'opacity-l' );
  register_setting( 'link-group', 'color-l' );
  register_setting( 'link-group', 'text-shadow-horizontal-l' );
  register_setting( 'link-group', 'text-shadow-vertical-l' );
  register_setting( 'link-group', 'text-shadow-blur-l' );
  register_setting( 'link-group', 'text-shadow-color-l' );
  register_setting( 'link-group', 'font-size-l' );
  register_setting( 'link-group', 'style-variant-l' );
  register_setting( 'link-group', 'transform-l' );
  register_setting( 'link-group', 'letter-spacing-l' );
  register_setting( 'link-group', 'font-style-l' );
  register_setting( 'link-group', 'font-weight-l' );
  register_setting( 'link-group', 'letter-spacing-unite-l' );
  register_setting( 'link-group', 'fonts-l' );
  register_setting( 'link-group', 'small-caps-l' );
  register_setting( 'link-group', 'font-weight-l' );
  register_setting( 'link-group', 'font-style-l' );
  register_setting( 'link-group', 'transform-l' );
  
  // hover 
  register_setting( 'animate-group', 'color-text-a' );
  register_setting( 'animate-group', 'bgc-1-a' );
  register_setting( 'animate-group', 'bgc-2-a' );
  register_setting( 'animate-group', 'time-a' );
  register_setting( 'animate-group', 'effet-a' );


}

// demarre lessphp
add_action( 'wp_enqueue_scripts', 'xav_css3_menus' );
function xav_css3_menus() {
  wp_register_style( 'menu_css3', plugins_url( 'menu_css3/less/style.php' ) );
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
  @height_l       :   '.esc_attr( get_option('width-l') ).';

  .cowgirl{
   width : '.esc_attr( get_option('width-l') ).';
  }
  ';
  file_put_contents(WP_PLUGIN_DIR . '/menu_css3/less/variables.less' , $less);
  //echo $_GET['page'];
?>
<div class="tabbable">


  <!-- Tabs -->
  <ul class="nav nav-tabs onglet">
    <li class="active"><a href="#tabr1" data-toggle="tab"><?php _e('Links Menu' , 'menu_css3'); ?></a></li>
    <li class=""><a href="#tabr2" data-toggle="tab"><?php _e('Background Menu' , 'menu_css3'); ?></a></li>
    <li class=""><a href="#tabr3" data-toggle="tab"><?php _e('Animation Hover' , 'menu_css3'); ?></a></li>
    <li class=""><a href="#tabr4" data-toggle="tab"><?php _e('Documentation' , 'menu_css3'); ?></a></li>
  </ul>
  <div id="drag-bloc">
  <div id="primary-navigation">
    <?php
    $defaults = array(
      'theme_location'  => '',
      'menu'            => '',
      'container'       => 'div',
      'container_class' => 'nav-menu',
      'container_id'    => '',
      'menu_class'      => '',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'depth'           => 3,
      'walker'          => ''
    );
    wp_nav_menu( $defaults );
    ?>
  </div>
  <span class="drag-me">
    <img src="https://cdn1.iconfinder.com/data/icons/free-mobile-icon-kit/20/Cursor_drag_arrow.png">
    <div class="toggle"></div>
  </span>
</div>

  <div class="tab-content container">
    <!-- Tabs 1 -->
    <div class="tab-pane tab-links active" id="tabr1">

      <h2><?php _e('Links Menu' , 'menu_css3'); ?></h2>
      <form class="form-l form form-horizontal" role="form" action="options.php" method="post" accept-charset="utf-8">
        <?php settings_fields( 'link-group' ); ?>
        
        <div class="col-8">
          <fieldset>

            <!-- <div class="form-group" style="height: 100px;">
              <div class="row">
                <div class="col-xs-2 label-block">
                  <label class="">Align Text</label>
                </div>
                <?php $left = (esc_attr( get_option('text-align-l') ) == 'left') ? ' checked' : ''?>
                <?php $center= (esc_attr( get_option('text-align-l') ) == 'center') ? ' checked' : ''?>
                <?php $right= (esc_attr( get_option('text-align-l') ) == 'right') ? ' checked' : ''?>
                <div class="col-xs-2 bloc-size-normal">
                  <div class="radio">
                    <label for="left">
                      Left
                      <input data-text="text-align" type="radio" name="text-align-l" id="text-align-left" value="left"<?php echo $left; ?>>
                    </label>
                  </div>
                  <div class="radio">
                    <label for="center">
                      Center
                      <input data-text="text-align" type="radio" name="text-align-l" id="text-align-center" value="center"<?php echo $center; ?>>
                    </label>
                  </div><div class="radio">
                    <label for="right">
                      Right
                      <input data-text="text-align" type="radio" name="text-align-l" id="text-align-right" value="right"<?php echo $right; ?>>
                    </label>
                  </div>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="Align you text here, this works with the width defined.<br> You can use the padding for more precise." data-html="true" 
                    data-original-title="mode">
                      Help
                  </button>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="height-l">Height </label>
                </div>
                <div class="col-xs-2 bloc-size-normal">
                  <input data-property="height" name="height-l" value="<?php echo esc_attr( get_option('height-l') ); ?>" id="height-l" type="text" class="form-control" placeholder="height">
                </div>
                <div class="col-xs-1 text-right">
                  <label class="control-label" for="height-unite-l">Unite: </label>
                </div>
                <div class="col-xs-1">
                  <?php $unite_percent = (esc_attr( get_option('height-unite-l') ) == '%') ? ' selected' : ''?>
                  <?php $unite_px = (esc_attr( get_option('height-unite-l') ) == 'px') ? ' selected' : ''?>
                  <select data-unite="unite" data-select="unite" name="height-unite-l" id="height-unite-l" class="form-control">
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

            <div class="form-group">
              <div class="row">
                <div class="col-xs-2 label-block">
                  <label class="control-label" for="width-l">Width</label>
                </div>
                <div class="col-xs-2 bloc-size-normal">
                  <input data-property="width" value="<?php echo esc_attr( get_option( 'width-l' ) ); ?>" type="text" name="width-l" id="width-l" class="form-control" placeholder="width">
                </div>
                <div class="col-xs-1 text-right">
                  <label class="control-label" for="width-unite-l">Unite: </label>
                </div>
                <div class="col-xs-1">
                  <?php $unite_percent = (esc_attr( get_option('width-unite-l') ) == '%') ? ' selected' : ''?>
                  <?php $unite_px = (esc_attr( get_option('width-unite-l') ) == 'px') ? ' selected' : ''?>
                  <select data-unite="unite" class="form-control" name="width-unite-l" id="width-unite-l" >
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
            -->
            <!-- line-height -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="line-height-l"><?php _e('Vertical Text' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-2 bloc-size-normal">
                  <input data-property="line-height" name="line-height-l" value="<?php echo esc_attr( get_option('line-height-l') ); ?>" id="line-height-l" type="text" class="form-control" placeholder="<?php _e('line-height' , 'menu_css3'); ?>">
                </div>
                <div class="col-xs-1 text-right">
                  <label class="control-label" for="width-unite-l"><?php _e('Unite: ' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-1">
                  <?php $unite_percent = (esc_attr( get_option('line-height-unite-l') ) == '%') ? ' selected' : ''?>
                  <?php $unite_px = (esc_attr( get_option('line-height-unite-l') ) == 'px') ? ' selected' : ''?>
                  <select data-unite="unite" data-select="unite" name="line-height-unite-l" id="line-height-unite-l" class="form-control">
                    <option<?php echo $unite_px; ?>>px</option>
                    <option<?php echo $unite_percent; ?>>%</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="" data-html="true" 
                    data-original-title="<?php _e('height' , 'menu_css3'); ?>" title="">
                      Help
                  </button>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="letter-spacing-l"><?php _e('Letter Spacing' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-2 bloc-size-normal">
                  <input data-property="letter-spacing" name="letter-spacing-l" value="<?php echo esc_attr( get_option('letter-spacing-l') ); ?>" id="letter-spacing-l" type="text" class="form-control" placeholder="<?php _e('letter-spacing' , 'menu_css3'); ?>">
                </div>
                <div class="col-xs-1 text-right">
                  <label class="control-label" for="width-unite-l"><?php _e('Unite: ' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-1">
                  <?php $unite_em = (esc_attr( get_option('letter-spacing-unite-l') ) == 'em') ? ' selected' : ''?>
                  <?php $unite_px = (esc_attr( get_option('letter-spacing-unite-l') ) == 'px') ? ' selected' : ''?>
                  <select data-unite="unite" data-select="unite" name="letter-spacing-unite-l" id="letter-spacing-unite-l" class="form-control">
                    <option<?php echo $unite_px; ?>>px</option>
                    <option<?php echo $unite_em; ?>>em</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="" data-html="true" 
                    data-original-title="<?php _e('height' , 'menu_css3'); ?>" title="">
                      Help
                  </button>
                </div>
              </div>
            </div>



            <!-- margin -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="margin-l"><?php _e('Margin ' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-top-l"></label>
                  <input data-property="margin-top" type="text" class="form-control" value="<?php echo esc_attr( get_option('margin-top-l') ); ?>" name="margin-top-l" id="margin-top-l" placeholder="<?php _e('top' , 'menu_css3'); ?>">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-right-l"></label>
                  <input data-property="margin-right" type="text" class="form-control" name="margin-right-l" value="<?php echo esc_attr( get_option('margin-right-l') ); ?>" id="margin-right-l" placeholder="<?php _e('right' , 'menu_css3'); ?>">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-bottom-l"></label>
                  <input data-property="margin-bottom" type="text" class="form-control" name="margin-bottom-l" value="<?php echo esc_attr( get_option('margin-bottom-l') ); ?>" id="margin-bottom-l" placeholder="<?php _e('bottom' , 'menu_css3'); ?>">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-left-l"></label>
                  <input data-property="margin-left" type="text" class="form-control" name="margin-left-l" value="<?php echo esc_attr( get_option('margin-left-l') ); ?>" id="margin-left-l" placeholder="<?php _e('left' , 'menu_css3'); ?>">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-unite-l">
                      <?php $unite_percent = (esc_attr( get_option('margin-unite-l') ) == '%') ? ' selected' : ''?>
                      <?php $unite_px = (esc_attr( get_option('margin-unite-l') ) == 'px') ? ' selected' : ''?>
                  </label>
                  <select data-unite="unite" class="form-control" name="margin-unite-l" id="margin-unite-l">
                    <option<?php echo $unite_percent; ?>>%</option>
                    <option<?php echo $unite_px; ?>>px</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="<?php _e('top' , 'menu_css3'); ?>" 
                    data-content="<?php _e('top | right | bottom | left' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('margin' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>

            <!-- padding-l -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="padding-l"><?php _e('Padding' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-top-l"></label>
                  <input data-property="padding-top" type="text" class="form-control" value="<?php echo esc_attr( get_option('padding-top-l') ); ?>" name="padding-top-l" id="padding-top-l" placeholder="<?php _e('top' , 'menu_css3'); ?>">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-right-l"></label>
                  <input data-property="padding-right" type="text" class="form-control" name="padding-right-l" value="<?php echo esc_attr( get_option('padding-right-l') ); ?>" id="padding-right-l" placeholder="<?php _e('right' , 'menu_css3'); ?>">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-bottom-l"></label>
                  <input data-property="padding-bottom" type="text" class="form-control" name="padding-bottom-l" value="<?php echo esc_attr( get_option('padding-bottom-l') ); ?>" id="padding-bottom-l" placeholder="<?php _e('bottom' , 'menu_css3'); ?>">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-left-l"></label>
                  <input data-property="padding-left" type="text" class="form-control" name="padding-left-l" value="<?php echo esc_attr( get_option('padding-left-l') ); ?>" id="padding-left-l" placeholder="<?php _e('left' , 'menu_css3'); ?>">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-unite-l">
                      <?php $unite_percent = (esc_attr( get_option('padding-unite-l') ) == '%') ? ' selected' : ''?>
                      <?php $unite_px = (esc_attr( get_option('padding-unite-l') ) == 'px') ? ' selected' : ''?>
                  </label>
                  <select data-unite="unite" class="form-control" name="padding-unite-l" id="padding-unite-l">
                    <option<?php echo $unite_percent; ?>>%</option>
                    <option<?php echo $unite_px; ?>>px</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('top | right | bottom | left' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('Padding' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>

            <!-- bgc link -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="col-md-12 control-label" for="bgc-1-l"><?php _e('Background Color' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-4 color">
                  <input data-gradient="gradient-1" value="<?php echo esc_attr( get_option('bgc-1-l') ); ?>" id="bgc-1-l" placeholder="color" name="bgc-1-l" class="form-control color" type="text">
                </div>
                <div class="col-xs-4 color">
                  <label class="hidden" for="bgc-2-l"> </label>
                  <input data-gradient="gradient-2" value="<?php echo esc_attr( get_option('bgc-2-l') ); ?>" id="bgc-2-l" placeholder="color" name="bgc-2-l" class="form-control color" type="text">
                </div>
                <div class="col-xs-2 help-color">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('the color for the background' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('color' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>

              <!-- border -->
              <div class="form-group">
                <div class="row">
                  <div class="label-block col-xs-2">
                    <label class="col-md-2 control-label" for="border-l"><?php _e('Border' , 'menu_css3'); ?></label>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="border-style-l">
                      <?php $selected = esc_attr( get_option('border-style-l') ); ?>
                    </label>
                    <select data-border="style" class="form-control" name="border-style-l" id="border-style-l">
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
                    <label class="hidden" for="border-size-l"> 
                      <?php $selected = esc_attr( get_option('border-size-l') ); ?>
                    </label>
                    <select data-border="width" class="form-control" name="border-size-l" id="border-size-l">
                      <option>size</option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'"'.$s.'>'.$i.'</option>';
                    } ?>
                    </select>
                  </div>
                  <div class="col-xs-2 bloc-size-normal color">
                    <input data-border="color" id="border-l" placeholder="border" value="<?php echo esc_attr( get_option('border-l') ); ?>" name="border-l" class="form-control" type="text">
                  </div>
                  
                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('order: border color | pixel width | line style <br> leave empty for put at none' , 'menu_css3'); ?>" data-html="true" 
                    title="<?php _e('Border' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
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
                    <label class="col-md-2 control-label" for="box"><?php _e('Shadow ' , 'menu_css3'); ?></label>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="box-shadow-horizontal-l">
                      <?php $selected = esc_attr( get_option('box-shadow-horizontal-l') ); ?>
                    </label>
                    <select data-shadow="horizontal" class="form-control" name="box-shadow-horizontal-l" id="box-shadow-horizontal-l">
                      <option>none<option>
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
                    <select data-shadow="vertical" class="form-control" name="box-shadow-vertical-l" id="box-shadow-vertical-l">
                      <option>none<option>
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
                    <select data-shadow="gradient" class="form-control" name="box-shadow-gradient-l" id="box-shadow-gradient-l">
                      <option>none<option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'"'.$s.'>'.$i.'</option>';
                    } ?>
                    </select>
                  </div>
                  <div class="col-xs-4 color">
                    <label class="hidden" for="box-shadow-color-l">
                      <?php $selected = esc_attr( get_option('box-shadow-color-l') ); ?>
                    </label>
                    <input data-shadow="color" value="<?php echo esc_attr( get_option('box-shadow-color-l') ); ?>" id="box-shadow-color-l" placeholder="color" name="box-shadow-color-l" class="form-control color" type="text">
                  </div>
                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                      data-content="<?php _e('horizontal | vertical | gradient | size' , 'menu_css3'); ?>" data-html="true" 
                      data-original-title="<?php _e('etc,..' , 'menu_css3'); ?>" title="<?php _e('box shadow' , 'menu_css3'); ?>">
                        <?php _e('Help' , 'menu_css3'); ?>
                    </button>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="label-block col-xs-2">
                    <label class="control-label" for="radius"><?php _e('Border Radius' , 'menu_css3'); ?></label>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-top-left-l"> </label>
                    <input data-property="border-top-left-radius" value="<?php echo esc_attr( get_option('radius-top-left-l') ); ?>" type="text" class="form-control" name="radius-top-left-l" id="radius-top-left-l" placeholder="top left">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-top-right-l"> </label>
                    <input data-property="border-top-right-radius" value="<?php echo esc_attr( get_option('radius-top-right-l') ); ?>" type="text" class="form-control" name="radius-top-right-l" id="radius-top-left-l" placeholder="top right">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-bottom-right-l"> </label>
                    <input data-property="border-bottom-right-radius" value="<?php echo esc_attr( get_option('radius-bottom-right-l') ); ?>" type="text" class="form-control" name="radius-bottom-right-l" id="radius-bottom-right-l" placeholder="bottom right">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-bottom-left-l"> </label>
                    <input data-property="border-bottom-left-radius" value="<?php echo esc_attr( get_option('radius-bottom-left-l') ); ?>" type="text" class="form-control" name="radius-bottom-left-l" id="radius-bottom-left-l" placeholder="bottom left">
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
                      data-content="<?php _e('top left | top right | bottom right | bottom left' , 'menu_css3'); ?>" data-html="true" 
                      data-original-title="<?php _e('border radius' , 'menu_css3'); ?>"> 
                        <?php _e('Help' , 'menu_css3'); ?>
                    </button>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="label-block col-xs-2">
                    <label class="control-label" for="opacity-l"><?php _e('Opacity' , 'menu_css3'); ?></label>
                  </div>
                  <div class="col-xs-1">
                    <input data-property="opacity" value="<?php echo esc_attr( get_option('opacity-l') ); ?>" type="text" class="form-control" name="opacity-l" id="opacity-l">
                  </div>

                  <div class="col-xs-4" id="slider-l"></div> 

                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                      data-content="<?php _e('in percent' , 'menu_css3'); ?> " data-html="true" 
                      data-original-title="<?php _e('background opacity' , 'menu_css3'); ?>">
                        <?php _e('Help' , 'menu_css3'); ?>
                    </button>
                  </div>
                </div>
              </div>

            <!-- color link -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="col-md-12 control-label" for="color-l"><?php _e('Color' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-4 color">
                  <input data-text="color" value="<?php echo esc_attr( get_option('color-l') ); ?>" id="color-l" placeholder="color" name="color-l" class="form-control color" type="text">
                </div>
                <div class="col-xs-2 help-color">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('the color for the background' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('color' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>
                
            <!-- Fonts -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <div class="hidden hide-fonts"> 
                    <?php echo esc_attr( get_option('fonts-l') ); ?>
                  </div>
                  <label class="col-md-12 control-label" for="fonts-l"><?php _e('Fonts' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-4 fonts">
                  <select id="fonts-l" name="fonts-l">
                    <optgroup id="classique" label="Font Classique">
                      <option value="arial">Arial </option>
                      <option value="Times New Roman">Times New Roman</option>
                      <option value="Times">Times</option>
                      <option value="Helvetica">Helvetica</option>
                      <option value="Arial Black">Arial Black</option>
                      <option value="Comic Sans MS">Comic Sans MS</option>
                      <option value="Lucida Grande">Lucida Grande</option>
                      <option value="Tahoma">Tahoma</option>
                      <option value="Geneva">Geneva</option>
                      <option value="Trebuchet MS">Trebuchet MS</option>
                      <option value="Helvetica">Helvetica</option>
                      <option value="Verdana">Verdana</option>
                      <option value="Geneva">Geneva</option>
                      <option value="Courier New">Courier New</option>
                      <option value="Courier">Courier</option>
                      <option value="Lucida Console">Lucida Console</option>
                      <option value="Monaco">Monaco</option>
                      <option value="Georgia, serif">Georgia, serif </option>
                      <option value="Palatino Linotype">Palatino Linotype </option>
                    </optgroup>
                    <optgroup id="google" label="Google Fonts">
                    </optgroup>
                  </select>
                </div>
                <div class="col-xs-2 help-color">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('675 fonts are avalaible' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('color' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div> <!-- End fonts -->

            <!-- font size -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="font-size-l"><?php _e('Font Size' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-2 bloc-size-normal">
                  <input data-property="font-size" name="font-size-l" value="<?php echo esc_attr( get_option('font-size-l') ); ?>" id="font-size-l" type="text" class="form-control" placeholder="font-size">
                </div>
                <div class="col-xs-1 text-right">
                  <label class="control-label" for="font-size-unite-l"><?php _e('Unite: ' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-1">
                  <?php $unite_em = (esc_attr( get_option('font-size-unite-l') ) == 'em') ? ' selected' : ''?>
                  <?php $unite_px = (esc_attr( get_option('font-size-unite-l') ) == 'px') ? ' selected' : ''?>
                  <select data-unite="unite" data-select="unite" name="font-size-unite-l" id="font-size-unite-l" class="form-control">
                    <option<?php echo $unite_em; ?>>em</option>
                    <option<?php echo $unite_px; ?>>px</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('etc..' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('font-size for your font' , 'menu_css3'); ?>" title="<?php _e('etc..' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>

            <div class="form-group" style="margin-top: 6%;">
              <div class="row">
                <div class="col-xs-2 label-block">
                  <label><?php _e('Style Variant' , 'menu_css3'); ?></label>
                </div>
                <?php $small_caps= (esc_attr( get_option('style-variant-l') ) == 'small-caps') ? ' checked' : ''?>
                <?php $normal = (esc_attr( get_option('style-variant-l') ) == 'normal') ? ' checked' : ''?>
                <div class="col-xs-2 bloc-size-normal">
                  <div class="radio">
                    <label for="variant-normal-l">
                      <?php _e('Normal' , 'menu_css3'); ?>
                      <input data-variant="text-align" type="radio" name="style-variant-l" id="variant-normal-l" value="normal"<?php echo $normal; ?>>
                    </label>
                  </div>
                  <div class="radio">
                    <label for="small-caps-l">
                      <?php _e('Small Caps' , 'menu_css3'); ?>
                      <input data-variant="text-align" type="radio" name="style-variant-l" id="small-caps-l" value="small-caps"<?php echo $small_caps; ?>>
                    </label>
                  </div>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('font variant' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('Mode Style Variant' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>


            <div class="form-group" style="margin-top: 6%;">
              <div class="row">
                <div class="col-xs-2 label-block">
                  <label><?php _e('Font Weight' , 'menu_css3'); ?></label>
                </div>
                <?php $bold = (esc_attr( get_option('font-weight-l') ) == 'bold') ? ' checked' : ''?>
                <?php $normal = (esc_attr( get_option('font-weight-l') ) == 'normal') ? ' checked' : ''?>
                <div class="col-xs-2 bloc-size-normal">
                  <div class="radio">
                    <label for="weight-normal-l">
                      <?php _e('Normal' , 'menu_css3'); ?>
                      <input data-weight="normal" type="radio" name="font-weight-l" id="weight-normal-l" value="normal"<?php echo $normal; ?>>
                    </label>
                  </div>
                  <div class="radio">
                    <label for="bold-l">
                      <?php _e('Bold' , 'menu_css3'); ?>
                      <input data-weight="bold" type="radio" name="font-weight-l" id="bold-l" value="bold"<?php echo $bold; ?>>
                    </label>
                  </div>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('font variant' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('Mode font-weight' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>

            <div class="form-group" style="margin-top: 6%;">
              <div class="row">
                <div class="col-xs-2 label-block">
                  <label><?php _e('Font Style' , 'menu_css3'); ?></label>
                </div>
                <?php $italic = (esc_attr( get_option('font-style-l') ) == 'italic') ? ' checked' : ''?>
                <?php $normal = (esc_attr( get_option('font-style-l') ) == 'normal') ? ' checked' : ''?>
                <div class="col-xs-2 bloc-size-normal">
                  <div class="radio">
                    <label for="style-normal-l">
                      <?php _e('Normal' , 'menu_css3'); ?>
                      <input data-style="normal" type="radio" name="font-style-l" id="style-normal-l" value="normal"<?php echo $normal; ?>>
                    </label>
                  </div>
                  <div class="radio">
                    <label for="italic-l">
                      <?php _e('Italic' , 'menu_css3'); ?>
                      <input data-style="italic" type="radio" name="font-style-l" id="italic-l" value="italic"<?php echo $italic; ?>>
                    </label>
                  </div>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('font variant' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('Mode font-style' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>

            <div class="form-group" style="margin-top: 6%;">
              <div class="row">
                <div class="col-xs-2 label-block">
                  <label><?php _e('Transform' , 'menu_css3'); ?></label>
                </div>
                <?php $capitalize = (esc_attr( get_option('transform-l') ) == 'capitalize') ? ' checked' : ''?>
                <?php $uppercase = (esc_attr( get_option('transform-l') ) == 'uppercase') ? ' checked' : ''?>
                <?php $lowercase = (esc_attr( get_option('transform-l') ) == 'lowercase') ? ' checked' : ''?>
                <?php $none = (esc_attr( get_option('transform-l') ) == 'none') ? ' checked' : ''?>
                <div class="col-xs-2 bloc-size-normal">
                  <div class="radio">
                    <label for="capitalize-l">
                      <?php _e('Abc' , 'menu_css3'); ?>
                      <input data-transform="capitalize" type="radio" name="transform-l" id="capitalize-l" value="capitalize"<?php echo $capitalize; ?>>
                    </label>
                  </div>
                  <div class="radio">
                    <label for="uppercase-l">
                      <?php _e('ABC' , 'menu_css3'); ?>
                      <input data-transform="uppercase" type="radio" name="transform-l" id="uppercase-l" value="uppercase"<?php echo $uppercase; ?>>
                    </label>
                  </div>
                  <div class="radio">
                    <label for="lowercase-l">
                      <?php _e('abc' , 'menu_css3'); ?>
                      <input data-transform="lowercase" type="radio" name="transform-l" id="lowercase-l" value="lowercase"<?php echo $lowercase; ?>>
                    </label>
                  </div>
                  <div class="radio">
                    <label for="none-l">
                      <?php _e('None' , 'menu_css3'); ?>
                      <input data-transform="none" type="radio" name="transform-l" id="none-l" value="none"<?php echo $none; ?>>
                    </label>
                  </div>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('font variant' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('Mode font-style' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>

          </fieldset>
        </div>

        <button type="submit" name="panel_update" data-loading-text="Loading..." class="btn btn-primary">
          <?php _e('Save Change' , 'menu_css3'); ?> &rarr;
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
    <div class="tab-pane tab-bgc " id="tabr2">
      <h2>Background</h2>
      <form class="form-bgc form form-horizontal" role="form" action="options.php" method="post" accept-charset="utf-8">
        <?php settings_fields( 'background-group' ); ?>
        
        <div class="col-8">
          <fieldset>

            <!-- Multiple Radios (inline) -->

              <!-- height -->
          <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="height-bgc"><?php _e('Height ' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-2 bloc-size-normal">
                  <input data-property="height" name="height-bgc" value="<?php echo esc_attr( get_option('height-bgc') ); ?>" id="height-bgc" type="text" class="form-control" placeholder="height">
                </div>
                <div class="col-xs-1 text-right">
                  <label class="control-label" for="height-unite-bgc"><?php _e('Unite: ' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-1">
                  <?php $unite_percent = (esc_attr( get_option('height-unite-bgc') ) == '%') ? ' selected' : ''?>
                  <?php $unite_px = (esc_attr( get_option('height-unite-bgc') ) == 'px') ? ' selected' : ''?>
                  <select data-unite="unite" name="height-unite-bgc" id="height-unite-bgc" class="form-control">
                    <option<?php echo $unite_percent; ?>>%</option>
                    <option<?php echo $unite_px; ?>>px</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('etc, .' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('height' , 'menu_css3'); ?>" title="<?php _e('etc, .' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>

            <!-- width -->
            <div class="form-group">
              <div class="row">
                <div class="col-xs-2 label-block">
                  <label class="control-label" for="width-bgc"><?php _e('Width' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-2 bloc-size-normal">
                  <input data-property="width" value="<?php echo esc_attr( get_option( 'width-bgc' ) ); ?>" type="text" name="width-bgc" id="width-bgc" class="form-control" placeholder="width">
                </div>
                <div class="col-xs-1 text-right">
                  <label class="control-label" for="width-unite-bgc"><?php _e('Unite: ' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-1">
                  <?php $unite_percent = (esc_attr( get_option('width-unite-bgc') ) == '%') ? ' selected' : ''?>
                  <?php $unite_px = (esc_attr( get_option('width-unite-bgc') ) == 'px') ? ' selected' : ''?>
                  <select data-unite="unite" class="form-control" name="width-unite-bgc" id="width-unite-bgc" >
                    <option<?php echo $unite_percent; ?>>%</option>
                    <option<?php echo $unite_px; ?>>px</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('etc, .' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('width for set a menu horizontal leave empty this parameter, but you can precise your value, try it.' , 'menu_css3'); ?>"> 
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>

            <!-- margin -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="margin-bgc"><?php _e('Margin ' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-top-bgc"></label>
                  <input data-property="margin-top" type="text" class="form-control" value="<?php echo esc_attr( get_option('margin-top-bgc') ); ?>" name="margin-top-bgc" id="margin-top-bgc" placeholder="top">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-right-bgc"></label>
                  <input data-property="margin-right" type="text" class="form-control" name="margin-right-bgc" value="<?php echo esc_attr( get_option('margin-right-bgc') ); ?>" id="margin-right-bgc" placeholder="right">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-bottom-bgc"></label>
                  <input data-property="margin-bottom" type="text" class="form-control" name="margin-bottom-bgc" value="<?php echo esc_attr( get_option('margin-bottom-bgc') ); ?>" id="margin-bottom-bgc" placeholder="bottom">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-left-bgc"></label>
                  <input data-property="margin-left" type="text" class="form-control" name="margin-left-bgc" value="<?php echo esc_attr( get_option('margin-left-bgc') ); ?>" id="margin-left-bgc" placeholder="left">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="margin-unite-bgc">
                      <?php $unite_percent = (esc_attr( get_option('margin-unite-bgc') ) == '%') ? ' selected' : ''?>
                      <?php $unite_px = (esc_attr( get_option('margin-unite-bgc') ) == 'px') ? ' selected' : ''?>
                  </label>
                  <select data-unite="unite" class="form-control" name="margin-unite-bgc" id="margin-unite-bgc">
                    <option<?php echo $unite_percent; ?>>%</option>
                    <option<?php echo $unite_px; ?>>px</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('top | right | bottom | left' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('margin' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="control-label" for="padding-bgc"><?php _e('Padding' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-top-bgc"></label>
                  <input data-property="padding-top" type="text" class="form-control" value="<?php echo esc_attr( get_option('padding-top-bgc') ); ?>" name="padding-top-bgc" id="padding-top-bgc" placeholder="top">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-right-bgc"></label>
                  <input data-property="padding-right" type="text" class="form-control" name="padding-right-bgc" value="<?php echo esc_attr( get_option('padding-right-bgc') ); ?>" id="padding-right-bgc" placeholder="right">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-bottom-bgc"></label>
                  <input data-property="padding-bottom" type="text" class="form-control" name="padding-bottom-bgc" value="<?php echo esc_attr( get_option('padding-bottom-bgc') ); ?>" id="padding-bottom-bgc" placeholder="bottom">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-left-bgc"></label>
                  <input data-property="padding-left" type="text" class="form-control" name="padding-left-bgc" value="<?php echo esc_attr( get_option('padding-left-bgc') ); ?>" id="padding-left-bgc" placeholder="left">
                </div>
                <div class="col-xs-1">
                  <label class="hidden" for="padding-unite-bgc">
                      <?php $unite_percent = (esc_attr( get_option('padding-unite-bgc') ) == '%') ? ' selected' : ''?>
                      <?php $unite_px = (esc_attr( get_option('padding-unite-bgc') ) == 'px') ? ' selected' : ''?>
                  </label>
                  <select data-unite="unite" class="form-control" name="padding-unite-bgc" id="padding-unite-bgc">
                    <option<?php echo $unite_percent; ?>>%</option>
                    <option<?php echo $unite_px; ?>>px</option>
                  </select>
                </div>
                <div class="col-xs-1">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('top | right | bottom | left' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('Padding' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>
            <!-- bgc -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="col-md-12 control-label" for="bgc-1-bgc"><?php _e('Background Color' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-4 color">
                  <input data-gradient="gradient-1" value="<?php echo esc_attr( get_option('bgc-1-bgc') ); ?>" id="bgc-1-bgc" placeholder="color" name="bgc-1-bgc" class="form-control color" type="text">
                </div>
                <div class="col-xs-4 color">
                  <label class="hidden" for="bgc-2-bgc"> </label>
                  <input data-gradient="gradient-2" value="<?php echo esc_attr( get_option('bgc-2-bgc') ); ?>" id="bgc-2-bgc" placeholder="color" name="bgc-2-bgc" class="form-control color" type="text">
                </div>
                <div class="col-xs-2 help-color">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('the color for the background' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('color' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>

              <!-- border -->

              <div class="form-group">
                <div class="row">
                  <div class="label-block col-xs-2">
                    <label class="col-md-2 control-label" for="border-bgc"><?php _e('Border' , 'menu_css3'); ?></label>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="border-style-bgc">
                      <?php $selected = esc_attr( get_option('border-style-bgc') ); ?>
                    </label>
                    <select data-border="style" class="form-control" name="border-style-bgc" id="border-style-bgc">
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
                    <label class="hidden" for="border-size-bgc"> 
                      <?php $selected = esc_attr( get_option('border-size-bgc') ); ?>
                    </label>
                    <select data-border="width" class="form-control" name="border-size-bgc" id="border-size-bgc">
                      <option>size</option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'px"'.$s.'>'.$i.'</option>';
                    } ?>
                    </select>
                  </div>
                  <div class="col-xs-2 bloc-size-normal color">
                    <input data-border="color" id="border-bgc" placeholder="border" value="<?php echo esc_attr( get_option('border-bgc') ); ?>" name="border-bgc" class="form-control" type="text">
                  </div>
                  
                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('order: border color | pixel width | line style <br> leave empty for put at none' , 'menu_css3'); ?>" data-html="true" 
                    title="<?php _e('Border' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
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
                    <label class="col-md-2 control-label" for="box"><?php _e('Shadow ' , 'menu_css3'); ?></label>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="box-shadow-horizontal-bgc">
                      <?php $selected = esc_attr( get_option('box-shadow-horizontal-bgc') ); ?>
                    </label>
                    <select data-shadow="horizontal" class="form-control" name="box-shadow-horizontal-bgc" id="box-shadow-horizontal-bgc">
                      <option>none<option>
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
                    <select data-shadow="vertical" class="form-control" name="box-shadow-vertical-bgc" id="box-shadow-vertical-bgc">
                      <option>none<option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'"'.$s.'>'.$i.'</option>';
                    } ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="box-shadow-gradient-bgc">
                      <?php $selected = esc_attr( get_option('box-shadow-gradient-bgc') ); ?>
                    </label>
                    <select data-shadow="gradient" class="form-control" name="box-shadow-gradient-bgc" id="box-shadow-gradient-bgc">
                      <option>none<option>
                    <?php for ($i = 1; $i <= 20; $i++) {
                      $s = ( $i ==  $selected ) ? ' selected' : '';
                      echo '<option value="'.$i.'"'.$s.'>'.$i.'</option>';
                    } ?>
                    </select>
                  </div>

                  <div class="col-xs-4 color">
                    <label class="hidden" for="box-shadow-color-bgc">
                      <?php $selected = esc_attr( get_option('box-shadow-color-bgc') ); ?>
                    </label>
                    <input data-shadow="color" value="<?php echo esc_attr( get_option('box-shadow-color-bgc') ); ?>" id="box-shadow-color-bgc" placeholder="color" name="box-shadow-color-bgc" class="form-control color" type="text">
                  </div>
                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                      data-content="<?php _e('horizontal | vertical | gradient | color' , 'menu_css3'); ?>" data-html="true" 
                      data-original-title="" title="<?php _e('box shadow' , 'menu_css3'); ?>">
                        <?php _e('Help' , 'menu_css3'); ?>
                    </button>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="label-block col-xs-2">
                    <label class="control-label" for="radius"><?php _e('Border Radius' , 'menu_css3'); ?></label>
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-top-left-bgc"> </label>
                    <input data-property="border-top-left-radius" value="<?php echo esc_attr( get_option('radius-top-left-bgc') ); ?>" type="text" class="form-control" name="radius-top-left-bgc" id="radius-top-left-bgc" placeholder="top left">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-top-right-bgc"> </label>
                    <input data-property="border-top-right-radius" value="<?php echo esc_attr( get_option('radius-top-right-bgc') ); ?>" type="text" class="form-control" name="radius-top-right-bgc" id="radius-top-left-bgc" placeholder="top right">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-bottom-right-bgc"> </label>
                    <input data-property="border-bottom-right-radius" value="<?php echo esc_attr( get_option('radius-bottom-right-bgc') ); ?>" type="text" class="form-control" name="radius-bottom-right-bgc" id="radius-bottom-right-bgc" placeholder="bottom right">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-bottom-left-bgc"> </label>
                    <input data-property="border-bottom-left-radius" value="<?php echo esc_attr( get_option('radius-bottom-left-bgc') ); ?>" type="text" class="form-control" name="radius-bottom-left-bgc" id="radius-bottom-left-bgc" placeholder="bottom left">
                  </div>
                  <div class="col-xs-1">
                    <label class="hidden" for="radius-unite-bgc"> 
                      <?php $unite_percent = (esc_attr( get_option('radius-unite-bgc') ) == '%') ? ' selected' : ''?>
                      <?php $unite_px = (esc_attr( get_option('radius-unite-bgc') ) == 'px') ? ' selected' : ''?>
                    </label>
                    <select data-unite="unite" name="radius-unite-bgc" class="form-control" id="radius-unite-bgc">
                      <option<?php echo $unite_percent; ?>>%</option>
                      <option<?php echo $unite_px; ?>>px</option>
                    </select>
                  </div>
                  <div class="col-xs-1 abbr">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                      data-content="<?php _e('top left | top right | bottom right | bottom left' , 'menu_css3'); ?>" data-html="true" 
                      data-original-title="<?php _e('border radius' , 'menu_css3'); ?>"> 
                        <?php _e('Help' , 'menu_css3'); ?>
                    </button>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="label-block col-xs-2">
                    <label class="control-label" for="opacity-bgc"><?php _e('Opacity' , 'menu_css3'); ?></label>
                  </div>
                  <div class="col-xs-1">
                    <input data-property="opacity" value="<?php echo esc_attr( get_option('opacity-bgc') ); ?>" type="text" class="form-control" name="opacity-bgc" id="opacity-bgc">
                  </div>

                  <div class="col-xs-4" id="slider"></div> 

                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                      data-content="<?php _e('opacity in percent' , 'menu_css3'); ?>" data-html="true" 
                      data-original-title="<?php _e('background opacity' , 'menu_css3'); ?>">
                        <?php _e('Help' , 'menu_css3'); ?>
                    </button>
                  </div>
                </div>
              </div>
                
            </fieldset>


            <fieldset>
              <h2>Position & display</h2>

              <div class="form-group" style="margin-top: 6%;">
                <div class="row">
                  <div class="col-xs-2 label-block">
                    <label><?php _e('Position' , 'menu_css3'); ?></label>
                  </div>
                  <?php $left_pos = (esc_attr( get_option('pos-bgc') ) == 'left') ? ' checked' : ''?>
                  <?php $center_pos = (esc_attr( get_option('pos-bgc') ) == 'center') ? ' checked' : ''?>
                  <?php $right_pos = (esc_attr( get_option('pos-bgc') ) == 'right') ? ' checked' : ''?>
                  <div class="col-xs-2 bloc-size-normal">
                    <div class="radio">
                      <label for="left-pos-bgc">
                        <?php _e('Left' , 'menu_css3'); ?>
                        <input data-position="left" type="radio" name="pos-bgc" id="left-pos-bgc" value="left"<?php echo $left_pos; ?>>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-2 bloc-size-normal">
                    <div class="radio">
                      <label for="center-pos-bgc">
                        <?php _e('Center' , 'menu_css3'); ?>
                        <input data-position="center" type="radio" name="pos-bgc" id="center-pos-bgc" value="center"<?php echo $center_pos; ?>>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-2 bloc-size-normal">
                    <div class="radio">
                      <label for="right-pos-bgc">
                        <?php _e('Right' , 'menu_css3'); ?>
                        <input data-position="right" type="radio" name="pos-bgc" id="right-pos-bgc" value="right"<?php echo $right_pos; ?>>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                      data-content="<?php _e('etc, .' , 'menu_css3'); ?>" data-html="true" 
                      data-original-title="<?php _e('You can use this position if you menu is fixed' , 'menu_css3'); ?>">
                        <?php _e('Help' , 'menu_css3'); ?>
                    </button>
                  </div>
                </div>
              </div>
              <!--
              <div class="form-group" style="margin-top: 6%;">
                <div class="row">
                  <div class="col-xs-2 label-block">
                    <label>Display Hook</label>
                  </div>
                  <?php $scroll_pos= (esc_attr( get_option('display-hook-bgc') ) == '') ? ' checked' : ''?>
                  <?php $fixed_pos= (esc_attr( get_option('display-hook-bgc') ) == '') ? ' checked' : ''?>
                  <div class="col-xs-2 bloc-size-normal">
                    <div class="radio">
                      <label for="scroll-bgc">
                        Scroll
                        <input data-displaypos="relative" type="radio" name="display-hook-bgc" id="scroll-bgc" value="relative"<?php echo $scroll_pos; ?>>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-2 bloc-size-normal">
                    <div class="radio">
                      <label for="fixed-bgc">
                        Fixed
                        <input data-displaypos="fixed" type="radio" name="display-hook-bgc" id="fixed-bgc" value="fixed"<?php echo $fixed_pos; ?>>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                      data-content="" data-html="true" 
                      data-original-title="">
                        Help
                    </button>
                  </div>
                </div>
              </div>
              -->

              <div class="form-group" style="margin-top: 6%;">
                <div class="row">
                  <div class="col-xs-2 label-block">
                    <label><?php _e('Display ' , 'menu_css3'); ?>Nav</label>
                  </div>
                  <?php $vertical_pos = (esc_attr( get_option('sens-pos-bgc') ) == '') ? ' checked' : ''?>
                  <?php $horisontal_pos = (esc_attr( get_option('sens-pos-bgc') ) == '') ? ' checked' : ''?>
                  <div class="col-xs-2 bloc-size-normal">
                    <div class="radio">
                      <label for="vertical-sens-bgc">
                        <?php _e('Vertical' , 'menu_css3'); ?>
                        <input data-senspos="vertical" type="radio" name="sens-pos-bgc" id="vertical-sens-bgc" value="vertical"<?php echo $vertical_pos; ?>>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-2 bloc-size-normal">
                    <div class="radio">
                      <label for="horizontal-sens-bgc">
                        <?php _e('Horizontal' , 'menu_css3'); ?>
                        <input data-senspos="horizontal" type="radio" name="sens-pos-bgc" id="horizontal-sens-bgc" value="horizontal"<?php echo $horisontal_pos; ?>>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-1">
                    <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                      data-content="<?php _e('etc, .' , 'menu_css3'); ?>" data-html="true" 
                      data-original-title="<?php _e('etc, .' , 'menu_css3'); ?>">
                        <?php _e('Help' , 'menu_css3'); ?>
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
    <div class="tab-pane tab-animate " id="tabr3">
      <h2><?php _e('Animation' , 'menu_css3'); ?></h2>
      <form class="form-a form form-horizontal" role="form" action="options.php" method="post" accept-charset="utf-8">
        <?php settings_fields( 'animate-group' ); ?>

        <div class="col-8">
          <fieldset>

            <!-- hover color -->
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="col-md-12 control-label" for="color-text-a"><?php _e('color' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-4 color">
                  <input data-property="color" value="<?php echo esc_attr( get_option('color-text-a') ); ?>" id="color-text-a" placeholder="color" name="color-text-a" class="form-control color" type="text">
                </div>
                <div class="col-xs-2 help-color">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('the text color' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('color' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="col-md-12 control-label" for="bgc-1-a"><?php _e('Background Color' , 'menu_css3'); ?></label>
                </div>
                <div class="col-xs-4 color">
                  <input data-gradient="gradient-1" value="<?php echo esc_attr( get_option('bgc-1-a') ); ?>" id="bgc-1-a" placeholder="color" name="bgc-1-a" class="form-control color" type="text">
                </div>
                <div class="col-xs-4 color">
                  <label class="hidden" for="bgc-2-a"> </label>
                  <input data-gradient="gradient-2" value="<?php echo esc_attr( get_option('bgc-2-a') ); ?>" id="bgc-2-a" placeholder="color" name="bgc-2-a" class="form-control color" type="text">
                </div>
                <div class="col-xs-2 help-color">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="<?php _e('the color for the background' , 'menu_css3'); ?>" data-html="true" 
                    data-original-title="<?php _e('color' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
              </div>
            </div>
            <!--
            <div class="form-group">
              <div class="row">
                <div class="label-block col-xs-2">
                  <label class="col-md-12 control-label" for="time-a">Animate Time</label>
                </div>
                <div class="col-xs-4 ">
                  <input data-animate="" value="<?php echo esc_attr( get_option('time-a') ); ?>" id="time-a" placeholder="timer" name="time-a" class="form-control " type="text">
                </div>
                <div class="col-xs-2 help-color">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="the duration for the animate in millisecond" data-html="true" 
                    data-original-title="color">
                      Help
                  </button>
                </div>
              </div>
            </div>
            -->

            <br>

            <div id="effects">
              
              <h2>
                <div class="help-effect">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top"  
                    data-content="<?php _e('etc, .' , 'menu_css3'); ?>" data-html="true" 
                      data-original-title="<?php _e('etc, .' , 'menu_css3'); ?>">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
                <span><?php _e('Transforms' , 'menu_css3'); ?></span> 
              </h2>
              <a data-animate="grow" rel="grow" class="button grow"><?php _e('Grow' , 'menu_css3'); ?></a>
              <a data-animate="shrink" rel="shrink" class="button shrink"><?php _e('Shrink' , 'menu_css3'); ?></a>
              <a data-animate="pulse" rel="pulse" class="button pulse"><?php _e('Pulse' , 'menu_css3'); ?></a>
              <a data-animate="pulse-grow" rel="pulse-grow" class="button pulse-grow"><?php _e('Pulse Grow' , 'menu_css3'); ?></a>
              <a data-animate="pulse-shrink" rel="pulse-shrink" class="button pulse-shrink"><?php _e('Pulse Shrink' , 'menu_css3'); ?></a>
              <a data-animate="pulse-shrink" rel="push" class="button push"><?php _e('Push' , 'menu_css3'); ?></a>
              <a data-animate="pop" rel="pop" class="button pop"><?php _e('Pop' , 'menu_css3'); ?></a>
              <a data-animate="rotate" rel="rotate" class="button rotate"><?php _e('Rotate' , 'menu_css3'); ?></a>
              <a data-animate="grow-rotate" rel="grow-rotate" class="button grow-rotate"><?php _e('Grow Rotate' , 'menu_css3'); ?></a>
              <a data-animate="float" rel="float" class="button float"><?php _e('Float' , 'menu_css3'); ?></a>
              <a data-animate="sink" rel="sink" class="button sink"><?php _e('Sink' , 'menu_css3'); ?></a>
              <a data-animate="hover" rel="hover" class="button hover"><?php _e('Hover' , 'menu_css3'); ?></a>
              <a data-animate="hang" rel="hang" class="button hang"><?php _e('Hang' , 'menu_css3'); ?></a>
              <a data-animate="skew" rel="skew" class="button skew"><?php _e('Skew' , 'menu_css3'); ?></a>
              <a data-animate="skew-forward" rel="skew-forward" class="button skew-forward"><?php _e('Skew Forward' , 'menu_css3'); ?></a>
              <a data-animate="skew-backward" rel="skew-backward" class="button skew-backward"><?php _e('Skew Backward' , 'menu_css3'); ?></a>
              <a data-animate="wobble-horizontal" rel="wobble-horizontal" class="button wobble-horizontal"><?php _e('Wobble Horizontal' , 'menu_css3'); ?></a>
              <a data-animate="wobble-vertical" rel="wobble-vertical" class="button wobble-vertical"><?php _e('Wobble Vertical' , 'menu_css3'); ?></a>
              <a data-animate="wobble-to-bottom-right" rel="wobble-to-bottom-right" class="button wobble-to-bottom-right"><?php _e('Wobble To Bottom Right' , 'menu_css3'); ?></a>
              <a data-animate="wobble-to-top-right" rel="wobble-to-top-right" class="button wobble-to-top-right"><?php _e('Wobble To Top Right' , 'menu_css3'); ?></a>
              <a data-animate="wobble-top" rel="wobble-top" class="button wobble-top"><?php _e('Wobble Top' , 'menu_css3'); ?></a>
              <a data-animate="wobble-bottom" rel="wobble-bottom" class="button wobble-bottom"><?php _e('Wobble Bottom' , 'menu_css3'); ?></a>
              <a data-animate="wobble-skew" rel="wobble-skew" class="button wobble-skew"><?php _e('Wobble Skew' , 'menu_css3'); ?></a>
              <a data-animate="buzz" rel="buzz" class="button buzz"><?php _e('Buzz' , 'menu_css3'); ?></a>
              <a data-animate="buzz-out" rel="buzz-out" class="button buzz-out"><?php _e('Buzz Out' , 'menu_css3'); ?></a>



              <h2>
                <div class="help-effect">
                  <button class="<?php _e('help-block' , 'menu_css3'); ?>" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top"  
                    data-content="<?php _e('Animation wwwww' , 'menu_css3'); ?>" data-html="true" data-original-title="mode">
                      <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
                <span><?php _e('Border' , 'menu_css3'); ?></span> 
              </h2>

              <a data-animate="border-fade" rel="border-fade" class="button border-fade"><?php _e('Border Fade' , 'menu_css3'); ?></a>
              <a data-animate="hollow" rel="hollow" class="button hollow"><?php _e('Hollow' , 'menu_css3'); ?></a>
              <a data-animate="trim" rel="trim" class="button trim"><?php _e('Trim' , 'menu_css3'); ?></a>
              <a data-animate="outline-outward" rel="outline-outward" class="button outline-outward"><?php _e('Outline Outward' , 'menu_css3'); ?></a>
              <a data-animate="outline-inward" rel="outline-inward" class="button outline-inward"><?php _e('Outline Inward' , 'menu_css3'); ?></a>
              <a data-animate="round-corners" rel="round-corners" class="button round-corners"><?php _e('Round Corners' , 'menu_css3'); ?></a>


              <h2>
                <div class="help-effect">
                  <button class="help-block" type="button" class="btn btn-default" data-container="body" 
                  data-toggle="popover" data-placement="top"  
                  data-content="<?php _e('Animation wwwww' , 'menu_css3'); ?>" data-html="true" data-original-title="<?php _e('mode' , 'menu_css3'); ?>">
                    <?php _e('Help' , 'menu_css3'); ?>
                </button>
              </div>
              <span><?php _e('Shadow and Glow Transition' , 'menu_css3'); ?></span> 
            </h2>
            <a data-animate="glow" rel="glow">ow" class="button gl<?php _e('Glow' , 'menu_css3'); ?></a>
            <a data-animate="box-shadow-outset" rel="box-shadow-outset" class="button box-shadow-outset"><?php _e('Box Shadow Outset' , 'menu_css3'); ?></a>
            <a data-animate="box-shadow-inset" rel="box-shadow-inset" class="button box-shadow-inset"><?php _e('Box Shadow Inset' , 'menu_css3'); ?></a>
            <a data-animate="float-shadow" rel="float-shadow" class="button float-shadow"><?php _e('Float Shadow' , 'menu_css3'); ?></a>
            <a data-animate="hover-shadow" rel="hover-shadow" class="button hover-shadow"><?php _e('Hover Shadow' , 'menu_css3'); ?></a>
            <a data-animate="shadow-radial" rel="shadow-radial" class="button shadow-radial"><?php _e('Shadow Radial' , 'menu_css3'); ?></a>

            <h2>
              <div class="help-effect">
                <button class="help-block" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top"  
                  data-content="<?php _e('Animation wwwww' , 'menu_css3'); ?>" data-html="true" data-original-title="<?php _e('mode' , 'menu_css3'); ?>">
                    <?php _e('Help' , 'menu_css3'); ?>
                  </button>
                </div>
                <span><?php _e('Speech Bubbles' , 'menu_css3'); ?></span> 
              </h2>
              <a data-animate="curl-top-left" rel="curl-top-left" class="button curl-top-left<?php _e('">' , 'menu_css3'); ?><?php _e('Curl Top Left' , 'menu_css3'); ?></a>
              <a data-animate="curl-top-right" rel="curl-top-right" class="button curl-top-right"><?php _e('Curl Top Right' , 'menu_css3'); ?></a>
              <a data-animate="curl-bottom-right" rel="curl-bottom-right" class="button curl-bottom-right"><?php _e('Curl Bottom Right' , 'menu_css3'); ?></a>
              <a data-animate="curl-bottom-left" rel="curl-bottom-left" class="button curl-bottom-left">Curl Bottom Left</a>

            </div>
              <div class="row">
                <div class="hidden">
                  <label class="col-md-12 control-label" for="effet-a"></label>
                </div>
                <div class="">
                  <input value="<?php echo esc_attr( get_option('effet-a') ); ?>" id="effet-a" name="effet-a" type="hidden">
                </div>
              </div>
          </fieldset>
        </div>

        <button type="submit" name="panel_update" data-loading-text="Loading..." class="btn btn-primary">
          <?php _e('Save Changes' , 'menu_css3'); ?> &rarr;
        </button>
        <input type="hidden" name="panel_nonce_animate" value="<?php echo wp_create_nonce('animate-panel'); ?>">
      </form>

      </form>
    </div>

    <!-- Tabs 3-->
    <div class="tab-pane " id="-grouptabr4">
      <h2><?php _e('Documentation' , 'menu_css3'); ?></h2>
    </div>
  </div><!-- FIN Tabs -->

</div>





<?php
}
?>
