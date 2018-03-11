<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="" type="image/x-icon">
        <meta name="description" content="Random Chuck">
        <title>Random Chuck</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-grid.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.css">
    </head>
    <body>

        <div class="container align-left">
            @yield('content')
        </div>

        @includeIf('includes.scripts')
    </body>
</html>