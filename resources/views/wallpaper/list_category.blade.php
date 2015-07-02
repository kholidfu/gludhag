<h1>List category</h1>

@foreach ($images as $image)
<img src="{{ url('/images-uploads/'.$image->walldir.'/thumb-'.$image->wallimg) }}" /><br>
@endforeach