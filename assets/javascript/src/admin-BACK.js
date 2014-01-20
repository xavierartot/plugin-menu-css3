(function($) {
  // on charge le DOM
  $(document).ready(function(){

    // color picker
    $('#picker3').colpick({
      layout:'rgbhex',
    colorScheme:'dark',
    submit:0,
    onChange:function(hsb,hex,rgb,fromSetColor) {
      if(!fromSetColor) $('#picker3').val(hex).css('border-color','#'+hex);
    }
    });
    $('#picker3').keyup(function(){
      $(this).colpickSetColor(this.value);
    });

    $("a").click(function(){$(this).blur();});
    $( ".xav" ).tabs();
    $( ".caption:empty" ).remove();

    // on suprime les images vide au chargement
    $( ".photo" ).attr( "src", function( i, val ) {
      if(val === ''){ return "vide"; }
    });
    $( ".photo" ).attr( "src", function( i, val ) {
      if(val=='vide'){ return this.remove(); }
    });

    $('.custon-add-media')
      .click(function(e){
        $el = $(this).parent();
        //console.log('test');
        e.preventDefault();
        var uploader = wp.media({
          title : 'Send your picture',
            button : {
              text : 'Choice your file'
            },
            multiple : true 
        })
        .on( 'select', function() {
          var selection = uploader.state().get('selection');
          var attachments = [];
          var i=1; 
          selection.map( function (attachment) {
            attachment = attachment.toJSON(); 
            console.log(attachment);
            $('.uploader div').html('');
            console.log(attachment.url, attachment.caption);
            $('<img/>', {
              id: 'foo',
              src: attachment.url,
              class: 'photo',
              width: '100%',
              alt: ''
            }).appendTo($el);
            $('<span/>', {
              class: 'caption',
            }).appendTo($el).html(attachment.caption);

            $('<input>', {
              name: 'photo-' + i,
              value: attachment.url
            }).appendTo($el).attr('text','hidden').css('display','none');

            $('<input>', {
              name: 'caption-' + i,
              value: attachment.caption
            }).appendTo($el).attr('text','hidden').css('display','none');
            i++;
          });
          /*
           * en cas de selection simple
           */
          /*
             var attachment = selection.first().toJSON();
             $('input', $el).val(attachment.url);  
             $('img', $el).attr('src', attachment.url);  
             */
        })
        .open();
      });
  });

})(jQuery);

