@extends('arkitekt.master')

@section('title') Popular Home Elements @stop

@section('meta')
<meta name="distribution" content="Global" />
  <meta name="rating" content="General" />
  <meta name="language" content="en-us" />
  <meta name="revisit-after" content="1 days"/>
  <meta name="description" content="Popular home elements user view @ {{ env('DOMAIN_NAME') }}, on this page we showing and update the popular home elements list picture @ {{ env('DOMAIN_NAME') }} for your ideas source, happy finding.">
  <meta name="keywords" content="">
  <meta name="robots" content="index, follow"/>
@stop

@section('content')


<div class="head-banner clearfix mb30">
    <div class="wrapper">
      <h4>Popular Show</h4>
      <div class="site_map">
        <a href="/">Home</a>popular
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
                  <img src="{{ url(env('ASSET_SLUG').$image->walldir.'/small-'.$image->wallimg) }}" alt="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" title="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}">
                  <div class="mask">
                      <a href="{{ url(env('ASSET_SLUG').$image->walldir.'/'.$image->wallimg) }}" data-fancybox-group="group"><i class="fa fa-search"></i></a>
                      <a href="{{ url(env('SINGLE_SLUG').$image->wallslug.'_'.$image->id.'.html') }}"><i class="fa fa-file-o"></i></a>
                  </div>
            </div>
            <div class="desc">
              <h4>{{ shortTitle($image->walltitle) }}</h4>
              <span>{{ slugToTitle($image->cat) }} {{ env('TITLE_DIVIDER') }} {{ $image->wallresolution }}</span>
            </div>
          </li>
          @endforeach

        <div class="clear"></div>
      </div>
    </div>

    <div class="clear"></div>

  </div>
</div>

@stop