jQuery( document ).ready(function($){
  var offset = 100,
      speed = 250,
      duration = 500,
      scrollButton = $('#topbutton');
  
  $( window ).scroll( function() {
    if ( $( this ).scrollTop() < offset) {
      scrollButton.fadeOut( duration );
    } else {
      scrollButton.fadeIn( duration );
    }
  });
  
  scrollButton.on( 'click', function(e){
    e.preventDefault();
    $( 'html, body' ).animate({
      scrollTop: 0
    }, speed);
  });
});
