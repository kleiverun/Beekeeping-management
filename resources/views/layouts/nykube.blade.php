<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>Ny kube</title>
</head>
<body class="bg-background-orange">
            @include('../components/nav')
        @include('../components/nykube-form')
    </body>
</html>
