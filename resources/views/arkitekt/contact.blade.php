@extends('arkitekt.master')

@section('title') Contact Us @stop

@section('meta')
<meta name="distribution" content="Global" />
  <meta name="rating" content="General" />
  <meta name="language" content="en-us" />
  <meta name="revisit-after" content="1 days"/>
  <meta name="description" content="Contact us at {{ env('DOMAIN_NAME') }}">
  <meta name="keywords" content="">
  <meta name="robots" content="noindex, nofollow"/>
@stop

@section('content')

<div class="head-banner clearfix">
    <div class="wrapper">
      <h4>Contact</h4>
      <div class="site_map">
        <a href="/">Home</a>contact
      </div>
      <div class="clear"></div>
    </div>
</div>
<!-- end of head-banner -->

<div class="contact-content">

    <div class="wrapper">
      <div class="dark">
        <div class="contact-info column6">
          
          <h3 class="main-title">Contact Info</h3>
          <span class="main-subtitle">our email, phone and street address</span>

          <p>This is <span>al-maliki.com</span><br/> architecture creative design</p>

          <div class="post-meta">

            <div class="post-home">
              <i class="fa fa-home"></i>
              street
            </div>

            <div class="post-phone">
              <i class="fa fa-phone"></i>
              +
            </div>

            <div class="post-mail">
              <a href="#"><i class="fa fa-envelope"></i>
              info@al-maliki.com
              </a>
            </div>

          </div>

        </div>

        <div class="contact-box column6">
          <form id="contact-form">
            <h3 class="main-title">Get in touch</h3>
            <span class="main-subtitle">shoot us a message</span>
              <div class="dark">
                <div class="text-fields column4">
                  <div class="float-input">
                    <input name="name" id="name" type="text" data-value="Name" value="Name">
                    <span><i class="fa fa-user"></i></span>
                  </div>
                  <div class="float-input">
                    <input name="mail" id="mail" type="text" data-value="e-mail" value="e-mail">
                    <span><i class="fa fa-envelope-o"></i></span>
                  </div>
                  <div class="float-input">
                    <input name="website" id="website" type="text" data-value="website" value="website">
                    <span><i class="fa fa-link"></i></span>
                  </div>
                </div>

                <div class="submit-area column8">
                  <textarea name="comment" id="comment" data-value="Message" value="Message"></textarea>
                  <input type="submit" id="submit_contact" class="main-button" value="Send">
                  <div id="msg" class="message"></div>
                </div>
              </div>
          </form>
        </div>
        <div class="clear"></div>
      </div>
    </div>

  </div>

@stop

@section('footjs')


@stop