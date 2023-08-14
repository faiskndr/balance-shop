<!DOCTYPE html>
  <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      <title>{{ $title }}</title>
      <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
       <link rel="stylesheet" href="/bootstrap/custom.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
      
      <!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">
  
        <div class="body-overlay"></div>
    <!---------Sidebar----------->
        @include('partials.sidebar')   
    <!--------- End Sidebar----------->

    <!---------Page Content----------->
        @include('partials.navbar')
    <!---------End Page Content----------->
            
              <!-- Main Content -->
              <div class="main-content" style="min-height: 100vh;">
                  @yield('container')
                 
              </div>

            </div>

        </div>
        <script src="bootstrap/jquery.js"></script>
        <script src="bootstrap/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript">
          $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
				$('#content').toggleClass('active');
            });
			
			 $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
			
        });       
        </script>
    </body>
  </html>