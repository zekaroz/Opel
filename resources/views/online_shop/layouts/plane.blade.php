<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reciopel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="{{ asset("assets/DataTables/datatables.css") }}"/>
     

    
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
    </style>
    
    
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="{{ asset("assets/DataTables/datatables.js") }} " type="text/javascript"></script>
    
    <div class="container">
        
        @yield('menu')
        
        <hr>
        <div class="container">
            <div class="row">
                @yield('body')
            </div>
        </div>
        
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Reciopel 2016</p>
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
</body>

</html>
