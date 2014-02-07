$(function() {


  // mise en place ces css sur le menu au chargement de la page
  var $bgc_load = $("#primary-navigation");
 
  var $content = $bgc_load.hide();
  $(".toggle").on("click", function(e){
    $(this).toggleClass("expanded");
    $content.slideToggle();
  });

  $('#drag-bloc').draggable();

  var $gradient_1_load_bgc = $('#bgc-1-bgc').val();
  var $gradient_2_load_bgc = $('#bgc-2-bgc').val();
  if( $gradient_1_load_bgc === '' || $gradient_2_load_bgc=== '') { 
    $bgc_load.css("background-color", $gradient_1_load_bgc);
    $bgc_load.css("background-image", 'none');
    //console.log($(this).parent().next().find('input').val() );
  }else if( ( $gradient_2_load_bgc !== '' ) && ( $gradient_1_load_bgc !== '' ) ) {
    $bgc_load.css("background-image", "-webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, " +$gradient_1_load_bgc+" ), color-stop(100%, "+$gradient_2_load_bgc+"))");
    $bgc_load.css("background-image", "-webkit-linear-gradient(top, "+$gradient_1_load_bgc+" 0%, "+$gradient_2_load_bgc+" 100%)");
    $bgc_load.css("background-image", "-moz-linear-gradient(top, "+$gradient_1_load_bgc+" 0%,"+$gradient_2_load_bgc+" 100%)");
    $bgc_load.css("background-image", "-o-linear-gradient(top, "+$gradient_1_load_bgc+" 0%,"+$gradient_2_load_bgc+" 100%)");
    $bgc_load.css("background-image", "linear-gradient(top, "+$gradient_1_load_bgc+" 0%,"+$gradient_2_load_bgc+" 100%)");
  }
  
  // shadow
  if ( $('#box-shadow-horizontal-bgc').html() !== 'none' || $('#box-shadow-vertical-bgc').html() !== 'none' || $('#box-shadow-gradient-bgc').html() !== 'none' ) {
    $horizontal_bgc_load = $('#box-shadow-horizontal-bgc').find('option:selected').html();
    $vertical_bgc_load = $('#box-shadow-vertical-bgc').find('option:selected').html();
    $gradient_bgc_load = $('#box-shadow-gradient-bgc').find('option:selected').html();
    $color_bgc_load = $('#box-shadow-color-bgc').val();
    $bgc_load.css('box-shadow', $horizontal_bgc_load +'px '+ $vertical_bgc_load +'px '+$gradient_bgc_load +'px '+ $color_bgc_load  );
  }

    //$bgc_load.css('width'( $('#width-bgc').val()!== '') ? $('#width-bgc').val() + $('#width-unite-bgc').val() : '',

  $bgc_load.css( {
    //'bottom'                     : '60px',
    'z-index'                    : '100000',
    //'position'                   : 'fixed',
    'margin-right'               : 'auto',
    'margin-left'                : 'auto', 
    'display'                    : 'block',

    'height'                     : ( $('#height-bgc').val()!== '') ? $('#height-bgc').val() + $('#height-unite-bgc').val() : 'initial',
    'marginTop'                  : ( $('#margin-top-bgc').val()!== '') ? $('#margin-top-bgc').val() + $('#margin-unite-bgc').val() : '',
    'marginRight'                : ( $('#margin-right-bgc').val()!== '') ? $('#margin-right-bgc').val() + $('#margin-unite-bgc').val() : '',
    'marginBottom'               : ( $('#margin-bottom-bgc').val()!== '') ? $('#margin-bottom-bgc').val() + $('#margin-unite-bgc').val() : '',
    'marginleft'                 : ( $('#margin-left-bgc').val()!== '') ? $('#margin-left-bgc').val() + $('#margin-unite-bgc').val() : '', 
    'paddingTop'                 : ( $('#padding-top-bgc').val()!== '') ? $('#padding-top-bgc').val() + $('#padding-unite-bgc').val() : '',
    'paddingRight'               : ( $('#padding-right-bgc').val()!== '') ? $('#padding-right-bgc').val() + $('#padding-unite-bgc').val() : '',
    'paddingBottom'              : ( $('#padding-bottom-bgc').val()!== '') ? $('#padding-bottom-bgc').val() + $('#padding-unite-bgc').val() : '',
    'paddingleft'                : ( $('#padding-left-bgc').val()!== '') ? $('#padding-left-bgc').val() + $('#padding-unite-bgc').val() : '',
    'borderStyle'                : ( $('#border-style-bgc').val()!== '') ? $('#border-style-bgc').val() : '',
    'borderWidth'                : ( $('#border-size-bgc').val()!== '') ? $('#border-size-bgc').val() : '',
    'borderColor'                : ( $('#border-bgc').val()!== '') ? $('#border-bgc').val() : '',
    'border-top-left-radius'     : ( $('#radius-top-left-bgc').val() !== '' ) ? $('#radius-top-left-bgc').val() + $('#radius-unite-bgc').val() : '',
    'border-top-right-radius'    : ( $('#radius-top-right-bgc').val() !== '' ) ? $('#radius-bottom-right-bgc').val() + $('#radius-unite-bgc').val() : '',
    'border-bottom-right-radius' : ( $('#radius-bottom-right-bgc').val() !== '' ) ? $('#radius-bottom-right-bgc').val() + $('#radius-unite-bgc').val() : '',
    'border-bottom-left-radius'  : ( $('#radius-bottom-left-bgc').val() !== '' ) ? $('#radius-bottom-left-bgc').val() + $('#radius-unite-bgc').val() : '',
    'opacity'                    : $('#opacity-bgc').val() / 100
  });

  $('#primary-navigation li').css( {
    
        'border'            : '0',
        'display'           : 'inline-block', // horizontale menu
        //'height'            : '48px',
        //'lineHeight'        : '48px',
        'position'          : 'relative'
  });


  var $links_load = $("#primary-navigation a");
  // text align links
  // text-align
  //if( $('#text-align-left').is(':checked') ) {
  //  $links_load.css( 'textAlign', 'left' );
  //}else if ( $('#text-align-center').is(':checked') ){
  //  $links_load.css( 'textAlign', 'center' );
  //}else if ( $('#text-align-right').is(':checked') ){
  //  $links_load.css( 'textAlign', 'right' );
  //}
  
  //font-variant
  if( $('#small-caps-l').is(':checked') ) {
    $links_load.css( 'fontVariant', 'small-caps' );
  }else{
    $links_load.css( 'fontVariant', 'normal' );
  }

  // font style
  if( $('#italic-l').is(':checked') ) {
    $links_load.css( 'fontStyle', 'italic' );
  }else{
    $links_load.css( 'fontStyle', 'normal' );
  }

  //bold-l
  if( $('#bold-l').is(':checked') ) {
    $links_load.css( 'fontWeight', 'bold' );
  }else{
    $links_load.css( 'fontWeight', 'normal' );
  }
  
  // transform
  if( $('#capitalize-l').is(':checked') ) {
    $links_load.css( 'textTransform', 'capitalize' );
  }else if ( $('#uppercase-l').is(':checked') ){
    $links_load.css( 'textTransform', 'uppercase' );
  }else if ( $('#lowercase-l').is(':checked') ){
    $links_load.css( 'textTransform', 'lowercase' );
  }else{
    $links_load.css( 'textTransform', 'none' );
  }
   // end check box link
  

  var $gradient_1_load_link = $('#bgc-1-l').val();
  var $gradient_2_load_link = $('#bgc-2-l').val();
  if( $gradient_1_load_link === '' || $gradient_2_load_link === '') { 
    $links_load.css("background-color", $gradient_1_load_link );
    $links_load.css("background-image", 'none');
    //console.log($(this).parent().next().find('input').val() );
  }else if( ( $gradient_2_load_link !== '' ) && ( $gradient_1_load_link !== '' ) ) {
    $links_load.css("background-image", "-webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, " +$gradient_1_load_link+" ), color-stop(100%, "+$gradient_2_load_link +"))");
    $links_load.css("background-image", "-webkit-linear-gradient(top, "+$gradient_1_load_link +" 0%, "+$gradient_2_load_link +" 100%)");
    $links_load.css("background-image", "-moz-linear-gradient(top, "+$gradient_1_load_link +" 0%,"+$gradient_2_load_link +" 100%)");
    $links_load.css("background-image", "-o-linear-gradient(top, "+$gradient_1_load_link +" 0%,"+$gradient_2_load_link +" 100%)");
    $links_load.css("background-image", "linear-gradient(top, "+$gradient_1_load_link +" 0%,"+$gradient_2_load_link +" 100%)");
  }
  
          // box shadow links
  $horizontal_link_load = $('#box-shadow-horizontal-l').find('option:selected').html();
  $vertical_link_load = $('#box-shadow-vertical-l').find('option:selected').html();
  $gradient_link_load = $('#box-shadow-gradient-l').find('option:selected').html();
  $color_link_load = $('#box-shadow-color-l').val();
  $links_load.css('box-shadow', $horizontal_link_load +'px '+ $vertical_link_load +'px '+$gradient_link_load +'px '+ $color_link_load  );

  $('#primary-navigation a').css( {
    'border'                     : '0',
    'display'                    : 'inline-block',
    'textDecoration'             : 'none',
    'position'                   : 'relative',
    'whiteSpace'                 : 'nowrap',
    '-webkitTapHighlightColor'   : 'rgba(0, 0, 0, 0)',

    'lineHeight'                 : ( $('#line-height-l').val()!== '') ? $('#line-height-l').val() + $('#line-height-unite-l').val() : '',
    'letterSpacing'              : ( $('#letter-spacing-l').val()!== '') ? $('#letter-spacing-l').val() + $('#letter-spacing-unite-l').val() : '',
    //'height'                     : ( $('#height-l').val()!== '') ? $('#height-l').val() + $('#height-unite-l').val() : '',
    //'width'                      : ( $('#width-l').val()!== '') ? $('#width-l').val() + $('#width-unite-l').val() : '',
    'marginTop'                  : ( $('#margin-top-l').val()!== '') ? $('#margin-top-l').val() + $('#margin-unite-l').val() : '',
    'marginRight'                : ( $('#margin-right-l').val()!== '') ? $('#margin-right-l').val() + $('#margin-unite-l').val() : '',
    'marginBottom'               : ( $('#margin-bottom-l').val()!== '') ? $('#margin-bottom-l').val() + $('#margin-unite-l').val() : '',
    'marginLeft'                 : ( $('#margin-left-l').val()!== '') ? $('#margin-left-l').val() + $('#margin-unite-l').val() : '', 
    'paddingTop'                 : ( $('#padding-top-l').val()!== '') ? $('#padding-top-l').val() + $('#padding-unite-l').val() : '',
    'paddingRight'               : ( $('#padding-right-l').val()!== '') ? $('#padding-right-l').val() + $('#padding-unite-l').val() : '',
    'paddingBottom'              : ( $('#padding-bottom-l').val()!== '') ? $('#padding-bottom-l').val() + $('#padding-unite-l').val() : '',
    'paddingLeft'                : ( $('#padding-left-l').val()!== '') ? $('#padding-left-l').val() + $('#padding-unite-l').val() : '',
    'borderStyle'                : ( $('#border-style-l').val()!== '') ? $('#border-style-l').val() : '',
    'borderWidth'                : ( $('#border-size-l').val()!== '') ? $('#border-size-l').val() : '',
    'borderColor'                : ( $('#border-l').val()!== '') ? $('#border-l').val() : '',
    'borderTopLeftRadius'        : ( $('#radius-top-left-l').val() !== '' ) ? $('#radius-top-left-l').val() + $('#radius-unite-l').val() : '',
    'borderTopRightRadius'       : ( $('#radius-top-right-l').val() !== '' ) ? $('#radius-bottom-right-l').val() + $('#radius-unite-l').val() : '',
    'borderBottomRightRadius'    : ( $('#radius-bottom-right-l').val() !== '' ) ? $('#radius-bottom-right-l').val() + $('#radius-unite-l').val() : '',
    'borderBottomLeftRadius'     : ( $('#radius-bottom-left-l').val() !== '' ) ? $('#radius-bottom-left-l').val() + $('#radius-unite-l').val() : '',
    'opacity'                    : $('#opacity-l').val() / 100,
    'fontSize'                   : ( $('#font-size-l').val()!== '') ? $('#font-size-l').val() + $('#font-size-unite-l').val() : '',
    'color'                      : ( $('#color-l').val()!== '') ? $('#color-l').val() : ''
  });




//  .nav-menu {
//    ul {
//      list-style: none;
//      margin: 0;
//      li {
//        border: 0;
//        display: inline-block;
//        height: 48px;
//        line-height: 48px;
//        position: relative;
//        a {
//          display: inline-block;
//          padding: 0 12px;
//          white-space: nowrap;
//          -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
//
//          /* test hover */
//            margin: .4em;
//            padding: 1em;
//            cursor: pointer;
//            background: #e1e1e1;
//            text-decoration: none;
//            color: #666666;
//            //.grow();
//        }
//      }
//    }
//  }
//}


  $('#primary-navigation').show();


  // slider bgc
  var $val = $( "#opacity-bgc" ).val();
  $( "#slider" ).slider({
    value: $val,
    min: 0,
    max: 100,
    slide: function( event, ui ) {
      $( "#opacity-bgc" ).val( ui.value );
      $("#primary-navigation").css('opacity', ui.value / 100);
    }
  });
  $( "#slider" ).on('slide slidecreate slidechange slidestart slidestop', function( e ){
    //console.log('The event ' + e.type + ' fired'  );
  });

  var $val_l = $( "#opacity-l" ).val();
  $( "#slider-l" ).slider({
    value: $val_l,
    min: 0,
    max: 100,
    slide: function( event, ui ) {
      $( "#opacity-l" ).val( ui.value );
      $("#primary-navigation a").css('opacity', ui.value / 100);
    }
  });
  $( "#slider-l" ).on('slide slidecreate slidechange slidestart slidestop', function( e ){
    //console.log('The event ' + e.type + ' fired'  );
  });


  $('.help-block').popover();

  // palette de couleurs
  $gradient_1 ='';
  $gradient_2 ='';
  $(".color input").spectrum({
    showAlpha: true,
    showPalette: true,
    allowEmpty:true,
    showInitial: true,
    showInput: true,
    showButtons: false,
    preferredFormat: "rgb",
    clickoutFiresChange: true,

    move: function(c) {
      $(this).val(c.toRgbString );

      var $tab_bgc = $(this).parents( "div.tab-bgc" ).length;
      var $tab_links = $(this).parents( "div.tab-links" ).length;
      var $tab_animate = $(this).parents( "div.tab-animate" ).length;
      var $meta = '';
      if( $tab_bgc ) { $meta = $("#primary-navigation");}
      else if( $tab_links ) { $meta = $("#primary-navigation a");}
      else if($tab_animate ) { $meta = $("#primary-navigation a:hover");}  


      if( $(this).data('gradient') ) {
        if( $(this).data('gradient') == 'gradient-1' ) {
          $gradient_1 = $(this).val(); 
          $gradient_2 = $(this).parent().next().find('input').val();
          if( $(this).closest('div').next().find('input').val() === '') { 
            $meta.css("background-color", $gradient_1);
            $meta.css("background-image", 'none');
            //console.log($(this).parent().next().find('input').val() );
          }else {
            $meta.css("background-image", "-webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, " +$gradient_1+" ), color-stop(100%, "+$gradient_2+"))");
            $meta.css("background-image", "-webkit-linear-gradient(top, "+$gradient_1+" 0%, "+$gradient_2+" 100%)");
            $meta.css("background-image", "-moz-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
            $meta.css("background-image", "-o-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
            $meta.css("background-image", "linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
          }
        }else if($(this).data('gradient') == 'gradient-2' ) {
          $gradient_2 = $(this).val();
          $gradient_1 = $(this).closest('div').prev().find('input').val();
            //console.log($(this).parent().prev().find('input').val() );
          $meta.css("background-image", "-webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, " +$gradient_1+" ), color-stop(100%, "+$gradient_2+"))");
          $meta.css("background-image", "-webkit-linear-gradient(top, "+$gradient_1+" 0%, "+$gradient_2+" 100%)");
          $meta.css("background-image", "-moz-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
          $meta.css("background-image", "-o-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
          $meta.css("background-image", "linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
        }

      } 

      if($(this).data('border') ) {
        $meta.css('border-color', $(this).val() );
      } 

      // shadow color
      if( $(this).data('shadow') ) {
        if( $(this).data('shadow') === 'color' ) {
          $this = $(this);
          $horizontal = $this.parent('div').prev().prev().prev().find('option:selected').html();
          $vertical = $this.parent('div').prev().prev().find('select').find('option:selected').html();
          $gradient = $this.parent('div').prev().find('select').find('option:selected').html();
          $color = $this.val();
        }
        $meta.css('box-shadow', $horizontal+'px '+ $vertical+'px '+$gradient+'px '+ $color );
      }

      // couleur du lien
      if($(this).data('text') === 'color' ) {
        $meta.css('color', $(this).val() );
      } 
    },
  });

  $(".color input").keyup(function() {
    var $tab_bgc = $(this).parents( "div.tab-bgc" ).length;
    var $tab_links = $(this).parents( "div.tab-links" ).length;
    var $tab_animate = $(this).parents( "div.tab-animate" ).length;
    var $meta = '';
    if( $tab_bgc ) { $meta = $("#primary-navigation");}
    else if( $tab_links ) { $meta = $("#primary-navigation a");}
    else if($tab_animate ) { $meta = $("#primary-navigation a:hover");}  

    if( $(this).data('gradient') == 'gradient-1' ) {
      $gradient_1 = $(this).val(); 
      $gradient_2 = $(this).parent().next().find('input').val();
      if( $(this).closest('div').next().find('input').val() === '') { 
        $meta.css("background-color", $gradient_1);
        $meta.css("background-image", 'none');
        //console.log($(this).parent().next().find('input').val() );
      }else {
        $meta.css("background-image", "-webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, " +$gradient_1+" ), color-stop(100%, "+$gradient_2+"))");
        $meta.css("background-image", "-webkit-linear-gradient(top, "+$gradient_1+" 0%, "+$gradient_2+" 100%)");
        $meta.css("background-image", "-moz-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
        $meta.css("background-image", "-o-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
        $meta.css("background-image", "linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
      }
    }else if($(this).data('gradient') == 'gradient-2' ) {
      $gradient_2 = $(this).val();
      $gradient_1 = $(this).closest('div').prev().find('input').val();
      //console.log($(this).parent().prev().find('input').val() );
      if( $(this).val() === '') { 
        $meta.css("background-color", $gradient_1);
        $meta.css("background-image", 'none');
      } else {
        $meta.css("background-image", "-webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, " +$gradient_1+" ), color-stop(100%, "+$gradient_2+"))");
        $meta.css("background-image", "-webkit-linear-gradient(top, "+$gradient_1+" 0%, "+$gradient_2+" 100%)");
        $meta.css("background-image", "-moz-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
        $meta.css("background-image", "-o-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
        $meta.css("background-image", "linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
      }
    }


    //if( $(this).data('gradient') ) {
    //  if( $(this).data('gradient') == 'gradient-1' ) {
    //    $gradient_1 = $(this).val(); 
    //    //console.log('1111' );
    //  }else if($(this).data('gradient') == 'gradient-2' ) {
    //    $gradient_2 = $(this).val();
    //  }
    //  $meta.css("background-image", "-webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, " +$gradient_1+" ), color-stop(100%, "+$gradient_2+"))");
    //  $meta.css("background-image", "-webkit-linear-gradient(top, "+$gradient_1+" 0%, "+$gradient_2+" 100%)");
    //  $meta.css("background-image", "-moz-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
    //  $meta.css("background-image", "-o-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
    //  $meta.css("background-image", "linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
    //  //filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="cfcfcf", endColorstr="656565"); 
    //  /* Pour IE seulement et mode gradient à linear */      
    //}
    // border color
    if($(this).data('border') ) {
      $meta.css('border-color', $(this).val() );
    } 
    // shadow color
    if( $(this).data('shadow') ) {
      if( $(this).data('shadow') === 'color' ) {
        $this = $(this);
        $horizontal = $this.parent('div').prev().prev().prev().find('option:selected').html();
        $vertical = $this.parent('div').prev().prev().find('select').find('option:selected').html();
        $gradient = $this.parent('div').prev().find('select').find('option:selected').html();
        $color = $this.val();
      }
      $meta.css('box-shadow', $horizontal+'px '+ $vertical+'px '+$gradient+'px '+ $color );
    }

    // couleur du lien
    if($(this).data('text') === 'color' ) {
      $meta.css('color', $(this).val() );
    } 

  }); // END .color input

  $(".color input").show();
  
  // change un champ au changement d'unite % ou px
  $("select").change(function() {
    var $tab_bgc = $(this).parents( "div.tab-bgc" ).length;
    var $tab_links = $(this).parents( "div.tab-links" ).length;
    var $tab_animate = $(this).parents( "div.tab-animate" ).length;
    var $meta = '';
    if( $tab_bgc ) { $meta = $("#primary-navigation");}
    else if( $tab_links ) { $meta = $("#primary-navigation a");}
    else if($tab_animate ) { $meta = $("#primary-navigation a:hover");}  

      var $selected = $(this).find('option:selected').text();


    if ( $(this).val() !== 'none' ) {
     //console.log( $(this).val() ); 
      // le select a data =unite
      if($(this).data('unite') ) {
        $(this).closest('.form-group').find('input').each(function(i, e) {
          $meta.css($(this).data('property'), $(this).val() + $selected );
        });
      }
      // border style
      if($(this).data('border') === 'style' ) {
          $meta.css('border-style', $(this).val() );
      }
      // border width
      if($(this).data('border') === 'width' ) {
        $meta.css('border-width', $(this).val() );
      }
    } else {
      $meta.css('border-style', 'none');
    }

    

    // box-shadow
    var $horizontal; var $vertical; var $gradient; var $color= '';
    if ( $(this).val() !== 'none' ) {
      //console.log( $(this).val() ); 
      if( $(this).data('shadow') ) {
        if( $(this).data('shadow') === 'horizontal' ) {
          $this = $(this);
          $color = $this.parent('div').next().next().next().find('input').val();
          $horizontal = $this.val();
          $vertical = $this.parent('div').next().find('select').find('option:selected').html();
          $gradient = $this.parent('div').next().next().find('select').find('option:selected').html();
        }
        if( $(this).data('shadow') === 'vertical' ) {
          $this = $(this);
          $color = $this.parent('div').next().next().find('input').val();
          $vertical = $this.val();
          $horizontal = $this.parent('div').prev().find('select').find('option:selected').html();
          $gradient = $this.parent('div').next().find('select').find('option:selected').html();
        }
        if( $(this).data('shadow') === 'gradient' ) {
          $this = $(this);
          $color = $this.parent('div').next().find('input').val();
          $gradient = $this.val();
          $horizontal = $this.parent('div').prev().prev().find('select').find('option:selected').html();
          $vertical = $this.parent('div').prev().find('select').find('option:selected').html();
        }
        $meta.css('box-shadow', $horizontal+'px '+ $vertical+'px '+$gradient+'px '+ $color );
      }
    } else {
      $meta.css('box-shadow', 'none');
    }

  });

  // text-align
  $('input[type=radio]').change(function(){
    if($(this).find('input[type="radio"]:checked').length === 0 ) {
      var $tab_bgc = $(this).parents( "div.tab-bgc" ).length;
      var $tab_links = $(this).parents( "div.tab-links" ).length;
      var $tab_animate = $(this).parents( "div.tab-animate" ).length;
      var $meta = '';
      if( $tab_bgc ) { $meta = $("#primary-navigation");}
      else if( $tab_links ) { $meta = $("#primary-navigation a");}
      else if($tab_animate ) { $meta = $("#primary-navigation a:hover");}  


     // if( $(this).data("text")) {
     //   $meta.css( 'textAlign' ,$(this).val() );
     // }
      if( $(this).data("variant")) {
        $meta.css( 'fontVariant' ,$(this).val() );
      }
      if( $(this).data("weight")) {
        $meta.css( 'fontWeight' ,$(this).val() );
      }
      if( $(this).data("style")) {
        $meta.css( 'fontStyle' ,$(this).val() );
      }
      if( $(this).data("transform")) {
        $meta.css( 'textTransform' ,$(this).val() );
      }
      if( $(this).data("position")) {
        if( $(this).data("position") === 'center') {
          $meta.css( 'float' ,'none' );
          $meta.css( 'margin' , '0 auto');
          $meta.css( 'width' , ( $('#width-bgc').val() !== '' ) ? $('#width-bgc').val() + $('#width-unite-bgc').val() : '100%' );
          
        }else {
          $meta.css( 'width' , ( $('#width-bgc').val() !== '' ) ? $('#width-bgc').val() + $('#width-unite-bgc').val() : '' );
          $meta.css( 'float' ,$(this).val() ).parent().css('overflow', 'hidden');
        }
      }
      //if( $(this).data("displaypos")) {
      //  console.log('eee' + $(this).val() ); 
      //  $meta.css( 'position' ,$(this).val() );
      //}
      if( $(this).data("senspos")) {
        if( $(this).data("senspos") === 'horizontal' ) {
          $('#width-bgc').val( '' );
          $meta.css( 'width' , 'initial');
        }
        if( $(this).data("senspos") === 'vertical' ) {
          $('#width-bgc').val(function(n,c){
            return "200";
          });
          $meta.css( 'width' , '200px');
          $('#width-unite-bgc').val(function(n,c){
            return "px";
          });
        }
      }
    }
  });


  $("input").keyup(function() {

    var $tab_bgc = $(this).parents( "div.tab-bgc" ).length;
    var $tab_links = $(this).parents( "div.tab-links" ).length;
    var $tab_animate = $(this).parents( "div.tab-animate" ).length;
    var $meta = '';
    if( $tab_bgc ) { $meta = $("#primary-navigation");}
    else if( $tab_links ) { $meta = $("#primary-navigation a");}
    else if($tab_animate ) { $meta = $("#primary-navigation a:hover");}  

   //console.log('eee'); 
    var p = $(this).data("property");
    function get_property_name() {
      return p;
    }
    var $selected = $(this).closest('div.form-group').find('select option:selected').text();
    var $val_input = ( !$(this).val().length ) ? 'initial' : $(this).val() + $selected;
    if( $(this).data("property")) {
      //console.log(p, $val_input);
      $meta.css( p , $val_input );
    }

    // letter-spacing 3 mots
    var $val_letter = ( !$(this).val().length ) ? '' : $(this).val() + $selected;
    if( $(this).data("letter")) {
      //console.log( $val_letter);
      $("#primary-navigation a").css( 'letter-spacing', $val_letter );
    }

  });

  $('#effects a').click( function() {

    $('#effects a').removeClass('selected ');
    var effet = $(this).removeClass('button').attr('class');
    $(this).addClass('button selected').addClass('selected').addClass(effet);
    
    //console.log(effet);
    $("#primary-navigation a").removeClass().addClass(effet);
    $('#effet-a').val(effet);
    
  });


$('#primary-navigation a').hover(function(){
 
    var $gradient_1 = $('#bgc-1-a').val();
    var $gradient_2 = $('#bgc-2-a').val();
    var $color = $('#color-text-a').val();
  //console.log($gradient_2 );
      var $this = $(this);
      $this.css("background-image", "-webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, " +$gradient_1+" ), color-stop(100%, "+$gradient_2+"))");
      $this.css("background-image", "-webkit-linear-gradient(top, "+$gradient_1+" 0%, "+$gradient_2+" 100%)");
      $this.css("background-image", "-moz-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
      $this.css("background-image", "-o-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
      $this.css("background-image", "linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
      $this.css( 'color', $color );

}, function(){

    var $gradient_1 = $('#bgc-1-l').val();
    var $gradient_2 = $('#bgc-2-l').val();
    var $color = $('#color-l').val();
    //console.log($gradient_1, $gradient_2 );
    var $this = $(this);
    $this.css("background-image", "-webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, " +$gradient_1+" ), color-stop(100%, "+$gradient_2+"))");
    $this.css("background-image", "-webkit-linear-gradient(top, "+$gradient_1+" 0%, "+$gradient_2+" 100%)");
    $this.css("background-image", "-moz-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
    $this.css("background-image", "-o-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
    $this.css("background-image", "linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
    $this.css( 'color', $color );

});
  // gradient animate
  //http://stackoverflow.com/questions/10963059/jquery-animate-div-background-color-gradient
  //interval = 0;
  //gradient_percent = 0;
  //interval_value = 5;
  //var interval_gradient = setInterval(function(){
  //    if(interval == 10) clearInterval(interval_gradient);
  //
  //    gradient_percent += interval_value;
  //    $('.slider-text').css('background', 'linear-gradient(to right, #373535 '+gradient_percent+'%,rgba(0,0,0,0) 100%)');
  //
  //    ++interval;
  //}, 50);
  //$('#primary-navigation .nav-menu ul li a').addClass('grow');


  $.get("https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyChZeTZ-DzMW-45IUBXUSuBha9MWEiXXtI",  {}, 
  function (data) {
    // charge toutes les poloces dans le selct
    $.each(data.items, function (index, value) {
      $('#fonts-l').append($("<option></option>").attr("value", value.family).text(value.family));
    });

    // au chargement de la page on affiche la police enregistrer
    var t = $.trim( $('.hide-fonts').text() );
    $("#fonts-l ").val(t).attr('selected', 'selected');
    
    // load the css au chargement
    var $load_css_font = $("#fonts-l").find('option:selected').html();
      $('body')
        .append("<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=" + $load_css_font.replace(/\s+/g," ") +"' type='text/css' media='all' />");
        $('#primary-navigation a').css({'font-family':'"'+$load_css_font+'"'});
  });

  $("#fonts-l").change( function () { 
   var selected = $("option:selected", this);
    if(selected.parent()[0].id !== "classique"){
        $('body')
        .append("<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=" + $(this).val().replace(/\s+/g," ") +"' type='text/css' media='all' />");
        $('#primary-navigation a').css({'font-family':'"'+$(this).val()+'"'});
    }
  });
  
}); // End
// Api Google font
// AIzaSyBPPp10Po9DHqGoBREzoRwsnpwbqBwfNd8
// https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key={YOUR_API_KEY}

