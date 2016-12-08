
var headerIsSet;

(function (){
  "use strict";
  //script to fade the header in when the user scrolls
  //this vars became closures to the main Execution Evironment
  var headerHeight = 100;
  var hasSolidHeader = false;

  $(window).scroll(function() {
      if ($(this).scrollTop() > headerHeight) {
        if(! hasSolidHeader){
          $(".HeaderColorBackground").fadeIn();
          hasSolidHeader = true;
        }
      }else{
        if(hasSolidHeader){
          $(".HeaderColorBackground").fadeOut();
          hasSolidHeader = false;
        }
      }
  });

  headerIsSet = true;
  return false;
})();
