<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/matrix-media.css') }}" />
<link href="font-awesome/{{ asset('fonts/backend_fonts/css/font-awesome.css" rel="stylesheet') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>

@include('layouts.adminLayout.admin_header')
@include('layouts.adminLayout.admin_sidebar')

@yield('content')
@include('layouts.adminLayout.admin_footer')



<script src="{{ asset('js/backend_js/jquery.min.js')}}"></script>
{{-- <script src="{{ asset('js/backend_js/jquery.ui.custom.js')}}"></script> --}}
<script src="{{ asset('js/backend_js/bootstrap.min.js')}}"></script>
<!-- <script src="{{ asset('js/backend_js/jquery.uniform.js')}}"></script> -->
<!-- <script src="{{ asset('js/backend_js/select2.min.js')}}"></script> -->
<script src="{{ asset('js/backend_js/jquery.validate.js')}}"></script>
<script src="{{ asset('js/backend_js/matrix.js')}}"></script>
<script src="{{ asset('js/backend_js/matrix.form_validation.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
        $( function() {
          $( "#expiry_date" ).datepicker({
              minDate:0,
              dateFormat:'yy-mm-dd'
          });
        } );
</script>
<script type="text/javascript">

    function generateRandomString(length) {
      var text = "";
      var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

      for (var i = 0; i < length; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

      return text;
    }

    </script>
</body>
</html>
