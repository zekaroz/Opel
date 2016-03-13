

    function loadingStart(){
        //let's just show a little spinner;
        $('.loadingDiv').show();
    }

    function loadingEnd(){
        //let's hide a little spinner;
        setTimeout(
            function(){
              $('.loadingDiv').hide();
            }
            ,
          1
        );
    }

    // function to handle form posts, and automatic refresh of the screen
    // data - is the data to post to the url
    // url - is the post route to send the data to
    // refreshElement - when set, makes a jquery load on that div with the response if OK.
    function form_post(data, url, refreshElement){
          console.log('Loading the spinner to start...');
          loadingStart();

          console.log('Doing the post now...');

          // now that it's loading let's send our request
          $.ajax({
             type: "POST",
             url: url,
             data: data,
             success: function(viewRendered) {

               console.log('success post request');
               // this function is suposed to receive a full view on the resonse
               // if refresh element is set the we must refresh it on success
                if (refreshElement){
                    console.log('Updating element: ' +refreshElement[0].id);
                    refreshElement[0].innerHTML = viewRendered;
                }

                console.log('Success: closing the spinner...');
                loadingEnd();
             }.bind(refreshElement)
             ,
             error:  function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("some error");
            }
           });

           console.log('All done, ending function...');
           return false;
    }
