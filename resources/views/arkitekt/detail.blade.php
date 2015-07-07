@extends('arkitekt.master')

@section('title') {{ slugToTitle($image->cat) }} {{ $image->walltitle }} Filesize: {{ $image->wallfilesize/1000 }} kB - {{ $image->wallresolution }} pixel @stop

@section('meta')
<meta name="distribution" content="Global" />
  <meta name="rating" content="General" />
  <meta name="language" content="en-us" />
  <meta name="revisit-after" content="1 days"/>
  <meta name="description" content="{{ slugToTitle($image->cat) }} {{ $image->walltitle }} -@foreach ($vav as $vavi) {{ $vavi->walltitle }}.@endforeach">
  <meta name="keywords" content="{{ $image->walltitle }}, {{ slugToTitle($image->cat) }}">
  <meta name="robots" content="index, follow"/>
  <meta itemprop="name" content="{{ slugToTitle($image->cat) }}: {{ $image->walltitle }} - {{ env('DOMAIN_NAME') }}">    
  <meta itemprop="description" content="{{ slugToTitle($image->cat) }} {{ $image->walltitle }} -@foreach ($vav as $vavi) {{ $vavi->walltitle }}.@endforeach">
  <meta itemprop="image" content="{{ url('/images-uploads/' . $image->walldir . '/thumb-' . $image->wallimg) }}">
  <meta property="og:title" content="{{ slugToTitle($image->cat) }}: {{ $image->walltitle }} - {{ env('DOMAIN_NAME') }}">
  <meta property="og:description" content="{{ slugToTitle($image->cat) }} {{ $image->walltitle }} -@foreach ($vav as $vavi) {{ $vavi->walltitle }}.@endforeach">
  <meta property="og:image" content="{{ url('/images-uploads/' . $image->walldir . '/thumb-' . $image->wallimg) }}">
  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="fb:app_id" content="">
@stop

@section('content')

<div class="head-banner clearfix mb30">
    <div class="wrapper">
      <h4>{{ title(removeDash($image->cat)) }}</h4>
      <div class="site_map">
        <a href="/" rel="nofollow">Home</a>detail
      </div>
      <div class="clear"></div>
    </div>
  </div>
