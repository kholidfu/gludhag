@extends('arkitekt.master')

@section('title') {{ $image->walltitle }} Detail Page : {{ slugToTitle($image->cat) }} @stop

@section('meta')
<meta name="distribution" content="Global" />
  <meta name="rating" content="General" />
  <meta name="language" content="en-us" />
  <meta name="revisit-after" content="1 days"/>
  <meta name="description" content="{{ $image->walltitle }} on detail page, daily interior inspiration from {{ env('DOMAIN_NAME') }}. {{ slugToTitle($image->cat) }} : {{ $image->walltitle }} detail page, available resolution : 1280x720, 1920x1440, 480x800, 800x600 Pixel.">
  <meta name="keywords" content="{{ $image->walltitle }} on detail page, daily interior inspiration from {{ env('DOMAIN_NAME') }}. {{ slugToTitle($image->cat) }} : {{ $image->walltitle }} detail page, available resolution : 1280x720, 1920x1440, 480x800, 800x600 Pixel.">
  <meta name="robots" content="index, follow"/>
  <meta itemprop="name" content="{{ $image->walltitle }} Detail Page : {{ slugToTitle($image->cat) }} - {{ env('DOMAIN_NAME') }}">    
  <meta itemprop="description" content="{{ $image->walltitle }} on detail page, daily interior inspiration from {{ env('DOMAIN_NAME') }}. {{ slugToTitle($image->cat) }} : {{ $image->walltitle }} detail page, available resolution : 1280x720, 1920x1440, 480x800, 800x600 Pixel.">
  <meta itemprop="image" content="{{ url('/images-uploads/' . $image->walldir . '/thumb-' . $image->wallimg) }}">
  <meta property="og:title" content="{{ $image->walltitle }} Detail Page : {{ slugToTitle($image->cat) }} - {{ env('DOMAIN_NAME') }}">
  <meta property="og:description" content="{{ $image->walltitle }} on detail page, daily interior inspiration from {{ env('DOMAIN_NAME') }}. {{ slugToTitle($image->cat) }} : {{ $image->walltitle }} detail page, available resolution : 1280x720, 1920x1440, 480x800, 800x600 Pixel.">
  <meta property="og:image" content="{{ url('/images-uploads/' . $image->walldir . '/thumb-' . $image->wallimg) }}">
  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="fb:app_id" content="">
@stop

@section('content')

<div class="head-banner clearfix mb30">
    <div class="wrapper">
      <h4>{{ title(removeDash($image->cat)) }} Detail</h4>
      <div class="site_map">
        <a href="/" rel="nofollow">Home</a>attachment
      </div>
      <div class="clear"></div>
    </div>
  </div>
