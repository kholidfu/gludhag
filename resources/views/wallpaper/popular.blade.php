<h1>Popular</h1>

@foreach ($images as $image)
<img src="{{ url('/images-uploads/' . $image->walldir . '/thumb-' . $image->wallimg) }}" /><br>
@endforeach