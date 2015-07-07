@extends('arkitekt.master')

@section('title') Gallery {{ $char }} @stop

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
      <h4>Sitemap Gallery {{ $char }}</h4>
      <div class="site_map">
        <a href="/">Home</a>about
      </div>
      <div class="clear"></div>
    </div>
  </div>

<div class="aboutus wrapper mb30">
    <div class="dark">

      <div class="column12 biograph">
      <ul>
	@foreach ($data as $d)
      	<li><a href="{{ url(env('SINGLE_SLUG') . str_slug(shortTitle($d->walltitle), '-') . '/' . $d->wallslug . '_' . $d->id . '.html') }}">{{ $d->walltitle }}</a></li>
	@endforeach
      </ul>
      </div>

      <div class="clear"></div>

    </div>

  </div>
  <!-- end of aboutus -->

  <div class="our-team-about wrapper mb30">
      <h3 class="main-title">Meet our Team</h3>
  </div>
  <!-- end of our-team-about -->

@stop