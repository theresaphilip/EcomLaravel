<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') | {{ config('app.name') }} </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
      href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <style>
      .error {
          color: red
      }

  </style>
  <style>
      .bg {
          /* background:linear-gradient(160deg,deeppink,orange,violet); */
          /* background: linear-gradient(160deg,#dae2ff,rgb(0 0 0 / 80%),#5f1ab9); */
          background: linear-gradient(160deg, #594785, rgb(14 17 58 / 80%), #5f1ab9);
      }

  </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">


  <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top bg mb-5 ">
      <!-- Left navbar links -->
      <ul class="navbar-nav ">
          <li class="nav-item ">
              <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i
                      class="fas fa-bars"></i></a>
          </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->firstname }}
              </a>

              <div class="dropdown-menu dropdown-menu-right bg text-white" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item text-white bg" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
          <img src="../../dist/img/e-commerce-icon-png-17.jpg" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">E-Commerce</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin panel</a>
      </div>
    </div> --}}

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="{{ route('dashboard') }}" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard

                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('roles') }}" class="nav-link">
                          {{-- class="nav-link @if (request()->routeIs('SuperAdmin::roles.*')) active @endif"> --}}
                          <i class="far fa-circle nav-icon"></i>
                          <p>Roles</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('users') }}" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              User

                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('configurations') }}" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Configuration

                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('banners') }}" class="nav-link">
                          <i class="nav-icon fas fa-image"></i>
                          <p>
                              Banner
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('categories') }}" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Category
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('products') }}" class="nav-link">
                          <i class="nav-icon fa fa-list"></i>
                          <p>
                              Product
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('coupons') }}" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Coupon
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="" class="nav-link">
                          <i class="nav-icon fas fa-bell"></i>
                          <p>
                              Notifications
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('contacts') }}" class="nav-link">
                          <i class="nav-icon fas fa-address-book"></i>
                          <p>
                              Contact Us
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('cms') }}" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              CMS
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Order
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="" class="nav-link">
                          <i class="nav-icon fas fa-file"></i>
                          <p>
                              Reports
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="" class="nav-link" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
                          <i class="nav-icon fas fa-sign-out-alt"></i>
                          <p>Logout</p>
                      </a>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
  <!-- add content wrapper -->
  <div class="content-wrapper" style="min-height: 1302.12px;">
      @section('content')
      @show()
  </div>

  <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">{{ config('app.name') }}</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.1.0
      </div>
  </footer>
  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('dist/js/demo.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

</body>

</html>