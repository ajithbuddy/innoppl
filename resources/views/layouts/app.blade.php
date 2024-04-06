<!DOCTYPE html>
<html>
<head>
  <title>Innoppl Task</title>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="admin, dashboard" />
  <meta name="description" content="Innoppl Task"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Innoppl Task" />

  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/images/favicon.png') }}">

  <link href="{{ asset('public/vendor/fullcalendar/css/main.min.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.9/css/buttons.dataTables.min.css">
  <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
</head>

@guest
    <body class="vh-100" style="background-image: url(./public/images/login-background.gif);">
    @yield('content')
@endguest
@auth
    <body class="vh-100" class = "show">
    @if (in_array(request()->route()->getName(), ['login', 'login.post','register','register.post','recover-password']))
        @yield('content')
        
    @else
      <div id="main-wrapper" class = "show">
        @yield('content')
      </div>
    @endif
@endauth

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('public/vendor/global/global.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/js/custom.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/js/deznav-init.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/js/demo.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/js/styleSwitcher.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/vendor/chart.js/Chart.bundle.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/vendor/peity/jquery.peity.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/js/dashboard/dashboard-1.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/vendor/moment/moment.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/vendor/fullcalendar/js/main.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/js/dashboard/calendar.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/vendor/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/js/plugins-init/datatables.init.js') }}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
  
  <script type="text/javascript">
    $(document).ready(function() {
      $('#price').on('input', function() {
        // Remove non-numeric characters and extra dots
        $(this).val($(this).val().replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'));
      });

      $('#sku').keypress(function(event) {
        // Allow only alphanumeric characters
        var inputValue = event.key;
        if (!/^[a-zA-Z0-9]*$/.test(inputValue)) {
          event.preventDefault();
        }
      });

      $('#description').keypress(function(event) {
        // Allow only alphanumeric characters
        var inputValue = event.key;
        if (!/^[a-zA-Z0-9 ]*$/.test(inputValue)) {
          event.preventDefault();
        }
    });
      

    //   $('#form').validate({
    //     rules: {
    //         name: {
    //             required: true
    //         },
    //         price: {
    //             required: true
    //         },
    //         sku: {
    //             required: true
    //         },
    //         description: {
    //             required: true
    //         },
    //         'images[]': {
    //             required: true
    //         }
    //     },
    //     messages: {
    //         name: {
    //             required: "Please enter the name"
    //         },
    //         price: {
    //             required: "Please enter the price"
    //         },
    //         sku: {
    //             required: "Please enter the SKU"
    //         },
    //         description: {
    //             required: "Please enter the description"
    //         },
    //         'images[]': {
    //             required: "Please select at least one image"
    //         }
    //     },
    //     submitHandler: function(form) {
    //         // Submit the form if it's valid
    //         form.submit();
    //     }
    // });

      setTimeout(function() {
        // Closing the alert
        $('.alert').alert('close');
      }, 5000);
    });
  </script>
</body>
</html>
