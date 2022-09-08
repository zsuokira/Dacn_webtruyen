<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <base href="{{asset('')}}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin_asset/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin_asset/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin_asset/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin_asset/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin_asset/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin_asset/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <!-- End plugin css for this page -->
    <!-- inject:css -->


    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin_asset/assets/css/style.css">
    <link rel="stylesheet" href="static/mdbootstrap/css/addons/datatables.min.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin_asset/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.layout.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('admin.layout.navbar')
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
        @yield('content')
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.layout.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin_asset/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin_asset/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin_asset/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin_asset/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin_asset/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin_asset/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin_asset/assets/js/off-canvas.js"></script>
    <script src="admin_asset/assets/js/hoverable-collapse.js"></script>
    <script src="admin_asset/assets/js/misc.js"></script>
    <script src="admin_asset/assets/js/settings.js"></script>
    <script src="admin_asset/assets/js/todolist.js"></script>
    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin_asset/assets/js/file-upload.js"></script>
    <script src="admin_asset/assets/js/typeahead.js"></script>
    <script src="admin_asset/assets/js/select2.js"></script>
    <script src="admin_asset/assets/js/dashboard.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script> 
    $(document).ready( function () {
        $('#table-content-datatable').DataTable();
    } );
    </script>
    <!-- End custom js for this page -->
  </body>
</html>