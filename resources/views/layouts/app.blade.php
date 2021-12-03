<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{asset('/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">
<link href="{{asset('/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/select2/css/select2.min.css')}}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('/css/starlight.css')}}">
  </head>

  <body>

@include('layouts.leftpanel')
    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">Hello <span class="hidden-md-down"> {{Auth::user()->name}}</span></span>
              <i class="icon ion-ios-person-outline" style="font-size:30px"></i> 
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                @if (Auth::user()->role_id==1)
                     <li><a href="{{route('register')}}"><i class="icon ion-ios-personadd-outline"></i> Register New User</a></li>
                @endif
               
                <li><a href="{{route('profile')}}"><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                {{-- <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li> --}}
                <li><a href="{{route('logout')}}"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
       <!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->

    <!-- ########## END: RIGHT PANEL ########## --->
 <main class="py-4">
   <div class="sl-mainpanel">
            @yield('content')
        
    <footer class="sl-footer">
        <div class="footer-left">
          <div class="mg-b-2">Copyright &copy; 2021. Ishmam Bin Azim. All Rights Reserved.</div>
          
      
      </footer>
   </div>
    </main>

     
    <script src="{{asset('/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script> 
    <script src="{{asset('/lib/highlightjs/highlight.pack.js')}}"></script>
    
    <script src="{{asset('/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('/lib/select2/js/select2.min.js')}}"></script>
<script>
  
      $(function(){
        'use strict';
        
        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true,
          bPaginate: false,
          info : false
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
        $("#customer").select2( {
	placeholder: "Select ",

	} );
   $("#customer2").select2( {
	placeholder: "Select ",
	
	} );
   $("#product").select2( {
	placeholder: "Select ",
	
	} );

      });
    </script>
    <script src="{{asset('/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('/lib/d3/d3.js')}}"></script>
    <script src="{{asset('/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{asset('/lib/chart.js/Chart.js')}}"></script>
    <script src="{{asset('/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('/lib/flot-spline/jquery.flot.spline.js')}}"></script>

<script src="{{asset('/lib/medium-editor/medium-editor.js')}}"></script>
    <script src="{{asset('/lib/summernote/summernote-bs4.min.js')}}"></script>

   
  
   

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <script src="'https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('/js/starlight.js')}}"></script>
    <script src="{{asset('/js/ResizeSensor.js')}}"></script>
    <script src="{{asset('/js/dashboard.js')}}"></script>
   
   

    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script>  

     <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                Swal.fire({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                   showDenyButton: true,
                    confirmButtonText: 'Cancel',
                   denyButtonText: `Ok`,
                  
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete.isDenied) {
                       window.location.href = link;
                  } else if (willDelete.isConfirmed) {
                       Swal.fire('Changes are not saved', '', 'info')
                      }
                });
            });
    </script>
   <script>  
         $(document).on("click", "#paid", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                Swal.fire({
                  title: "Are you sure to make Paid?",
                  text: "Once Paid, Due Amount will be 0",
                  icon: "warning",
                  buttons: true,
                   showDenyButton: true,
                    confirmButtonText: 'Cancel',
                   denyButtonText: `Ok`,
                  
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete.isDenied) {
                       window.location.href = link;
                  } else if (willDelete.isConfirmed) {
                       Swal.fire('Changes are not saved', '', 'info')
                      }
                });
            });
    </script>
  </body>
</html>
