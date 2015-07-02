<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>@yield('title')</title>
  @yield('meta')
  <!-- stylesheet -->
  <link rel="stylesheet" type="text/css" href="{{ asset('static/css/font-awesome.css') }}" media="screen">
  <link rel="stylesheet" type="text/css" href="{{ asset('static/css/jquery.fancybox-1.3.4.css') }}" media="screen">
  <link rel="stylesheet" type="text/css" href="{{ asset('static/css/style.css') }}" media="screen">
  <link rel="stylesheet" type="text/css" href="{{ asset('static/css/jquery.bxslider.css') }}" media="screen">
  <link rel="stylesheet" type="text/css" href="{{ asset('static/css/fullwidth.css') }}" media="screen">
  <link rel="stylesheet" type="text/css" href="{{ asset('static/css/revslider.css') }}" media="screen">
  <link rel="stylesheet" type="text/css" href="{{ asset('static/css/dr-framework.css') }}" media="screen">

  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,400italic,300italic,100italic,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

  @yield('headjs')
    
</head>
<body>

<div id="container">

    <header>
      <div class="upper-header wrapper">

           <div class="logo">
                 <a href="{{ url('/') }}"><img src="{{ asset('static/images/logo.png') }}"></a>
           </div>

        <!-- Navigation -->
        <div id="nav" style="width: auto;">
          <ul id="navlist" class="sf-menu clearfix">
            <li class="current"><a href="{{ url('/') }}" rel="nofollow"><div class="main-a"> Home </div> <div class="nav-border"></div> <div class="span">start here</div></a>
            </li>
            <li><a href="{{ url('about') }}" rel="nofollow"><div class="main-a"> About </div> <div class="nav-border"></div> <div class="span">who we are</div></a></li>
            <li><a href="{{ url('popular') }}" rel="nofollow"><div class="main-a"> Popular </div> <div class="nav-border"></div> <div class="span">our work</div></a></li>
            <li><a href="{{ url('newest') }}" rel="nofollow"><div class="main-a"> Latest </div> <div class="nav-border"></div> <div class="span">what we offer</div></a>
           </li>
            <li><a href="{{ url('contact') }}" rel="nofollow"><div class="main-a"> Contact </div> <div class="nav-border"></div> <div class="span">get in touch</div></a></li>
          </ul>
        </div>
        <!-- Navigation -->
        <div class="clear"></div>
      </div>
  </header>
  <!--end header-->


 @yield('content')


  <div class="info-box">
      <a class="info-toggle" href="#"><i class="fa fa-info-circle"></i></a>
      <div class="info-content">
        <ul>
          <li><i class="fa fa-phone"></i>9930 1234 5679</li>
          <li><i class="fa fa-envelope"></i><a href="#">contact@domain.com</a></li>
          <li><i class="fa fa-home"></i>street address example</li>
        </ul>
      </div>
    </div>

  <footer>

    <div class="inner-footer">
      <div class="wrapper clearfix">
        <div class="dark">
          <div class="column3 message-form">
            <img src="/static/images/logo2.png" alt="">
            <blockquote>Interior design is the ability to transform an ordinary space into a beautiful, well designed and functional environment</blockquote>
          </div>

          <div class="column3 contact">
            <h4>Recent Posts</h4>
            <ul>
            @foreach ($recents as $recent)
            <li><a href="{{ url(env('SINGLE_SLUG').$recent->wallslug.'_'.$recent->id.'.html') }}" rel="nofollow"><i class="fa fa-arrow-circle-right"></i>{{ $recent->walltitle}}</a></li>
            @endforeach
            </ul>
          </div>

          <div class="column3 third-row">
            <div class="tags">
              <h4>Popular Tags</h4>
                @foreach ($tags as $tag)
                <a href="{{ url(env('SINGLE_SLUG').$tag->wallslug.'_'.$tag->id.'.html') }}" rel="nofollow">{{ shortTitle($tag->walltitle)}}</a>
                @endforeach
              <div class="clear"></div>
            </div>


          </div>

          <div class="column3 flickr">
            <div class="flickr">
              <h4>Random Gallery</h4>
              <ul class="dark clearfix">
                @foreach ($randimg as $randimgs)
                <li class="column4"><a href="{{ url(env('SINGLE_SLUG') . $randimgs->wallslug . '_' . $randimgs->id . '.html') }}" rel="nofollow"><img src="{{ url(env('ASSET_SLUG').$randimgs->walldir.'/small-'.$randimgs->wallimg) }}" alt=""></a></li>
                @endforeach
              </ul>
              <ul class="dark clearfix">
                @foreach ($randimg1 as $randimgs1)
                <li class="column4"><a href="{{ url(env('SINGLE_SLUG') . $randimgs1->wallslug . '_' . $randimgs1->id . '.html') }}" rel="nofollow"><img src="{{ url(env('ASSET_SLUG').$randimgs1->walldir.'/small-'.$randimgs1->wallimg) }}" alt=""></a></li>
                @endforeach
              </ul>
            </div>
          </div>

        </div>
        <!-- End Dark -->
      </div>
    </div>
    <!-- End Inner Footer -->

    <div class="last-div clearfix">
      <div class="wrapper">
        <div class="copyright">
          © 2015 {{ env('COPYRIGHT') }},  All Rights Reserved
        </div>

        <div id="back-to-top">
          <a href="#top" rel="nofollow">Back to Top</a>
        </div>

        <div class="f-socials">
          <a href="{{ url('privacy') }}" rel="nofollow"><i class="fa fa-caret-square-o-right"></i>Privacy</a>
          <a href="{{ url('terms') }}" rel="nofollow"><i class="fa fa-caret-square-o-right"></i>Terms</a>
          <a href="{{ url('about') }}" rel="nofollow"><i class="fa fa-caret-square-o-right"></i>About</a>
          <a href="{{ url('contact') }}" rel="nofollow"><i class="fa fa-caret-square-o-right"></i>Contact</a>
        </div>
      </div>
    </div>
    <!-- End Last Div -->

  </footer>

  <!--end footer-->

</div>

  <div class="preloader">
    <img alt="" src="{{ asset('static/images/preloader.gif') }}">
  </div>


  <!-- include jQuery -->
  <script type="text/javascript" src="{{ asset('static/js/jquery.min.js') }}"></script>
{{-- <script type="text/javascript" src="{{ asset('static/js/accordion.js') }}"></script> --}}
  <script type="text/javascript" src="{{ asset('static/js/jquery.imagesloaded.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('static/js/jquery.isotope.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('static/js/jquery.fancybox-1.3.4.pack.js') }}"></script>
  <script type="text/javascript" src="{{ asset('static/js/jquery.superfish.js') }}"></script>
  <script type="text/javascript" src="{{ asset('static/js/jquery.bxslider.js') }}"></script>
  {{-- <script type="text/javascript" src="{{ asset('static/js/twitter.js') }}"></script> --}}


      <!-- include jQuery + carouFredSel plugin -->
    <script type="text/javascript" language="javascript" src="{{ asset('static/js/jquery.carouFredSel-6.2.1-packed.js') }}"></script>

    <!-- optionally include helper plugins -->
    <script type="text/javascript" language="javascript" src="{{ asset('static/js/jquery.mousewheel.min.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('static/js/jquery.touchSwipe.min.js') }}"></script>

    <!-- optional js load -->
    @yield('footjs')

  <script type="text/javascript" src="{{ asset('static/js/script.js') }}"></script>

</body>
</html>