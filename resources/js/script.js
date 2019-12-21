$(document).ready(function(){

        /* For the sticky navigation */
    $('.js--About-Us').waypoint(function(direction) {
        if (direction == "down") {
            $('nav').addClass('sticky');
        } else {
            $('nav').removeClass('sticky');
        }
    }, {
      offset: '15%;'
    });
    
        /* Scroll on buttons */
    $('.js--scroll-to-summary').click(function(){
        $('html, body').animate({scrollTop: $('.js--About-Us').offset().top}, 1000);
    });

    $('.js--scroll-to-location').click(function(){
        $('html, body').animate({scrollTop: $('.js--location').offset().top}, 1000);
    });

    /* Navigation scroll */
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });
});

function showPic(whichpic) {
  if (!document.getElementById("myImg")) return true;
  var source = whichpic.getAttribute("href");
  var placeholder = document.getElementById("myImg");
  placeholder.setAttribute("src",source);
 
 
  return false;
}

