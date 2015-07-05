@extends('arkitekt.master')

@section('title') About us @stop

@section('meta')
<meta name="distribution" content="Global" />
  <meta name="rating" content="General" />
  <meta name="language" content="en-us" />
  <meta name="revisit-after" content="1 days"/>
  <meta name="description" content="About {{ env('DOMAIN_NAME') }}">
  <meta name="keywords" content="">
  <meta name="robots" content="noindex, nofollow"/>
@stop

@section('content')

<div class="head-banner clearfix mb30">
    <div class="wrapper">
      <h4>About</h4>
      <div class="site_map">
        <a href="/">Home</a>about
      </div>
      <div class="clear"></div>
    </div>
  </div>

<div class="aboutus wrapper mb30">
    <div class="dark">

      <div class="column12 biograph">
        <div class="about-title">Al-Maliki.Com</div>  
        <div class="about-sub">Architecture Creative Design</div>

        <blockquote>Design is the method of putting form and content together. Design, just as art, has multiple definitions; there is no single definition. Design can be art. Design can be aesthetics. Design is so simple, that's why it is so complicated.</blockquote>

        <blockquote>Designing is a matter of concentration. You go deep into what you want to do. It's about intensive research, really. The concentration is warm and intimate and like the fire inside the earth - intense but not distorted. You can go to a place, really feel it in your heart. It's actually a beautiful feeling.</blockquote>

        <blockquote>You can design and create, and build the most wonderful place in the world. But it takes people to make the dream a reality.</blockquote>

        <blockquote><a href="/">Welcome to al-maliki.com</a></blockquote>

      </div>

      <div class="clear"></div>

    </div>

  </div>
  <!-- end of aboutus -->

  <div class="our-team-about wrapper mb30">
      <h3 class="main-title">Meet our Team</h3>
      <span class="main-subtitle">our <del>not so</del> cool &amp; <del>not so</del> professional staff</span>

        <div class="dark">
        
            <div class="column3 team-item">

                <a href="#"><div class="team-mates">
                  <img src="/static/images/team1.jpg" alt="picture">
                </div></a>

                <div class="team-descr">
                  <h3>Boulahrouz Khalid</h3>
                  <h5>developer</h5>
                </div>
                <div class="additionalicons">   
                  <a href="#"><i class="fa fa-google-plus"></i></a>  
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-dribbble"></i></a>
                  <a href="#"><i class="fa fa-facebook"></i></a>  
                </div>
                
            </div>
            <!-- End Slide -->
        
            <div class="column3 team-item">

                <a href="#"><div class="team-mates">
                  <img src="/static/images/team2.jpg" alt="picture">
                </div></a>

                <div class="team-descr">
                  <h3>John Dane</h3>
                  <h5>developer</h5>
                </div>
                <div class="additionalicons">   
                  <a href="#"><i class="fa fa-google-plus"></i></a>  
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-dribbble"></i></a>
                  <a href="#"><i class="fa fa-facebook"></i></a>  
                </div>
                
            </div>
            <!-- End Slide -->
        
            <div class="column3 team-item">

                <a href="#"><div class="team-mates">
                  <img src="/static/images/team3.jpg" alt="picture">
                </div></a>

                <div class="team-descr">
                  <h3>Vladimir Hannan</h3>
                  <h5>developer</h5>
                </div>
                <div class="additionalicons">   
                  <a href="#"><i class="fa fa-google-plus"></i></a>  
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-dribbble"></i></a>
                  <a href="#"><i class="fa fa-facebook"></i></a>  
                </div>
                
            </div>
            <!-- End Slide -->
        
            <div class="column3 team-item">

                <a href="#"><div class="team-mates">
                  <img src="/static/images/team4.jpg" alt="picture">
                </div></a>

                <div class="team-descr">
                  <h3>Maxxi Armstrong</h3>
                  <h5>developer</h5>
                </div>
                <div class="additionalicons">   
                  <a href="#"><i class="fa fa-google-plus"></i></a>  
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-dribbble"></i></a>
                  <a href="#"><i class="fa fa-facebook"></i></a>  
                </div>

            </div>
            <!-- End Slide -->
            <div class="clear"></div>
        
        </div>
        <!-- End Slider2 -->

    </div>
    <!-- end of our-team-about -->

@stop