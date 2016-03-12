

// function to handle form posts, and automatic refresh of the screen
// data - is the data to post to the url
// url - is the post route to send the data to
// refreshElement - when set, makes a jquery load on that div with the response if OK.
function form_post(data, url, refreshElement){

      //first, let's just show a little spinner;
      $('.loadingDiv').show(100);

      // now that it's loading let's send our request
      $.ajax({
         type: "POST",
         url: url,
         data: data,
         success: function(view) {
           // this function is suposed to receive a full view on the resonse
           // if refresh element is set the we must refresh it on success
            if (refreshElement){
                 $( refreshElement ).innerHTML = view;
            }

            //now let's stop the loading that we've started;
            $('.loadingDiv').hide(100);
         }
       });
       return false;
}
