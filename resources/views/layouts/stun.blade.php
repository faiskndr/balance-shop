<!DOCTYPE html>
  <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      <title>{{ $title }}</title>
      <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
       <link rel="stylesheet" href="/bootstrap/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
      
      <!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">
  
        <div class="body-overlay"></div>
    <!---------Sidebar----------->
        {{-- @include('partials.sidebar')    --}}
    <!--------- End Sidebar----------->

    <!---------Page Content----------->

    <!---------End Page Content----------->
            
              <!-- Main Content -->
              <div class="main-content" style="min-height: 100vh;">
                  @yield('container')
                  <div class="card-content table-responsive">
                    @yield('table')
                  </div>  
              </div>

            </div>

        </div>
    </body>
  </html>