<div class="main-content wrapper dark">
      <div class="shop-content column9">
          <h1 class="h1s">{{ title(removeDash($image->cat)) }} {{ $image->walltitle }}</h1>
          <div class="toolbar">
            <img style="display: block; margin: 0 auto; padding: 10px;max-width: 94%" width="728" height="90" border="0" onload="" class="img_ad" src="http://pagead2.googlesyndication.com/simgad/12743359513306449184">
          </div>

          <div class="toolbar">
            <img style="display: block; margin: 0 auto; padding: 10px; max-width: 94%;" src="{{ url(env('ASSET_SLUG') . $image->walldir . '/' . $image->wallimg) }}" alt="{{ slugToTitle($image->cat) }}: {{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" title="{{ slugToTitle($image->cat) }}: {{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" />
          </div>

          <div class="toolbar">
            <p style="padding: 10px; font-weight: 300; color: #9c9c9c; line-height: 22px; font-family: 'Roboto'; font-size: 16px;">
               <strong>{{ $image->walltitle }}</strong>
            </p>
            <div class="vav"><blockquote>
               @foreach ($vav as $vavi)
                {{ $vavi->walltitle }}
               @endforeach
            </blockquote></div>               
            <p style="padding: 20px 10px 10px 10px; color:#999">Image Facts:</p>
            <p>
              <table>
                <tbody>
                  <tr>
                    <td>NAME:</td>
                    <td><h3>{{ $image->walltitle }}</h3></td>
                  </tr>
                  <tr>
                    <td>CATEGORY:</td>
                    <td><a href="{{ url(env('CATEGORY_SLUG') . $image->cat) . '/' }}" rel="nofollow">{{ title(removeDash($image->cat)) }}</a></td>
                  </tr>
                  <tr>
                    <td>FORMAT:</td>
                    <td>image/jpeg</td>
                  </tr>
                  <tr>
                    <td>RESOLUTION:</td>
                    <td>{{ $image->wallresolution }} pixel</td>
                  </tr>
                  <tr>
                    <td>FILE SIZE:</td>
                    <td>{{ $image->wallfilesize/1000 }} kB</td>
                  </tr>
                  <tr>
                    <td>PUBLISHED:</td>
                    <td>{{ humanize($image->walldate) }} ago.</td>
                  </tr>
                  <tr>
                    <td>VIEWED:</td>
                    <td>{{ $image->wallview }}</td>
                  </tr>
                </tbody>
              </table>
            </p>
            <p style="padding: 10px;">
              <a href="{{ url(env('SINGLE_SLUG') . $short_title . '/' . $image->wallslug . '_' . $image->id . '.html') }}">
                <button style="cursor: pointer; padding: 15px; background: #4eccb9; text-transform: uppercase; border: none; text-align: center; color: #fff; font-family: 'Open Sans', sans-serif; font-weight: 500; -webkit-transition: all 0.2s ease-in-out;">Go to Detail</button>
              </a>
            </p>
          </div>

          <div class="toolbar">
            <img style="display: block; margin: 0 auto; padding: 10px;width: 94%" width="728" height="90" border="0" onload="" class="img_ad" src="http://pagead2.googlesyndication.com/simgad/12743359513306449184">
          </div>

      <div class="">
        
        <div class="dark mb30">

          @foreach ($relateds1 as $related1)
          <div class="column4">

              <div class="view view-first"> 
                <img src="{{ url(env('ASSET_SLUG').$related1->walldir.'/small-'.$related1->wallimg) }}" alt="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" title="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}"> 
                <div class="mask"> 
                  <div class="i-icons">
                    <a href="{{ url(env('SINGLE_SLUG') . $related1->wallslug . '_' . $related1->id . '.html') }}" rel="nofollow" class="re-details"><i class="fa fa-arrow-circle-o-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="repost-text">
              <h4 class="h4rs"><a href="{{ url(env('SINGLE_SLUG') . $related1->wallslug . '_' . $related1->id . '.html') }}" rel="nofollow"> </a>{{ $related1->walltitle }}</h4>
              </div>
              <ul class="post-tags clearfix">
                <li><a><i class="fa fa-arrows"></i>{{ $related1->wallresolution }} pixel</a></li>
                <li><a><i class="fa fa-dot-circle-o"></i>{{ $related1->wallfilesize/1000 }} kB</a></li>
              </ul>
              
          </div>
          <!-- End column4 -->
          @endforeach
          <div class="clear"></div>

        </div>
        <!-- End Dark -->

        <div class="dark mb30">

          @foreach ($relateds2 as $related2)
          <div class="column4">

              <div class="view view-first"> 
                <img src="{{ url(env('ASSET_SLUG').$related2->walldir.'/small-'.$related2->wallimg) }}" alt="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" title="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}"> 
                <div class="mask"> 
                  <div class="i-icons">
                    <a href="{{ url(env('SINGLE_SLUG') . $related2->wallslug . '_' . $related2->id . '.html') }}" rel="nofollow" class="re-details"><i class="fa fa-arrow-circle-o-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="repost-text">
              <h4 class="h4rs"><a href="{{ url(env('SINGLE_SLUG') . $related2->wallslug . '_' . $related2->id . '.html') }}" rel="nofollow" > </a>{{ $related2->walltitle }}</h4>
              </div>
              <ul class="post-tags clearfix">
                <li><a><i class="fa fa-arrows"></i>{{ $related2->wallresolution }} pixel</a></li>
                <li><a><i class="fa fa-dot-circle-o"></i>{{ $related2->wallfilesize/1000 }} kB</a></li>
              </ul>
              
          </div>
          <!-- End column4 -->
          @endforeach
          <div class="clear"></div>

        </div>
        <!-- End Dark -->
      
        <div class="dark mb30">

          @foreach ($relateds3 as $related3)
          <div class="column4">

              <div class="view view-first"> 
                <img src="{{ url(env('ASSET_SLUG').$related3->walldir.'/small-'.$related3->wallimg) }}" alt="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" title="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" title="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" title="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}"> 
                <div class="mask"> 
                  <div class="i-icons">
                    <a href="{{ url(env('SINGLE_SLUG') . $related3->wallslug . '_' . $related3->id . '.html') }}" rel="nofollow" class="re-details"><i class="fa fa-arrow-circle-o-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="repost-text">
              <h4 class="h4rs"><a href="{{ url(env('SINGLE_SLUG') . $related3->wallslug . '_' . $related3->id . '.html') }}" rel="nofollow"> </a>{{ $related3->walltitle }}</h4>
              </div>
              <ul class="post-tags clearfix">
                <li><a><i class="fa fa-arrows"></i>{{ $related3->wallresolution }} pixel</a></li>
                <li><a><i class="fa fa-dot-circle-o"></i>{{ $related3->wallfilesize/1000 }} kB</a></li>
              </ul>
              
          </div>
          <!-- End column4 -->
          @endforeach
          <div class="clear"></div>

        </div>
        <!-- End Dark -->

      </div>
      <!-- end toolbar related -->


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
        <!-- End Accordion -->


        <div class="price-filter mb30">
            <h3>Sponsored Ads</h3>
          <div class="price-inner clearfix">
            <div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a></div>
            <img style="display: block; margin: 0 auto; padding: 10px;" width="160" height="600" border="0" onload="" class="img_ad" src="https://tpc.googlesyndication.com/simgad/12557445240820169463">
            <div class="clear"></div>
          </div>
        </div>

        <div class="feat-product mb30">
          <h3>Most See Photos</h3>
          @foreach ($images as $img)
          <div class="feat-boxes2">
            <a href="{{ url(env('SINGLE_SLUG') . $img->wallslug . '_' . $img->id . '.html') }}" rel="nofollow"><img src="{{ url(env('ASSET_SLUG').$img->walldir.'/small-'.$img->wallimg) }}" alt="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" title="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" style="width:50px;height:50px"></a>
            <div class="feat-right2">
              <h4 class="h4rs"><a href="{{ url(env('SINGLE_SLUG') . $img->wallslug . '_' . $img->id . '.html') }}" rel="nofollow"> </a>{{ $img->walltitle }}</h4>
            </div>
            <div class="clear"></div>
          </div>
          @endforeach

          

        </div>

      
      </div>
      <!-- End Home Blog -->   

      <div class="clear"></div>

  </div>

@stop