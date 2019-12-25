<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>eTrade</title>

<link rel="icon" href="{{ URL::to('/') }}/images/logo.png">
  <link rel="stylesheet" href="/css/app.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">

{{--        <a href="/logout" class="btn btn-danger">Sign Out <i class="fas fa-sign-out-alt"></i></a>--}}


      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->



    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      @yield('content')

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
{{--  <footer class="main-footer">--}}
{{--    <!-- To the right -->--}}
{{--    <div class="float-right d-none d-sm-inline">--}}
{{--      Anything you want--}}
{{--    </div>--}}
{{--    <!-- Default to the left -->--}}
{{--    <strong>Copyright &copy; <a href="#">eTrade</a>.</strong> All rights reserved.--}}
{{--  </footer>--}}
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/js/app.js"></script>
<!-- Bootstrap 4 -->

</body>
</html>
