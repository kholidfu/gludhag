@extends('arkitekt.master')

@section('title') {{ env('DOMAIN_NAME') }} Page {{ $curPage }} | {{ $desc->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_DESC') }}@stop

@section('meta')
<meta name="distribution" content="Global" />
  <meta name="rating" content="General" />
  <meta name="language" content="en-us" />
  <meta name="revisit-after" content="1 days"/>
  <meta name="description" content="{{ $desc->walltitle }} : {{ env('DOMAIN_NAME') }}">
  <meta name="keywords" content="{{ $desc->walltitle }} {{ env('DOMAIN_NAME') }}">
  <meta name="robots" content="index, follow"/>

  <meta itemprop="name" content="{{ env('DOMAIN_NAME') }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_DESC') }}">    
  <meta itemprop="description" content="{{ $desc->walltitle }} : {{ env('DOMAIN_NAME') }}">
  <meta itemprop="image" content="">
  <meta property="og:title" content="{{ env('DOMAIN_NAME') }} Page {{ $curPage }} | {{ $desc->walltitle }}">
  <meta property="og:description" content="{{ $desc->walltitle }} : {{ env('DOMAIN_NAME') }} page {{ $curPage }}">
  <meta property="og:image" content="">
  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="fb:app_id" content="">
@stop

@section('content')


<div class="head-banner clearfix mb30">
    <div class="wrapper">
      <h4>Gallery</h4>
      <div class="site_map">
        <a href="/" rel="nofollow">Home</a>
      </div>
      <div class="clear"></div>
    </div>
  </div>

  <div class="portfolio port4">
  
  <div class="wrapper">
    <div class="filters demo1">

      <div class="clear"></div>
      <div class="container clearfix">
        <ul class="filter-container clearfix isotope" style="overflow: hidden; position: relative; height: 960px;">

          @foreach ($images as $image)
          <li class="class1 isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(0px, 0px);">
            <div class="view view-sixth">
                  <img src="{{ url(env('ASSET_SLUG').$image->walldir.'/small-'.$image->wallimg) }}" alt="{{ $image->walltitle }} {{ title(removeDash($image->cat)) }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" title="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ title(removeDash($image->cat)) }}">
                  <div class="mask">
                      <a href="{{ url(env('ASSET_SLUG').$image->walldir.'/'.$image->wallimg) }}" data-fancybox-group="group"><i class="fa fa-search"></i></a>
                      <a href="{{ url(env('SINGLE_SLUG').$image->wallslug.'_'.$image->id.'.html') }}"><i class="fa fa-file-o"></i></a>
                  </div>
            </div>
            <div class="desc">
              <h2>{{ shortTitle($image->walltitle) }}</h2>
              <h4>{{ slugToTitle($image->cat) }} {{ env('TITLE_DIVIDER') }} {{ $image->wallresolution }}</h4>
            </div>
          </li>
          @endforeach

        <div class="clear"></div>
      </div>
    </div>

    <div class="clear"></div>

    <div class="pagenation clearfix">
        {!! $paging !!}
    </div>

  </div>
</div>

@stop