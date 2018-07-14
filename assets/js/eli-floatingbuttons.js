
jQuery(document).ready(function($){
    var offset = 100;
    var speed = 250;
    var duration = 500;
    var scrollTimer;

    //check if scrolling stopped for more than 250 milliseconds, and if scrolling is more than 100px from top

	   $(window).on('scroll', function(){
        clearTimeout(scrollTimer);
        scrollTimer = setTimeout(function() {
            if ($(this).scrollTop() < offset) {
              $('.button-to-top').removeClass('button-to-top-visible');
            } else {
                $('.button-to-top').addClass('button-to-top-visible');
              }
          
            },250);
      });

	    $(".button-to-top").on("click", function () {
		    $('html, body').animate({scrollTop:0}, speed);
		    return false;
        });
 
});