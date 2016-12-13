
$(function(){
  // Same as the above but automatically stops after two seconds
//  $( 'button[type=submit], input[type=submit]').ladda( 'bind');

  // Bind progress buttons and simulate loading progress
  Ladda.bind( '.ladda-button.ladda-progress', {
    // callback: function( instance ) {
    //              var progress = 0;
    //              var interval = setInterval( function() {
    //                                            progress = Math.min( progress + Math.random() * 0.1, 1 );
    //                                            instance.setProgress( progress );
    //
    //                                            if( progress === 1 ) {
    //                                              instance.stop();
    //                                              clearInterval( interval );
    //                                              }
    //                                           }, 200 );
    //           }
  } );
});
