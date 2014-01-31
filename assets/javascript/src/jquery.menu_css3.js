$(function() {

//  var $tab_bgc = $(this).parents( "div.tab-bgc" ).length;
//  var $tab_links = $(this).parents( "div.tab-links" ).length;
//  var $tab_animate = $(this).parents( "div.tab-animate" ).length;
//  var $meta = '';
//  if( $tab_bgc ) { $meta = $("#primary-navigation");}
//  else if( $tab_links ) { $meta = $("#primary-navigation a");}
//  else if($tab_animate ) { $meta = $("#primary-navigation a:hover");}  
//
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
    console.log('The event ' + e.type + ' fired'  );
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
    console.log('The event ' + e.type + ' fired'  );
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
        }else if($(this).data('gradient') == 'gradient-2' ) {
          $gradient_2 = $(this).val();
        }
       $meta.css("background-image", "-webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, " +$gradient_1+" ), color-stop(100%, "+$gradient_2+"))");
       $meta.css("background-image", "-webkit-linear-gradient(top, "+$gradient_1+" 0%, "+$gradient_2+" 100%)");
       $meta.css("background-image", "-moz-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
       $meta.css("background-image", "-o-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
       $meta.css("background-image", "linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
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

    if( $(this).data('gradient') ) {
      if( $(this).data('gradient') == 'gradient-1' ) {
        $gradient_1 = $(this).val(); 
        console.log('1111' );
      }else if($(this).data('gradient') == 'gradient-2' ) {
        $gradient_2 = $(this).val();
      }
      $meta.css("background-image", "-webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, " +$gradient_1+" ), color-stop(100%, "+$gradient_2+"))");
      $meta.css("background-image", "-webkit-linear-gradient(top, "+$gradient_1+" 0%, "+$gradient_2+" 100%)");
      $meta.css("background-image", "-moz-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
      $meta.css("background-image", "-o-linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
      $meta.css("background-image", "linear-gradient(top, "+$gradient_1+" 0%,"+$gradient_2+" 100%)");
      //filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="cfcfcf", endColorstr="656565"); 
      /* Pour IE seulement et mode gradient à linear */      
    }
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

    // le select a data =unite
    if($(this).data('unite') ) {
      var $selected = $(this).find('option:selected').text();
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
    // box-shadow
    var $horizontal; var $vertical; var $gradient; var $color= '';
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
  });

  $("input").keyup(function() {

    var $tab_bgc = $(this).parents( "div.tab-bgc" ).length;
    var $tab_links = $(this).parents( "div.tab-links" ).length;
    var $tab_animate = $(this).parents( "div.tab-animate" ).length;
    var $meta = '';
    if( $tab_bgc ) { $meta = $("#primary-navigation");}
    else if( $tab_links ) { $meta = $("#primary-navigation a");}
    else if($tab_animate ) { $meta = $("#primary-navigation a:hover");}  

    
    var p = $(this).data("property");
    function get_property_name() {
      return p;
    }
    var $selected = $(this).closest('div.form-group').find('select option:selected').text();
    var $val_input = ( !$(this).val().length ) ? 'inherit' : $(this).val() + $selected;
    if( $(this).data("property")) {
      $meta.css( p , $val_input );
    }
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


}); // End
