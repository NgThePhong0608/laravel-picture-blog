<x-layout title="Discover free images">
    <div class="container-fluid mt-4">
        @include('shared._grid_images', ['images' => $images])
    </div>
</x-layout>
