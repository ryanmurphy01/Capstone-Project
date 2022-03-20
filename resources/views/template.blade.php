<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zekelman Part Time</title>

    {{-- import bootstrap here so you only have to do it once, then call it on the other screens with 'extends' --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    {{-- uncomment this when we have a header/navbar --}}
    {{-- {{View::make('header')}} --}}
    {{-- this is used to mark the section where content from other pages will be placed --}}
    @yield('content')
</body>
</html>
