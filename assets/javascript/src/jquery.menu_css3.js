//alert(t);
$(function() {
  var t = 'dddd';
  // Handler for .ready() called.
  //alert(t);
  //$('body').css('backgroundColor', 'red');

  $( "#slider" ).slider({
    value:100,
    min: 0,
    max: 100,
    step: 1,
    slide: function( event, ui ) {
      $( "#opacity-bgc" ).val( ui.value );
    }
  });
  $( "#opacity-bgc" ).val( $( "#slider" ).slider( "value" ) );

  $('.help-block').popover();
});
