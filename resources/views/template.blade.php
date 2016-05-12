<!DOCTYPE html>
<html>
    <head>
        <title>Product Management</title>
        <meta charset="UTF-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('/css/bootstrap.min.css') }} " rel="stylesheet">
        
    </head>

    <body>
    

        <!-- Main Container start -->
        <div class="dashboard-container pullbox_rel">

           <div class="container">
               
                
                <!-- Dashboard Wrapper Start -->
                <div class="dashboard-wrapper">

                    @yield('content')

                </div>
                <!-- Dashboard Wrapper End -->

            </div>
        </div>
        <!-- Main Container end -->

        
        <script src="{{ asset('/js/bootstrap.min.js ') }}"></script>
        
     
    </body>
</html>