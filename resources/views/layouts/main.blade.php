<!-- PLANTILLA PADRE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="resources/css/app.css">
    <title>Chocolate Shop</title>
</head>
<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    .container {
        flex: 1;
    }
    .footer {
        background-color: #f8f9fa; /* Color del header */
        color: #343a40; /* Color del texto del header */
    }
</style>
    <body>
        @yield('contenido')

        @include('components.footer')

    </body>
</html>