@extends('arkitekt.master')

@section('title') {{ env('DOMAIN_NAME') }} Gallery-Index {{ $char }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_DESC') }}@stop

@section('meta')
<meta name="distribution" content="Global" />
  <meta name="rating" content="General" />
  <meta name="language" content="en-us" />
  <meta name="revisit-after" content="1 days"/>
  <meta name="description" content="{{ env('DOMAIN_NAME') }} Gallery-Index {{ $char }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_DESC') }}">
  <meta name="keywords" content="{{ env('DOMAIN_NAME') }} Gallery-Index {{ $char }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_DESC') }}">
  <meta name="robots" content="noindex, follow"/>
@stop

@section('content')

<div class="head-banner clearfix mb30">
    <div class="wrapper">
      <h4>Sitemap Gallery {{ $char }}</h4>
      <div class="site_map">
        <a href="/" rel="nofollow">Home</a>Sitemap Gallery {{ $char }}
      </div>
      <div class="clear"></div>
    </div>
  </div>
 
<div class="main-content wrapper dark">
      <div class="shop-content column9">
          <h1 class="h1s">Sitemap Gallery {{ $char }}</h1>
          <div class="mpg">
            <ul>
            @foreach ($data as $d)
	      <li><a href="{{ url(env('SINGLE_SLUG') . str_slug(shortTitle($d->walltitle), '-') . '/' . $d->wallslug . '_' . $d->id . '.html') }}">{{ $d->walltitle }}</a></li>
            @endforeach
            </ul>
          </div>
      </div>
      
      <div class="shop-aside column3">
        <div class="accordion mb30">
          <h3>Categories</h3>
          <div id="accordion-container">
               @foreach ($categories as $category)
               <h2 class="accordion-header active-header">
                  <a href="{{ url(env('CATEGORY_SLUG') . $category) . '/' }}" style="color: #4eccb9;" rel="nofollow">{{ title(removeDash($category)) }}</a> ({{ categoryCounter($category) }})
               </h2> 
               @endforeach
          </div>
        </div>



        <div class="feat-product mb30">
          <h3>Most See Photos</h3>
          @foreach ($images as $img)
          <div class="feat-boxes2">
            <a href="{{ url(env('SINGLE_SLUG') . $img->wallslug . '_' . $img->id . '.html') }}" rel="nofollow"><img src="{{ url(env('ASSET_SLUG').$img->walldir.'/small-'.$img->wallimg) }}" alt="{{ $img->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" title="{{ $img->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" style="width:50px;height:50px"></a>
            <div class="feat-right2">
              <h4 class="h4rs"><a href="{{ url(env('SINGLE_SLUG') . $img->wallslug . '_' . $img->id . '.html') }}" rel="nofollow"> </a>{{ $img->walltitle }}</h4>
            </div>
            <div class="clear"></div>
          </div>
          @endforeach
        </div>
      </div>
      
      
      
      <div class="clear"></div>
  </div>
  
  
  
  
  
 
  
  

@stop