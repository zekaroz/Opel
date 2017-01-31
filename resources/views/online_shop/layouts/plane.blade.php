<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>

    @yield('head_section')
    <meta name="author" content="Pedro Queirós">
    <link href="{{ asset("/css/main_app.css")}}" rel='stylesheet' type='text/css'>
    {!! Analytics::render() !!}
</head>

<body>
    <script src="{{ asset("js/main_app.js") }}"></script>
    @if( isset($context_snippet) )
        {!! $context_snippet !!}
    @endif

    <div class="container Header">

        @yield('menu')

        @yield('topSection')

        <div class="container">
            <div class="row">
                @yield('body')
            </div>
        </div>

        <footer>

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

        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>

      @yield('afterBody')

      @include('layouts.loadingSpinner')
</body>

</html>
