<h1>{{ $image->walltitle }}</h1>

<a href="/detail/{{ $short_title }}/{{ $image->wallslug }}_{{ $image->id }}.html">to attachment</a> <br />

<img src="{{ url('/images-uploads/' . $image->walldir . '/' . $image->wallimg) }}" width="400"/>