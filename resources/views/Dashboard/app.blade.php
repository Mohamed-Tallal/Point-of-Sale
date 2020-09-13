<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('Admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/plugins/morris/morris.css')}}">

    <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  @include('Dashboard.layouts.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset('Admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Point Of Sale</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->first_name .' '}}{{auth()->user()->last_name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('Admin.Dashboard')}}" class="nav-link {{is_Active('Home')}}">
                <i class="fas fa-chart-line"></i>&nbsp;&nbsp;
              <p>
                @lang('site.Dashboard')
              </p>
            </a>
          </li>
            @if(auth()->user()->hasPermission('users-read'))
            <li class="nav-item has-treeview menu-open">
                <a href="{{route('admin.index')}}" class="nav-link {{is_Active('admin')}}">
                    <i class="fas fa-user-lock"></i>&nbsp;&nbsp;
                    <p>
                        @lang('site.Admin')
                    </p>
                </a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('categories-read'))
            <li class="nav-item has-treeview menu-open">
                <a href="{{route('category.index')}}" class="nav-link {{is_Active('category')}}">
                    <i class="far fa-list-alt"></i>&nbsp;&nbsp;
                    <p>
                        @lang('site.Categories')
                    </p>
                </a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('products-read'))
            <li class="nav-item has-treeview menu-open">
                <a href="{{route('product.index')}}" class="nav-link {{is_Active('product')}}">
                    <i class="fas fa-clipboard-list"></i>&nbsp;&nbsp;
                    <p>
                        @lang('site.Product')
                    </p>
                </a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('clients-read'))
            <li class="nav-item has-treeview menu-open">
                <a href="{{route('client.index')}}" class="nav-link {{is_Active('client')}}">
                    <i class="fas fa-user-alt"></i>&nbsp;&nbsp;
                    <p>
                        @lang('site.Client')
                    </p>
                </a>
            </li>
            @endif

        @if(auth()->user()->hasPermission('orders-read'))
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link {{is_Active('order')}} {{is_Active('Prepare')}}">
                    <i class="fas fa-car"></i>&nbsp;&nbsp;
                    <p>
                        @lang('site.Order')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: block;">
                    <li class="nav-item">
                        <a href="{{route('order.index')}}" class="nav-link {{is_Active('order')}}">
                            <i class="fas fa-spinner"></i>&nbsp;&nbsp;
                            <p>
                                @lang('site.Order Loading')
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Client.Order.Prepare')}}" class="nav-link {{is_Active('Prepare')}}">
                            <i class="fas fa-shipping-fast"></i>&nbsp;&nbsp;
                            <p> @lang('site.Order Prepare')</p>
                        </a>
                    </li>
                </ul>
            </li>
                @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    @include('Dashboard.layouts.site')

    <!-- /.content-header -->


    <!-- Main content -->

      @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('Dashboard.layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('Admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('Admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('Admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Admin/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('Admin/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('Admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('Admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('Admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('Admin/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->


<script src="{{asset('Admin/plugins/chart.js/Chart.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
<script src="{{asset('Admin/plugins/morris/morris.min.js')}}"></script>

<!-- PAGE SCRIPTS -->

<script src="{{asset('Admin/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{asset('Admin/Ajax/custom.js')}}"></script>
<script src="{{asset('Admin/Ajax/printThis.js')}}"></script>
@stack('scripts')
</body>
</html>
