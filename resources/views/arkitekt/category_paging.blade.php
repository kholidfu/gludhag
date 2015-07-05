@extends('arkitekt.master')

@section('title'){{ slugToTitle($catname) }} Categories collections Page {{ $curPage }}: {{ $titles }}.@stop

@section('meta')
  <meta name="distribution" content="Global" />
  <meta name="rating" content="General" />
  <meta name="language" content="en-us" />
  <meta name="revisit-after" content="1 days"/>
  <meta name="description" content="{{ slugToTitle($catname) }} Page {{ $curPage }}: {{ $descriptions }}.">
  <meta name="keywords" content="{{ slugToTitle($catname) }} Categories collections: {{ $titles }}">
  <meta name="robots" content="index, follow"/>
@stop

@section('content')


<div class="head-banner clearfix mb30">
    <div class="wrapper">
      <h4>{{ slugToTitle($catname) }} Categoriez</h4>
      <div class="site_map">
        <a href="/" rel="nofollow">Home</a><a href="{{ url(env('CATEGORY_SLUG')) . '/'  }}" rel="nofollow">category</a><a href="{{ url(env('CATEGORY_SLUG') . $catname) . '/' }}" rel="nofollow">{{ slugToTitle($catname) }}</a>
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
                  <img src="{{ url(env('ASSET_SLUG').$image->walldir.'/small-'.$image->wallimg) }}" alt="{{ $image->walltitle }}" title="{{ $image->walltitle }}" />
                  <div class="mask">
                      <a href="{{ url(env('ASSET_SLUG').$image->walldir.'/'.$image->wallimg) }}" data-fancybox-group="group"><i class="fa fa-search"></i></a>
                      <a href="{{ url(env('SINGLE_SLUG').$image->wallslug.'_'.$image->id.'.html') }}"><i class="fa fa-file-o"></i></a>
                  </div>
            </div>
            <div class="desc">
              <h2>{{$image->walltitle}}</h2>
              <h4>{{ slugToTitle($image->cat) }} {{ env('TITLE_DIVIDER') }} {{ $image->wallfilesize/1000 }} kB</h4>
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