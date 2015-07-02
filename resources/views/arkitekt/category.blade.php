@extends('arkitekt.master')

@section('title'){{ env('DOMAIN_NAME') }} Categories Archive: {{ $catString }}. @stop

@section('meta')
  <meta name="distribution" content="Global" />
  <meta name="rating" content="General" />
  <meta name="language" content="en-us" />
  <meta name="revisit-after" content="1 days"/>
  <meta name="description" content="Enjoy and browse collection on Categories {{ $catString }} Source at {{ env('DOMAIN_NAME') }}">
  <meta name="keywords" content="">
  <meta name="robots" content="noindex, follow"/>
@stop

@section('content')

<div class="head-banner clearfix mb30">
    <div class="wrapper">
      <h4>Browse by Category</h4>
      <div class="site_map">
        <a href="/" rel="nofollow">Home</a>Category
      </div>
      <div class="clear"></div>
    </div>
  </div>

<div class="main-content wrapper dark">

      <div class="shop-content column9">
          <div class="toolbar">
            <img style="display: block; margin: 0 auto; padding: 10px;" width="728" height="90" border="0" onload="" class="img_ad" src="http://pagead2.googlesyndication.com/simgad/12743359513306449184">
          </div>

          <div class="product-grid dark">
              @foreach ($thumbs as $thumb)
              <div class="grid-item-list">
                  <div class="view view-first left-img">
                      <img src="{{ url(env('ASSET_SLUG').$thumb->walldir.'/small-'.$thumb->wallimg) }}" alt="">
                  </div>
                  <div class="grid-item-text">
                    <h4><a href="{{ url(env('CATEGORY_SLUG') . $thumb->cat) }}/">{{ slugToTitle($thumb->cat) }}</a></h4>


                    <p>{{ $thumb->walltitle }}</p>




                    <div class="end-product">
                      <div class="price">{{ $thumb->wallfilesize/1000 }} kB</div>
                      <a href="{{ url(env('SINGLE_SLUG') . $thumb->wallslug) }}_{{ $thumb->id }}.html" rel="nofollow"><i class="fa fa-heart"></i> {{ $thumb->wallview }}</a>
                      <a href="{{ url(env('SINGLE_SLUG') . $thumb->wallslug) }}_{{ $thumb->id }}.html" rel="nofollow"><i class="fa"></i> {{ $thumb->walldate }}</a>                      
                      <a href="{{ url(env('SINGLE_SLUG') . $thumb->wallslug) }}_{{ $thumb->id }}.html" rel="nofollow"><i class="fa"></i> {{ $thumb->wallresolution }} pixel</a>
                      <a href="{{ url(env('SINGLE_SLUG') . $thumb->wallslug) }}_{{ $thumb->id }}.html"><i class="fa fa-random"></i></a>
                    </div>

                  </div>
                  <div class="clear"></div>
              </div>
              @endforeach
              <!-- End Grid List View -->
          </div>

          <div class="toolbar">
            <img style="display: block; margin: 0 auto; padding: 10px;" width="728" height="90" border="0" onload="" class="img_ad" src="http://pagead2.googlesyndication.com/simgad/12743359513306449184">
          </div>
    
          <!-- End Product Grid -->

      </div>
      <div class="shop-aside column3">

        <!--
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
        -->
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
            <a href="{{ url(env('SINGLE_SLUG') . $img->wallslug . '_' . $img->id . '.html') }}" rel="nofollow"><img src="{{ url(env('ASSET_SLUG').$img->walldir.'/small-'.$img->wallimg) }}" alt="" title="" style="width:50px;height:50px"></a>
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