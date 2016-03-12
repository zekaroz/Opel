<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>ReciOpel - Backoffice</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/dropzone/basic.css") }} " />
    <link rel="stylesheet" href="{{ asset("assets/dropzone/dropzone.css") }} " />
     <link rel="stylesheet" href="{{ asset("assets/select2/css/select2.min.css") }} " />
     <link rel="stylesheet" type="text/css" href="{{ asset("assets/DataTables/datatables.css") }}"/>
     <link rel="stylesheet" type="text/css" href="{{ asset("css/jBox.css") }}"/>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .number{
            text-align: right;
        }
        .date{
             text-align: right;
        }
        .form-group.required label:after {
          content:"*";
          color:red;
        }
    </style>
</head>
<body>
       <!-- JavaScripts -->
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{ asset("assets/dropzone/dropzone.js") }} " type="text/javascript"></script>
    <script src="{{ asset("assets/inputmask/jquery.inputmask.bundle.min.js") }} " type="text/javascript"></script>
    <script src="{{ asset("assets/select2/js/select2.min.js") }} " type="text/javascript"></script>
    <script src="{{ asset("assets/DataTables/datatables.js") }} " type="text/javascript"></script>
    <script src="{{ asset("js/jquery.touchSwipe.min.js") }} " type="text/javascript"></script>
    <script src="{{ asset("js/JQ.js") }} " type="text/javascript"></script>


    @include('partials.nav_backoffice')

    <div id="app">
          @yield('body')
    </div>


    <script>



    $(document).ready(function() {
         $('.search-table').DataTable();
    } );

    $(document).ready(function(){
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
    <script src="{{ asset("js/main.js") }} " type="text/javascript"></script>

      @include('layouts.loadingSpinner')
</body>
</html>
