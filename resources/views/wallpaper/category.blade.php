<h1>Category</h1>
@foreach ($thumbs as $thumb)
<a href="/category/{{ $thumb->cat }}/">
     <img src="{{ url('/images-uploads/'.$thumb->walldir.'/thumb-'.$thumb->wallimg) }}" /><br><br>
</a>
@endforeach