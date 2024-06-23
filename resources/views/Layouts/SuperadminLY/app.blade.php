<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>

    @include('Layouts.SuperadminLY.navbar')

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    @vite('resources/js/app.js')

</body>
</html>
