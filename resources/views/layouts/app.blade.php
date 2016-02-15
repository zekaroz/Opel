<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/dropzone/basic.css") }} " />
    <link rel="stylesheet" href="{{ asset("assets/dropzone/dropzone.css") }} " />
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <!-- JavaScripts -->
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{ asset("assets/dropzone/dropzone.js") }} " type="text/javascript"></script>
    <script src="{{ asset("assets/inputmask/jquery.inputmask.bundle.min.js") }} " type="text/javascript"></script>
    
    @include('partials.nav_backoffice')

    @yield('body')
    
    <script>
    $('div.alert').not('.alert_important').delay(3000).slideUp(300);

      $('#flash-overlay-modal').modal(); 

    $(document).ready(function(){
        $('.decimal').inputmask('decimal', 
                                { radixPoint: ".",
                                   autoGroup: true,
                                   groupSize: 3,
                                   allowMinus: false,
                                   allowPlus: false
                                });
    });    
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>
    
        
    @yield('afterBody')
</body>
</html>
