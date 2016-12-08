<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>PCQAR - Backoffice</title>

   <link href="{{ asset("/css/app_backoffice.css") }}" rel="stylesheet">
</head>
<body>
       <!-- JavaScripts -->
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="{{  asset("/js/jquery.min.js")  }}"></script>
    <script src="{{  asset("/js/bootstrap.min.js")  }}"></script>
    <script src="{{ asset("assets/dropzone/dropzone.js") }} " type="text/javascript"></script>
    <script src="{{ asset("assets/inputmask/jquery.inputmask.bundle.min.js") }} " type="text/javascript"></script>
    <script src="{{ asset("assets/select2/js/select2.min.js") }} " type="text/javascript"></script>
    <script src="{{ asset("assets/DataTables/datatables.js") }} " type="text/javascript"></script>
    <script src="{{ asset("js/jquery.touchSwipe.min.js") }} " type="text/javascript"></script>
    <script src="{{ asset("js/JQ.js") }} " type="text/javascript"></script>
    <script src="{{ asset("js/sweetalert.min.js") }}" ></script>
    <script src="{{ asset("js/spin.min.js") }}" ></script>
    <script src="{{ asset("js/ladda.min.js") }}" ></script>
    <script src="{{ asset("js/custom_script.js") }}" ></script>
    <script src="{{ asset("js/parsley.min.js") }}" ></script>

    @include('sweet::alert')




    @include('partials.nav_backoffice')

    <div id="app">
          @yield('body')
    </div>


    <script>
    $(document).ready(function() {
        $('.search-table').DataTable();

        $('.decimal').inputmask('decimal',
                                { radixPoint: ".",
                                   autoGroup: true,
                                   groupSize: 3,
                                   allowMinus: false,
                                   allowPlus: false
                                });

         $('.specialSelect').select2({
              width: '100%',
              minimumResultsForSearch: 10,
               closeOnSelect: true
         });


         // Dropzone.options.{DropzoneDivId} - the id of the drop zones must be
         // identifier tby the Id of the {DropzoneDivId}, in this carSearch
         // filedrop, so this event can be handled here
         Dropzone.options.filedrop = {
             init: function () {
               this.on("complete", function (file) {
                 if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    loadingStart();
                     //when using dropzone to upload files,
                     //after the upload is complete
                     // and if there is a function named reloadPictures
                     if(reloadPictures){
                         reloadPictures();
                     }
                     // each client of the dropzone must write a function reloadPictures()
                     // if they want to reload their pictures after upload
                     loadingEnd();
                 }
               });

               this.on("success", function(file, responseText) {
                // Handle the responseText here. For example, add the text to the preview element:
                this.removeFile(file);
              });
             } //end of init Function
         };
    });

    $('div.alert').not('.alert_important').delay(3000).slideUp(300);
    $('#flash-overlay-modal').modal();
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>


    @yield('afterBody')
      @include('layouts.loadingSpinner')
</body>
</html>
