<h1>All Images</h1>

<a href="{{ route('images.create') }}">Upload image</a>
@if($message = session('message'))
    <div>{{ $message }}</div>
@endif
@foreach($images as $image)
    <div>
        <a href="{{ $image->permalink() }}">
            <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" width="300">
        </a>
    </div>
@endforeach
