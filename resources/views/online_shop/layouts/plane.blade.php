<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('head_section')
    <meta name="author" content="Pedro Queirós">


    <link href="{{ asset("/css/font-awesome.min.css")}}" rel='stylesheet' type='text/css'>
    <link href="{{ asset("/css/fonts.googleapis.css.css")}}" rel='stylesheet' type='text/css'>


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset("/css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset("/css/shop-homepage.css") }}" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="{{ asset("/assets/DataTables/datatables.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("/css/jBox.css") }}"/>



    <style>
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

        .thumbnail > img, .thumbnail a > img{
          height: 100px;
        }
        .left-buffer{
          margin-left: 10px;
        }
    </style>

    {!! Analytics::render() !!}
</head>

<body>
    <script src="{{ asset("js/jquery.min.js") }}"></script>
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("js/html5shiv.js") }}"></script>
    <script src="{{asset("js/respond.min.js")}}"></script>
    <script src="{{ asset("assets/DataTables/datatables.js") }} " type="text/javascript"></script>
    <script src="{{ asset("js/jquery.touchSwipe.min.js") }} " type="text/javascript"></script>


    <div class="container Header">

        @yield('menu')

        <hr>
        <div class="container">
            <div class="row">
                @yield('body')
            </div>
        </div>

        <footer>

          <script src="{{ asset("/js/header_fading.js") }}" type="text/javascript"></script>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; PcQar 2016</p>
                </div>
            </div>
        </footer>
    </div>




    <script>

        $(document).ready(function() {
            try{
                $('.search-table').DataTable( {
                    "language": {
                        "url": "{{ asset("assets/DataTables/Multilingue/Portuguese.json") }}"
                    }
                } );
            }catch (e){
                 return;
             }
        } );

        $('div.alert').not('.alert_important').delay(3000).slideUp(300);
        $('#flash-overlay-modal').modal();
    </script>

      @yield('afterBody')
</body>

</html>
