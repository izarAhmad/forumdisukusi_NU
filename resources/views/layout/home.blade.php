<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Forum Diskusi</title>
  <meta name="dicoding:email" content="roudlotunnizar56@gmail.com">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('user/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('user/css/adminlte.min.css') }}">
 <link rel="stylesheet" href="{{ asset('styles/index.css') }}">
 <link rel="stylesheet" href="{{ asset('styles/normalize.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('user/css/main.css') }}">
  
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('header')
</head>
<body>
<!-- Site wrapper -->

<div  class="wrapper" >
  <!-- Main Sidebar Container -->
  @include('layout.partials.nav')

  <!-- Navbar -->
  
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->

    @yield('content')
      <!-- Main content -->
      
       
        {{-- @include('layouts.partials.tweet_modal') --}}
        
</div>

      <!-- /.content -->
      <!-- Right sidebar -->
     
      {{-- @include('layout.partials.right_sidebar')  --}}
      <!--/. Right sidebar -->
     
    
    <!-- /row -->
  
<!-- ./wrapper -->

<!-- jQuery -->

<script src="{{ asset('user/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('user/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('user/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('user/js/demo.js') }}"></script>
<script src="{{ asset('user/js/adminlte.min.js') }}"></script>
</body>

<!-- AdminLTE for demo purposes -->

</html>
