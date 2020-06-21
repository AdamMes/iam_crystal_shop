<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="{{ asset('images/icon-for-browser.png') }}">

  <title>I AM | Admin Panel</title>

  <!-- Custom fonts for this template-->
<link href="{{asset('lib/cms/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
<link href="{{asset('lib/cms/css/sb-admin-2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
<link rel="stylesheet" href="{{asset('css/cms_style.css')}}">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-light sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center " href="{{url('cms/dashboard')}}">
        <div class="sidebar-brand-icon ">
            <img class="w-75" src="{{asset('images/main-icon-admin-panel.png')}}" alt="site logo">
                </div>

      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
      <a class="nav-link" href="{{url('cms/dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt text-dark"></i>
          <span class="text-dark">Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider bg-dark">

      <!-- Heading -->
      <div class="sidebar-heading text-dark">
        Views
      </div>

       <!-- Nav Item - Menu -->
       <li class="nav-item">
        <a class="nav-link pt-1 pb-0 px-auto" href="{{url('cms/menu')}}">
            <i class="fas fa-bars text-dark"></i>
        <span class="text-dark">Menu</span></a>
      </li>

      <!-- Nav Item - Content -->
      <li class="nav-item">
        <a class="nav-link pt-1 pb-2 px-auto" href="{{url('cms/content')}}">
            <i class="fas fa-layer-group text-dark"></i>
          <span class="text-dark">Content</span></a>
      </li>

          <!-- Divider -->
          <hr class="sidebar-divider bg-dark">

          <!-- Heading -->
          <div class="sidebar-heading text-dark">
            Stock
          </div>


      <!-- Nav Item - Categories -->
      <li class="nav-item">
        <a class="nav-link pt-1 pb-2 px-auto" href="{{url('cms/categories')}}">
            <i class="fas fa-box text-dark"></i>
           <span class="text-dark">Categories</span></a>
      </li>

      <!-- Nav Item - Categories -->
      <li class="nav-item">
        <a class="nav-link pt-1 pb-2 px-auto" href="{{url('cms/products')}}">
            <i class="fas fa-cubes text-dark"></i>
          <span class="text-dark">Products</span></a>
      </li>

    <!-- Divider -->
    <hr class="sidebar-divider bg-dark">

    <!-- Heading -->
    <div class="sidebar-heading text-dark">
      Customers
    </div>

          <!-- Nav Item - Users -->
          <li class="nav-item">
            <a class="nav-link pt-1 pb-2 px-auto" href="{{url('cms/users')}}">
                <i class="fas fa-users text-dark"></i>
                  <span class="text-dark">Users</span></a>
          </li>
          <!-- Nav Item - Orders -->
          <li class="nav-item">
            <a class="nav-link pt-1 pb-2 px-auto" href="{{url('cms/orders')}}">
                <i class="fas fa-shipping-fast text-dark"></i>
                  <span class="text-dark">Orders</span></a>
          </li>


          <!-- Divider -->
          <hr class="sidebar-divider bg-dark">
          <li class="nav-item ">
            <a class="nav-link pt-1 pb-4 px-auto d-flex justify-content-center" target="_blank" href="{{url('')}}">
                  <span class="text-light btn btn-success">
                       <i class="far fa-arrow-alt-circle-left"></i> Back To Site
                    </span></a>
          </li>


           <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block bg-dark">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 bg-dark" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars text-dark"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <li class="nav-item"><a href="{{url('user/logout')}}" class="nav-link text-center text-danger"><i class="fas fa-sign-out-alt"></i><b>Logout</b></a></li>

          </ul>

        </nav>
        <!-- End of Topbar -->
<main>
    <div class="container-fluid">

        @yield('cms_content')

         </div>
</main>



      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>I AM &copy; {{date('M Y')}}</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="{{asset('lib/cms/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
<script src="{{asset('lib/cms/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
<script src="{{asset('lib/cms/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
<script src="{{asset('lib/cms/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
<script src="{{asset('lib/cms/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('lib/cms/js/demo/chart-pie-demo.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script src="{{asset('js/cms_script.js')}}"></script>
       @if(Session::has('sm'))
       <script>
        toastr.options.positionClass = 'toast-bottom-full-width';
        toastr.success('',"{{Session::get('sm')}}")
        </script>
       @endif

</body>

</html>
