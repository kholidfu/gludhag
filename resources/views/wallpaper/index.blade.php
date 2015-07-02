<h1>hello laravel</h1>
<img src="{{ url('images-uploads/nyukmu.jpg') }}" width="100" />
<br>
================<br>
<ul>
     @foreach ($images as $image)
		 <li><a href="{{ url('/detail/'.$image->wallslug.'_'.$image->id.'.html') }}">{{ $image->walltitle }}</a></li>
     @endforeach
</ul>
================<br>
     @foreach ($images as $image)
     <img src="{{ url('images-uploads/'.$image->walldir.'/'.$image->wallimg) }}" width="300" height="300" />
     @endforeach