<div class="wrapper"><h1 class="h1at">{{ $image->walltitle }}</h1></div>
<div class="main-content wrapper dark">

      <div class="shop-content column12">
          <div class="toolbar">
            <img style="display: block; margin: 0 auto; padding: 10px; max-width: 95%;" width="728" height="90" border="0" onload="" class="img_ad" src="http://pagead2.googlesyndication.com/simgad/12743359513306449184">
          </div>

          <div class="toolbar">
            <a href="{{ url(env('ASSET_SLUG') . $image->walldir . '/' . $image->wallimg) }}">
              <img style="display: block; margin: 0 auto; padding: 10px; width: 95%; height: auto;" src="{{ url(env('ASSET_SLUG') . $image->walldir . '/large-' . $image->wallimg) }}" alt="{{ slugToTitle($image->cat) }}: {{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" title="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" alt="{{ slugToTitle($image->cat) }}: {{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}"/>
            </a>
          </div>

          <div class="toolbar">
            <img style="display: block; margin: 0 auto; padding: 10px;max-width: 95%" width="728" height="90" border="0" onload="" class="img_ad" src="http://pagead2.googlesyndication.com/simgad/12743359513306449184">
          </div>          

          <div class="toolbar">
            <h2 style="padding: 10px; font-weight: 300; color: #9c9c9c; line-height: 22px; font-family: 'Roboto'; font-size: 16px;">
              {{ title(removeDash($image->cat)) }} {{ $image->walltitle }}
            </h2>
            <p style="padding: 10px; color:#999">Detail Image:</p>
            <p>
              <table>
                <tbody>
                  <tr>
                    <td>FILE-NAME:</td>
                    <td>{{ $image->wallimg }}</td>
                  </tr>
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
              <a href="{{ url(env('SINGLE_SLUG') . $image->wallslug) }}_{{ $image->id }}.html">
                <button style="cursor: pointer; padding: 15px; background: #4eccb9; text-transform: uppercase; border: none; text-align: center; color: #fff; font-family: 'Open Sans', sans-serif; font-weight: 500; -webkit-transition: all 0.2s ease-in-out;">Back to Single</button>
              </a>
              <a href="{{ url(env('RESOLUTION_SLUG') . '1280x720-'. $image->wallimg) }}">
                <button style="cursor: pointer; padding: 15px; background: #4eccb9; text-transform: uppercase; border: none; text-align: center; color: #fff; font-family: 'Open Sans', sans-serif; font-weight: 500; -webkit-transition: all 0.2s ease-in-out;">1280x720</button>
              </a>
              <a href="{{ url(env('RESOLUTION_SLUG') . '1920x1440-'. $image->wallimg) }}">
                <button style="cursor: pointer; padding: 15px; background: #4eccb9; text-transform: uppercase; border: none; text-align: center; color: #fff; font-family: 'Open Sans', sans-serif; font-weight: 500; -webkit-transition: all 0.2s ease-in-out;">1920x1440</button>
              </a>
              <a href="{{ url(env('RESOLUTION_SLUG') . '480x800-'. $image->wallimg) }}">
                <button style="cursor: pointer; padding: 15px; background: #4eccb9; text-transform: uppercase; border: none; text-align: center; color: #fff; font-family: 'Open Sans', sans-serif; font-weight: 500; -webkit-transition: all 0.2s ease-in-out;">480x800</button>
              </a>
              <a href="{{ url(env('RESOLUTION_SLUG') . '800x600-'. $image->wallimg) }}">
                <button style="cursor: pointer; padding: 15px; background: #4eccb9; text-transform: uppercase; border: none; text-align: center; color: #fff; font-family: 'Open Sans', sans-serif; font-weight: 500; -webkit-transition: all 0.2s ease-in-out;">800x600</button>
              </a>
            </p>
          </div>

<div class="portfolio port4">
<div class="wrapper">
  <h3 class="h3at">Similar no {{ $image->walltitle }} {{ title(removeDash($image->cat)) }}</h3>
    <div class="filters demo1">

      <div class="clear"></div>
      <div class="container clearfix">
        <ul class="filter-container clearfix isotope" style="overflow: hidden; position: relative; height: 480px;">

          @foreach ($images as $image)
          <li class="class1 isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px);">
            <div class="view view-sixth">
                  <img src="{{ url(env('ASSET_SLUG').$image->walldir.'/small-'.$image->wallimg) }}" alt="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" title="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}" alt="{{ $image->walltitle }} {{ env('TITLE_DIVIDER') }} {{ env('DOMAIN_NAME') }}">
                  <div class="mask">
                      <a href="{{ url(env('ASSET_SLUG').$image->walldir.'/'.$image->wallimg) }}" rel="nofollow" data-fancybox-group="group"><i class="fa fa-search"></i></a>
                      <a href="{{ url(env('SINGLE_SLUG').$image->wallslug.'_'.$image->id.'.html') }}" rel="nofollow"><i class="fa fa-file-o"></i></a>
                  </div>
            </div>
            <div class="desc">
              <h3>{{ $image->walltitle }}</h3>
              <h4>{{ slugToTitle($image->cat) }} {{ env('TITLE_DIVIDER') }} {{ $image->wallresolution }}</h4>
            </div>
          </li>
          @endforeach
          
        <div class="clear isotope-item" style="position: absolute; left: 0px; top: 0px;"></div>
      </ul></div>
    </div>

    <div class="clear"></div>



  </div><!-- wrapper end -->
</div><!-- portfolio port4 end -->


      </div>

      <!-- End Home Blog -->   

      <div class="clear"></div>

  </div>

@stop