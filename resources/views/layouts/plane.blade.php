<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>Reci-Opel</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
</head>
<body>
        @include('partials.nav_backoffice')

        @yield('body')
				<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
        <script src="{{ asset("assets/enyo/dropzone/dist/dropzone.js") }} " type="text/javascript"></script>
        <script>
        $('div.alert').not('.alert_important').delay(3000).slideUp(300);

          $('#flash-overlay-modal').modal();
        </script>

        @yield('afterBody')
</body>
</html>
