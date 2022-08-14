<!DOCTYPE html>
<html lang="en">
<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>@yield('title')</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- fevicon -->
  <link rel="icon" href="{{asset('frontend/images/fevicon.png')}}" type="image/gif" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
  <!-- style css -->
  <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
  <!-- Responsive-->
  <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">  
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="{{asset('frontend/css/jquery.mCustomScrollbar.min.css')}}">
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
 <!-- Export Data Table CSS -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
</head>
<!-- body -->
@stack('style')

<body class="main-layout">
  <!-- loader  -->
  <div class="loader_bg">
    <div class="loader"><img src="{{asset('frontend/images/loading.gif')}}" alt="#" /></div>
  </div>
  <!-- end loader -->

    @include('user.layouts.header')
    @yield('content')
    <!-- @include('frontEnd.layout.container') -->
    @include('user.layouts.footer')

    
    <!-- Javascript files-->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
          <script src="{{asset('frontend/js/popper.min.js')}}"></script>
          <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
          <script src="{{asset('frontend/js/jquery-3.0.0.min.js')}}"></script>
          <script src="{{asset('frontend/js/plugin.js')}}"></script>
          <!-- sidebar -->
          <script src="{{asset('frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
          <script src="{{asset('frontend/js/custom.js')}}"></script>
          <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

          <!-- Export Data Table  -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

@stack('script')
          <script>
// This example adds a marker to indicate the position of Bondi Beach in Sydney,
// Australia.
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,
    center: {
      lat: 40.645037,
      lng: -73.880224
    },
  });

  var image = 'images/maps-and-flags.png';
  var beachMarker = new google.maps.Marker({
    position: {
      lat: 40.645037,
      lng: -73.880224
    },
    map: map,
    icon: image
  });
}
</script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
<!-- end google map js -->

</body>

</html>