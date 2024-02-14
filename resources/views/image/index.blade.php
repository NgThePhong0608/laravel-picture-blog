<h1>All Images</h1>

@foreach($images as $image)
    <div>
        <a href="">
            <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" width="300">
        </a>
    </div>
@endforeach
