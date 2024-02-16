<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
{{--    @php--}}
{{--        $icon = 'logo.svg'--}}
{{--    @endphp--}}
{{--    <x-icon :src="$icon"/>--}}
    <x-alert type="success" class="mt-4" role="flash" id="my-alert">
        {{ $component->icon(asset('icons/heart.svg')) }}
        <p class="mb-0">Data has been removed. {{ $component->link('Undo') }}</p>
    </x-alert>

    <x-form action="/images" method="POST">
        <input type="text" name="name">
        <button type="submit">Submit</button>
    </x-form>
</body>
</html>
