$(function() {
  // slider bgc
  var $val = $( "#opacity-bgc" ).val();
  $( "#slider" ).slider({
    value: $val,
    min: 0,
    max: 100,
    slide: function( event, ui ) {
      $( "#opacity-bgc" ).val( ui.value );
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
    }
  });
  $( "#slider-l" ).on('slide slidecreate slidechange slidestart slidestop', function( e ){
    console.log('The event ' + e.type + ' fired'  );
  });


  $('.help-block').popover();

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
    }
  });

  $(".color input").show();
});
