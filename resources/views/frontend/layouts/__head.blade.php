<!doctype html>
  <html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    
    <title>Pasal</title>
    <link rel="canonical" href="">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets_pasal/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets_pasal/css/owl.theme.default.min.css')}}" rel="stylesheet">

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="{{asset('assets_pasal/magnific-popup/magnific-popup.css')}}">

    <link href="{{asset('assets_pasal/css/countdown.css')}}" rel="stylesheet">

    <link href="{{asset('assets_pasal/css/pasal.css?v=2.36')}}" rel="stylesheet">
    <link href="{{asset('assets_pasal/css/mobile.css?v=1.08')}}" rel="stylesheet">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="top-header bg-grey">
       @foreach($banner as $ban)
           @if($ban->name == "header-banner" && $ban->status == 1 )
               <img src="{{asset($ban->image)}}" alt="top-header" class="img-responsive" />
           @endif
        @endforeach
     
    </div>
  </head>
  